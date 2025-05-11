<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $cartItems = OrderItem::whereNull('order_id')->where('user_id', $userId)->with('product')->get();
        $total = $cartItems->sum('subtotal');
        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Product $product)
    {
        $userId = auth()->id();
        $cartItem = OrderItem::whereNull('order_id')
            ->where('product_id', $product->id)
            ->where('user_id', $userId)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
            $cartItem->subtotal = $cartItem->quantity * $cartItem->price;
            $cartItem->save();
        } else {
            OrderItem::create([
                'user_id' => $userId,
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
                'subtotal' => $product->price,
                'order_id' => null
            ]);
        }

        session()->flash('success', 'Produk berhasil ditambahkan ke keranjang!');
        return redirect()->back();
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);
        $userId = auth()->id();
        $cartItem = OrderItem::whereNull('order_id')
            ->where('product_id', $product->id)
            ->where('user_id', $userId)
            ->first();
        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->subtotal = $cartItem->quantity * $cartItem->price;
            $cartItem->save();
            session()->flash('success', 'Jumlah produk berhasil diperbarui!');
        }
        return redirect()->back();
    }

    public function remove(Product $product)
    {
        $userId = auth()->id();
        $cartItem = OrderItem::whereNull('order_id')
            ->where('product_id', $product->id)
            ->where('user_id', $userId)
            ->first();
        if ($cartItem) {
            $cartItem->delete();
            session()->flash('success', 'Produk berhasil dihapus dari keranjang!');
        }
        return redirect()->back();
    }

    public function checkout()
    {
        $userId = auth()->id();
        $cartItems = OrderItem::whereNull('order_id')->where('user_id', $userId)->with('product')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja Anda kosong.');
        }
        $total = $cartItems->sum('subtotal');
        return view('cart.checkout', compact('cartItems', 'total'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'payment_method' => 'required|in:transfer,ewallet',
        ]);
        $userId = auth()->id();
        $cartItems = OrderItem::whereNull('order_id')->where('user_id', $userId)->with('product')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja Anda kosong.');
        }
        DB::beginTransaction();
        try {
            $total = $cartItems->sum('subtotal');
            $order = Order::create([
                'user_id' => $userId,
                'order_number' => 'ORD-' . strtoupper(Str::random(10)),
                'total_amount' => $total + 20000,
                'shipping_address' => $request->address,
                'shipping_method' => 'Standard',
                'payment_method' => $request->payment_method,
                'status' => 'pending',
                'payment_status' => 'pending'
            ]);
            foreach ($cartItems as $item) {
                $item->order_id = $order->id;
                $item->save();
                $item->product->decrement('stock', $item->quantity);
            }
            DB::commit();
            session()->flash('success', [
                'title' => 'Checkout Berhasil!',
                'text' => 'Pesanan Anda berhasil dibuat! Silakan lakukan pembayaran sesuai instruksi.',
                'icon' => 'success'
            ]);
            return redirect()->route('orders.show', $order);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat checkout. Silakan coba lagi.');
        }
    }
}
