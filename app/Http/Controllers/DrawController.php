<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Users_in_company;
use App\Mail\CoffeDrawEmail;
use App\Mail\IncreaseDrawEmail;
use App\Mail\CodeReviewDrawEmail;
use Illuminate\Support\Facades\Mail;

class DrawController extends Controller
{
    public function getOneUserFromTableUser()
    {
        try {
            if ($singleUser = User::inRandomOrder()->get()->first()) {
                $message = "Uzytkownik wylosowany pomyslnie";
                Mail::to($singleUser->email)->send(new IncreaseDrawEmail);
                return response()->json([
                    'message' => $message,
                    'singleUser' => $singleUser
                ], 200);
            } else {
                $message = "Blad podczas losowania uzytkownika";
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

    public function getOneUserFromTableUserInCompany(Request $request)
    {
        try {
            if ($singleUser = Users_in_company::inRandomOrder()->get()->first()) {
                $message = "Uzytkownik wylosowany pomyslnie";
                $userMail = User::where('name', $singleUser->name)->where('surname', $singleUser->surname)->value('email');
                Mail::to($userMail)->send(new CoffeDrawEmail($request));
                return response()->json([
                    'message' => $message,
                    'singleUser' => $singleUser
                ], 200);
            } else {
                $message = "Blad podczas losowania uzytkownika";
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

    public function getOneUserFromTableToCodeReview(Request $request)
    {
        try {
            if ($singleUser = User::inRandomOrder()->where('position', $request['type'])->get()->first()) {
                $message = "Uzytkownik wylosowany pomyslnie";
                Mail::to($singleUser->email)->send(new CodeReviewDrawEmail($request));
                return response()->json([
                    'message' => $message,
                    'singleUser' => $singleUser
                ], 200);
            } else {
                $message = "Blad podczas losowania uzytkownika";
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
