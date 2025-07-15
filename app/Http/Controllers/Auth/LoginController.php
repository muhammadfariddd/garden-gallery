<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        // Jika datang dari checkout, tambahkan flag 'checkout_login'
        if (session()->has('cart_action') && session('cart_action') == 'checkout_login') {
            session()->keep(['cart_action']);
        }

        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // Attempt to log the user in
        if (Auth::attempt($this->credentials($request), $request->filled('remember'))) {
            // Check if we have a redirect URL from checkout process
            if (session()->has('url.intended') && strpos(session('url.intended'), 'checkout') !== false) {
                // Clear the checkout login flag
                session()->forget('cart_action');

                // If we were in checkout, redirect to cart (form will handle the submission)
                return redirect()->route('cart.index')
                    ->with('success', 'Login berhasil! Silakan lanjutkan proses checkout.');
            }

            // Normal login flow
            return redirect()->intended($this->redirectTo)
                ->with('success', 'Login berhasil!');
        }

        // Login failed
        return back()
            ->withErrors(['email' => 'Kredensial yang Anda berikan tidak cocok dengan data kami.'])
            ->withInput($request->except('password'));
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    }

    /**
     * Get the needed authentication credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'Logout berhasil!');
    }
}
