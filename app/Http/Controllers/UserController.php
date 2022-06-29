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
        try {
            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];
            if (Auth::attempt($credentials)) {
                $success = true;
                $message = "Logowanie prawidłowe";
            } else {
                $success = false;
                $message = "Logowanie nieprawidlłowe";
            }

            $response = [
                'success' => $success,
                'message' => $message
            ];

            return response()->json($response);
        } catch (\Throwable $ex) {

            $message = $ex->getMessage();
            var_dump($message);
            die;
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
