<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'orderItems.product'])->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'orderItems.product']);
        return view('orders.show', compact('order'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'shipping_address' => 'required|string',
            'shipping_method' => 'required|string',
            'payment_method' => 'required|string',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1'
        ]);

        // Generate unique order number
        $orderNumber = 'ORD-' . strtoupper(Str::random(10));

        // Calculate total amount and create order items
        $totalAmount = 0;
        $orderItems = [];

        foreach ($validated['items'] as $item) {
            $product = Product::findOrFail($item['product_id']);

            // Check stock availability
            if ($product->stock < $item['quantity']) {
                return back()->with('error', "Insufficient stock for {$product->name}");
            }

            $subtotal = $product->price * $item['quantity'];
            $totalAmount += $subtotal;

            $orderItems[] = [
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'price' => $product->price,
                'subtotal' => $subtotal
            ];

            // Decrease product stock
            $product->decrement('stock', $item['quantity']);
        }

        // Create order
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_number' => $orderNumber,
            'total_amount' => $totalAmount,
            'shipping_address' => $validated['shipping_address'],
            'shipping_method' => $validated['shipping_method'],
            'payment_method' => $validated['payment_method'],
            'status' => 'pending',
            'payment_status' => 'pending'
        ]);

        // Create order items
        $order->orderItems()->createMany($orderItems);

        return redirect()->route('orders.show', $order)
            ->with('success', 'Order placed successfully.');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled'
        ]);

        $order->update(['status' => $validated['status']]);

        return redirect()->route('orders.show', $order)
            ->with('success', 'Order status updated successfully.');
    }

    public function updatePaymentStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'payment_status' => 'required|in:pending,paid,failed'
        ]);

        $order->update(['payment_status' => $validated['payment_status']]);

        return redirect()->route('orders.show', $order)
            ->with('success', 'Payment status updated successfully.');
    }
}
