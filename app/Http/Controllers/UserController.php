<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            $message = "Logowanie prawidłowe";

            return response()->json([
                'message' => $message
            ], 200);
        } else {
            $message = "Logowanie nieprawidlłowe";

            return response()->json([
                'message' => $message
            ], 422);
        }
    }

    public function register(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $success = true;
            $message = "Rejestracja przebiegła pomyślnie";
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }
        $response = [
            'success' => $success,
            'message' => $message
        ];
        return response()->json($response);
    }

    public function logout()
    {
        try {
            Session::flush();
            $success = true;
            $message = "Wylogowano";
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        $response = [
            'success' => $success,
            'message' => $message
        ];
        return response()->json($response);
    }
}
