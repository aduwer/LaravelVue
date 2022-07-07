<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
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
            $this->userService->addUser($user, $request->all());
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
