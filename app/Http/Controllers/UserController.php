<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use App\Models\Users_in_company;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(UserRegisterRequest $request)
    {
        try {
            $user = new User();
            if ($this->userService->addUser($user, $request->all())) {
                $message = "Rejestracja przebiegła pomyślnie";
                return response()->json([
                    'message' => $message
                ], 200);
            } else {
                $message = "Błąd podczas rejestracji użytkownika";
                return response()->json([
                    'message' => $message
                ], 500);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            return response()->json([
                'message' => $message
            ], 500);
        }
    }

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

    public function logout()
    {
        $user = Auth::user();
        Users_in_company::truncate();
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

    public function updateUser(Request $request)
    {
        try {
            $user = Auth::user();
            if ($this->userService->updateUserProfil($user, $request->all())) {
                $message = "Dane użytkownika zaktualizowane pomyślnie";
                return response()->json([
                    'message' => $message
                ], 200);
            } else {
                $message = "Błąd podczas aktualizacji danych użytkownika";
                return response()->json([
                    'message' => $message
                ], 500);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            return response()->json([
                'message' => $message
            ], 500);
        }
    }
}
