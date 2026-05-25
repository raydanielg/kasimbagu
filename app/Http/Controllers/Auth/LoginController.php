<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * The user has been authenticated.
     * Check role and redirect accordingly.
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            session(['admin_welcome' => true]);
            return redirect()->route('admin.dashboard');
        }

        $intended = redirect()->intended($this->redirectTo)->getTargetUrl();
        return redirect()->route('redirecting', ['to' => $intended]);
    }

    /**
     * Check if a user exists by email for SweetAlert-driven login flow.
     */
    public function checkEmail(Request $request)
    {
        $data = $request->validate([
            'email' => ['required','email']
        ]);

        $exists = User::where('email', $data['email'])->exists();
        return response()->json([
            'exists' => $exists,
            'message' => $exists ? 'User found' : 'No user with that email'
        ]);
    }
}
