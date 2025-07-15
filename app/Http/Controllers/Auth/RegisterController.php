<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        // Jika datang dari checkout, tambahkan flag 'checkout_login'
        if (session()->has('cart_action') && session('cart_action') == 'checkout_login') {
            session()->keep(['cart_action']);
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user'
        ]);

        auth()->login($user);

        // Check if we have a redirect URL from checkout process
        if (session()->has('url.intended') && strpos(session('url.intended'), 'checkout') !== false) {
            // Clear the checkout login flag
            session()->forget('cart_action');

            // If we were in checkout, redirect to cart
            return redirect()->route('cart.index')
                ->with('success', 'Pendaftaran berhasil! Silakan lanjutkan proses checkout.');
        }

        // Normal registration flow
        return redirect('/')->with('success', 'Pendaftaran akun berhasil!');
    }
}
