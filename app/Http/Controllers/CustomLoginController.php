<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $response = [
                    'status' => 'success',
                    'title' => 'Login Successfully',
                    'message' => 'Welcome back!',
                ];
                return redirect()->route('schedule.index')->with($response);
            }else{
                $response = [
                    'status' => 'error',
                    'title' => 'Login Failed',
                    'message' => 'Credentials do not match.',
                ];

                return redirect()->back()->withInput()->with($response);
            }
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            $response = [
                'status' => 'error',
                'title' => 'Login Failed',
                'message' => $e->getMessage(),
            ];
            return redirect()->back()->with($response);
        }
    }

    public function logout()
    {
        Auth::logout();
        $response = [
            'status' => 'success',
            'title' => 'Logout Successfully',
            'message' => 'You have been logged out.',
        ];
        return redirect()->route('login')->with($response);
    }
}
