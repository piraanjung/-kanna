<?php

namespace App\Http\Controllers\Trashbank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DepositTransaction;
use App\User;
use App\Items;
use App\PurchaseItems;
use App\PurchaseTransaction;
use App\AccountSaving;

class DepositController extends Controller
{
    public function index(){
        $deposit_trans = DepositTransaction::where('status' , 1)->get();
        return view('trashbank.deposit.index', [
            'deposit_trans' => $deposit_trans
        ]);
    }

    public function create(){
        $deposit = new DepositTransaction;
        $users = User::where('status', 1)->get();
        $items = Items::where('status', 1)->get();
        return view('trashbank.deposit.create', [
            'deposit' => $deposit,
            'users' => $users,
            'items' => $items
        ]);
    }

    public function store(Request $request){
        $balance = 0;
        //บันทึกลง purchase_items
        $purchaseItems = new PurchaseItems;
        $purchaseItems->invoice = $request->invoice_code;
        $purchaseItems->buyer_id = $request->user_id;
        $purchaseItems->seller_id = $request->user_id;
        $purchaseItems->balance = $balance;
        $purchaseItems->status = 1;
        $purchaseItems->created_at = date('Y-m-d H:i:s');
        $purchaseItems->updated_at = date('Y-m-d H:i:s');
        $purchaseItems->save();
        //บันทีกรายการซื้อขยะลง PurchaseTransaction
        foreach($request['add'] as $key  => $req){
            $purchaseTrans = new PurchaseTransaction;
            $purchaseTrans->purchase_item_id = $purchaseItems->id;
            $purchaseTrans->item_id = $req['item_id'];
            $purchaseTrans->price = $req['price'];
            $purchaseTrans->amount = $req['amount'];
            $purchaseTrans->balance = $req['total'];
            $purchaseTrans->status = 1;
            $purchaseTrans->created_at = date('Y-m-d H:i:s');
            $purchaseTrans->updated_at = date('Y-m-d H:i:s');
            $purchaseTrans->save();
            $balance += $req['total'];
        }
       
        //update balance ใน PurchaseItems
        $update_store = PurchaseItems::where('id', $purchaseItems->id)->first();
        $update_store->balance = $balance;
        $update_store->save();
       
        //insert จำนวนเงินรวม ลง ใน Deposit_transaction table
        $depositTrans = new DepositTransaction;
        $depositTrans->user_id = $request->user_id;
        $depositTrans->purchase_item_id = $purchaseItems->id;
        $depositTrans->amount = $balance;
        $depositTrans->status = 1;
        $depositTrans->created_at = date('Y-m-d H:i:s');
        $depositTrans->updated_at = date('Y-m-d H:i:s');
       $depositTrans->save();

        //บวกยอดเงินสะสม ที่ AccountSaving
        $accSaving = AccountSaving::where('user_id', $request->user_id)->first();
        $accSaving->balance = $accSaving->balance + $balance;
        $accSaving->status = 1;
        $accSaving->updated_at = date('Y-m-d H:i:s');
        $accSaving->save();

        return redirect('deposit/index')->with('message', 'ทำการบันทึกการรับซื้อขยะเรียบร้อยแล้ว');
    }
}
