<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        // $user = new User();
        // $user->name = "nata";
        // $user->email = "natanatanata@gmail.com";
        // $user->password = "123123";
        // $user->save();

       // $user = User::find(3);
       // $user->delete();

        $users = User::all();
        return view('users.index', compact('users'));
    }
}
