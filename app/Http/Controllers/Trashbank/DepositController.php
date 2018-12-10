<?php

namespace App\Http\Controllers\Trashbank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DepositTransaction;

class DepositController extends Controller
{
    public function index(){
        $deposit_trans = DepositTransaction::where('status' , 1)->get();
        return view('trashbank.deposit.index', [
            'deposit_trans' => $deposit_trans
        ]);
    }
}
