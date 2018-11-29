<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\WithdrawTranction;
use App\Http\Controllers\PrintController;
use PDF;


class WithdrawController extends Controller
{
    protected $print;
    public function __construct(PrintController $print){
        $this->print = $print;
    }
    public function index(){
        return view('withdraw/index');
    }

    public function withdraw_table(){
        // $withdraws = DB::table('withdraw_transaction')->where('withdraw_status' , 'pending')->get();
        // dd($withdraws);
        $withdraws = WithdrawTranction::where('withdraw_status' , 'pending')->get();
        return view('withdraw.withdraw_table',compact('withdraws'));
    }

    public function withdraw_form(){
        $users = DB::table('users')->select('id', 'name', 'last_name')
                ->where('status', 1)->get();
        return view('withdraw/withdraw_form',['users' => $users]);
    }

    public function withdraw_store(Request $request){
        // dd($request);

        $id_card_match = DB::table('users')->where('id_card', $request->id_card)->get();
        if(count($id_card_match) > 0 ){
            $withdraw_record  = DB::table('withdraw_transaction')->insert([
                'user_id' => $request->user_id,
                'approved_id' => $request->user_id,
                'withdraw_code' => $this->create_withdraw_code($request->id_card),
                'amount' => $request->amount,
                'withdraw_date' => $this->_date_format($request->withdrawdate),
                'get_money_date' => $this->_date_format($request->getmoneydate),
                'withdraw_status' =>  'pending',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $status = 'ทำการบันทึกข้อมูลเรียบร้อยแล้ว';
        }else{
            $status = 'ไม่สามารถทำการบันทึกข้อมูลได้';
        }
        return redirect('withdraw/withdraw_table')->with('success',  $status);
    }

    public function edit($id){
        $users = DB::table('users')->select('id', 'name', 'last_name')
                ->where('status', 1)->get();
        $wd_transaction = WithdrawTranction::find($id);
        $wd_transaction->withdraw_date = $this->reverse_date_format($wd_transaction->withdraw_date);
        $wd_transaction->get_money_date = $this->reverse_date_format($wd_transaction->get_money_date);
        return view('withdraw.edit', compact('wd_transaction', 'users'));
    }

    public function update(Request $request, $id){
        // $request->validate([
        //     'share_name'=>'required',
        //     'share_price'=> 'required|integer',
        //     'share_qty' => 'required|integer'
        //   ]);
    // dd($request);
        $withdraw_transaction = WithdrawTranction::find($id);
        $withdraw_transaction->user_id = $request->get('user_id');
        $withdraw_transaction->withdraw_code = $request->get('withdraw_code');
        $withdraw_transaction->withdraw_date = $this->_date_format($request->get('withdrawdate'));
        $withdraw_transaction->get_money_date = $this->_date_format($request->get('getmoneydate'));
        $withdraw_transaction->amount = $request->get('amount');
        $withdraw_transaction->updated_at = date('Y-m-d H:i:s');

        $withdraw_transaction->save();

        return redirect('withdraw/withdraw_table')->with('success', 'ทำการบันทึกการ แก้ไขมูลเรียบร้อยแล้ว');
    
    }

    public function pay_money($id){
        $users = DB::table('users')->select('id', 'name', 'last_name')
                ->where('status', 1)->get();
        $wd_transaction = WithdrawTranction::find($id);
        $wd_transaction->withdraw_date = $this->reverse_date_format($wd_transaction->withdraw_date);
        $wd_transaction->get_money_date = $this->reverse_date_format($wd_transaction->get_money_date);
        return view('withdraw.pay_money', compact('users', 'wd_transaction'));
    }

    public function withdraw_history(){
        $withdraws = WithdrawTranction::where('withdraw_status', '!=' , 'pending')->get();
        return view('withdraw.withdraw_history',compact('withdraws'));
    }

    public function print($id){
        $withdraws = WithdrawTranction::where('withdraw_status' , 'pending')->get();

        $pdf = PDF::loadView('withdraw.withdraw_table2', compact('withdraws'));
        return $pdf->download('invoice.pdf');

    }

    public function _date_format($date){
        $date_arr = explode('/',$date);
        // $date_arr ที่ได้ จะเป็น 0->เดือน 1->วัน 2->ปี ->  จัดให้อยู่รูป Y-m-d(2-0-1)
        return $date_arr[2]."-".$date_arr[0]."-".$date_arr[1]." ".date('H:i:s');
    }

    public function reverse_date_format($date){
        $exp_date_and_time = explode(" ", $date);
        $date = $exp_date_and_time[0];
        $dateArr = explode('-', $date);
        //$dateArr ที่ได้ 0->ปี 1=เดือน 2->วัน แปลงเป็น เดือน/วัน/ ปี
        return  $dateArr[1]."/".$dateArr[2]."/".$dateArr[0];
    }

    private function create_withdraw_code($id_card){
        //ทำการสร้างเลขรหัสการถอนเงิน โดย หกตัวหน้าเป็น ปีเดือนวัน + เลขท้ายสี่ตัวของ id_card + รหัส อำเภอไปรษณีย์ของ user
        $lastthree_id = substr($id_card,-4);
        $withdraw_code = date('Ymd')."-".$lastthree_id."-35120";
        return $withdraw_code;
    }

    public function confrim_withdraw_status(Request $request){
       $update_status = WithdrawTranction::where('id', $request->id)->update(['withdraw_status' => 'complete']);
       
       echo  'true';
    }
}
