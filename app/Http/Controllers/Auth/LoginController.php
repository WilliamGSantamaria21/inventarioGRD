<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login', ['title' => 'Identification Login']);
    }

    public function username()
    {
        return 'identification_number';
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function authenticated(Request $request, $user)
    {
        // Verificar si el usuario está activo (estado = 64)
        if ($user->state_id == 64) {
            // Continuar con la autenticación predeterminada
            return redirect()->intended($this->redirectPath());
        } elseif ($user->state_id == 65) {
            // El usuario está inactivo, cerrar sesión y mostrar un mensaje de error
            $this->guard()->logout();
            $request->session()->invalidate();

            return redirect('/login')->withErrors(['state' => 'Tu cuenta está inactiva.']);
        }
    }
}
