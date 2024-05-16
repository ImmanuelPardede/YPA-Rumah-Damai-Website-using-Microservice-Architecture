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

    public function login(Request $request)
{
    $input = $request->all();

    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password'], 'status' => 'aktif'))) {
        $user = auth()->user();

        if ($user->role == 'admin' || $user->role == 'guru' || $user->role == 'staff' || $user->role == 'direktur') {
        return redirect()->route('dashboard');
    }
    
    }

    // Jika auth()->attempt mengembalikan false, tandai bahwa ada kesalahan
    return back()->withErrors(['email' => 'Email atau password salah.']);
}


    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('login'); // Redirect to login page after logout
    }
}
