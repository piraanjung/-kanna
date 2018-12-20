<?php

namespace App\Http\Controllers\account_saving;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AccountSaving;
use App\User;
use App\Http\Controllers\deposit_transaction\DepositTransactionController;
use App\Http\Controllers\transfer_transaction\TransferTransactionController;
use App\Http\Controllers\withdrawal_transaction\WithdrawalTransactionController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

class AccountSavingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    private $response = array('status' => 1);

    public function setNewAccountSaving($user_id)
    {
        $account_saving = new AccountSaving();
        $account_saving->user_id = $user_id;
        $account_saving->balance = 0;
        $account_saving->status = 'complete';
        $account_saving->save();
        $lastId = $account_saving->id;
        return $lastId;
    }

    public function find($id)
    {
        $result = AccountSaving::find($id);
        $code = 200;
        if (collect($result)->isEmpty()) {
            $code = 204;
        }

        return response()->json($result, $code);
    }

    public function findAccountSavingByUserId($user_id)
    {
      $result = AccountSaving::where('user_id', $user_id)->first();
      return $result;
    }

    public function increaseAccountBalance($account_saving_id, $balance)
    {
        $account_saving = AccountSaving::find($account_saving_id);
        if (!collect($account_saving)->isEmpty() && $account_saving_id !='') {
          $account_saving->balance += $balance;
          $account_saving->save();
        }
    }

    public function decreaseAccountBalance($account_saving_id, $balance)
    {
        $account_saving = AccountSaving::find($account_saving_id);
        if (!collect($account_saving)->isEmpty() && $account_saving_id !='') {
          $account_saving->balance -= $balance;
          $account_saving->status =1;
          $account_saving->updated_at = date('Y-m-d H:i:s');
          $account_saving->save();
        }
    }

    public function updateAccountSaving($request)
    {
        $user_id = $request->seller_id;
        $balance = $request->balance;

        if ($request->has('account_saving_id') && $request->account_saving_id != 0) {
            $this->increaseAccountBalance($request->account_saving_id, $balance);
        } else {
            $account_saving_id = $this->setNewAccountSaving($user_id);
            $this->increaseAccountBalance($account_saving_id, $balance);
        }
    }

    public function getAccountSavingByUserId($user_id) {
      $result = $this->findAccountSavingByUserId($user_id);
      return response()->json($result, 200);
    }

    public function transferMoney(Request $request)
    {
      $account_saving_transfer_id = ($request->has('account_saving_transfer_id')? $request->account_saving_transfer_id : 0);
      $account_saving_receive_id = ($request->has('account_saving_receive_id')? $request->account_saving_receive_id : 0);
      $amount = ($request->has('amount')? $request->amount : 0);

      if ($account_saving_transfer_id != 0 && $account_saving_receive_id != 0 && $amount != 0) {
        $this->decreaseAccountBalance($account_saving_transfer_id, $amount);
        $this->increaseAccountBalance($account_saving_receive_id, $amount);

        $transfer = new TransferTransactionController;
        $transfer->create($request);
        $response = ['status'=>1, 'message'=>'Transfer Successfully'];
        $code = 200;
      }else {
        $response = ['status'=>0, 'message'=>'Transfer Failed'];
        $code = 204;
      }

      return response()->json($response, $code);
    }

    public function withdrawMoney(Request $request)
    {
      $account_saving_id = ($request->has('account_saving_id')? $request->account_saving_id : 0);
      $amount = ($request->has('amount')? $request->amount : 0);

      if ($account_saving_id != 0 && $amount != 0) {
        $this->decreaseAccountBalance($account_saving_id, $amount);

        $transfer = new WithdrawalTransactionController;
        $transfer->create($request);
        $response = ['status'=>1, 'message'=>'Withdraw Successfully'];
        $code = 200;
      }else {
        $response = ['status'=>0, 'message'=>'Withdraw Failed'];
        $code = 204;
      }

      return response()->json($response, $code);
    }

    public function validateTransferPasswords($transfer_passwords, Request $request)
    {
      $user_id = $request->has('user_id')? $request->user_id : 0;
      $user = Users::find($user_id);
      $result = ['status'=>0, 'message'=>'Failed'];
      
      if (!collect($user)->isEmpty() && (Hash::check($transfer_passwords, $user->transfer_passwords))) {
        $result = ['status'=>1, 'message'=>'Validated'];
      }

      return response()->json($result, 200);
    }

    public function getAccountStatements(Request $request) {
      $user_id = $request->has('user_id')? $request->user_id : 0;

      $deposit = new DepositTransactionController;
      $deposit_results = $deposit->transactionsByUserId($user_id);
      $deposit_results = $deposit->setFormatStatements($deposit_results);

      $withdraw = new WithdrawalTransactionController;
      $withdraw_results = $withdraw->transactionsByUserId($user_id);
      $withdraw_results = $withdraw->setFormatStatements($withdraw_results);

      $transfer = new TransferTransactionController;
      $transfer_results = $transfer->transactionsByUserTransferId($user_id);
      $transfer_results = $transfer->setFormatStatements($transfer_results);
      
      $collection = collect($deposit_results);
      $merged = $collection->merge($withdraw_results);
      $merged = $collection->merge($transfer_results);
      $results = $merged->all();
      
      $collection = collect($results);
      $sorted = $collection->sortByDesc('datetime');
      $results = $sorted->values()->all();
  
      return response()->json($results, 200);
    }
}
