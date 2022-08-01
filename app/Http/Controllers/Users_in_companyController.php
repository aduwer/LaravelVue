<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInCompanyRequest;
use App\Models\Users_in_company;
use App\Services\UserService;
use Illuminate\Http\Request;

class Users_in_companyController extends Controller
{

    private UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function createUser(UserInCompanyRequest $request)
    {
        try {
            $user = new Users_in_company();
            if ($this->userService->addUserInCompany($user, $request->all())) {
                $message = "Użytkownik pomyślnie dodany do losowania";
                return response()->json([
                    'message' => $message
                ], 200);
            } else {
                $message = "Błąd podczas dodawania użytkownika do logowania";
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

    public function showUser()
    {
        $users = Users_in_company::all();
        return $users;
    }

    public function deleteUsers()
    {
        if (Users_in_company::truncate()) {
            return response()->json(['status' => true, 'message' => 'Użytkownicy będący w biurze usunięci pomyślnie']);
        } else {
            return response()->json(['status' => false, 'message' => 'Błąd podczas usuwania użytkowników będących w biurze']);
        }
    }
}
