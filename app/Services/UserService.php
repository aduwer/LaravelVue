<?php

namespace App\Services;

use App\Models\User;
use App\Models\Users_in_company;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function addUser(User $user, array $data)
    {
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        return $user->save();
    }

    public function addUserInCompany(Users_in_company $user, array $data)
    {
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        return $user->save();
    }

    public function updateUserProfil(User $user, array $data)
    {
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->email = $data['email'];
        $user->position = $data['position'];
        $user->address = $data['address'];
        $user->city = $data['city'];
        $user->ZIPcode = $data['ZIPcode'];
        return $user->save();
    }
}
