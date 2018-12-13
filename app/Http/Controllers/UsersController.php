<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Province;

class UsersController extends Controller
{
    public function index(){
        $users = User::where('status', '1')->get();
        return view('users.index',['users' => $users]);
    }

    public function create(){
        $user = new User;
        $provinces = Province::all();
        return view('users.create', ['user' => $user, 'provinces' => $provinces]);
    }

}
