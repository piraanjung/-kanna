<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PrintController extends Controller
{
    public function pay_money_statement($id){
        // $pdf = PDF::loadView('withdraw/withdraw_table');
        // return $pdf->download('statement.pdf');
        $pdf = PDF::loadView('withdraw.withdraw_table',['id' =>$id]);
        return $pdf->download('invoice.pdf');
    }
}
