<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Users_in_company;

class DrawController extends Controller
{
    public function getOneUserFromTableUser()
    {
        $singleUser = User::inRandomOrder()->get()->first();
        return $singleUser;
    }

    public function getOneUserFromTableUserInCompany(Request $request)
    {
        $singleUser = Users_in_company::inRandomOrder()->get()->first();
        return $singleUser;
    }

    public function getOneUserFromTableToCodeReview(Request $request)
    {
        $singleUser = User::inRandomOrder()->where('position', $request['type'])->get()->first();
        return $singleUser;
    }
}
