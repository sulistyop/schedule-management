<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CustomRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            ]);

            // Buat user baru
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
            ]);

            event(new Registered($user));


            // Respons jika sukses
            $responseData = [
                'status' => 'success',
                'title' => 'Registration Success',
                'message' => 'Please check your email to activate your MonsterBackup Account.',
            ];

            return redirect()->back()->with($responseData);
        } catch (QueryException $e) {
            $responseData = [
                'status' => 'error',
                'title' => 'Registration Failed',
                'message' => $e->errorInfo[2],
            ];

            return redirect()->back()->withInput()->with($responseData);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $responseData = [
                'status' => 'error',
                'title' => 'Registration Failed',
                'message' => 'Something went wrong.',
            ];

            return redirect()->back()->withInput()->with($responseData);
        }
    }
}
