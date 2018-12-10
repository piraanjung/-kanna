<?php

namespace App\Http\Controllers\Trashbank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrashbankController extends Controller
{
    public function index(){
        return view('trashbank.dashboard');
    }
}
