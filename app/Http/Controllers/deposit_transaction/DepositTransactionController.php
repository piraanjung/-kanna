<?php

namespace App\Http\Controllers\deposit_transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\deposit_transaction\DepositTransaction;
use App\Http\Controllers\utilities\ImageController;
use App\Http\Controllers\utilities\DatetimeController;

class DepositTransactionController extends Controller
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

    private $path = 'user_images/';
    private $items = [
        'deposit_transaction.id',
        'deposit_transaction.amount',
        'deposit_transaction.updated_at',
        'users.name',
        'users.last_name',
        'users.mobile',
        'users.image'
    ];

    public function create($request, $purchase_item_id)
    {
        $deposit = new DepositTransaction;
        $deposit->user_id = $request->buyer_id;
        $deposit->purchase_item_id = $purchase_item_id;
        $deposit->amount = $request->balance;
        $deposit->status = 1;
        $deposit->save();
    }

    public function transactionsByUserId($id)
    {
        $results = DepositTransaction::where([
          ['deposit_transaction.user_id','=', $id],
          ['deposit_transaction.status','=', 1]
        ])
        ->select($this->items)
        ->leftJoin('users', 'deposit_transaction.user_id', '=', 'users.id')
        ->take(10)
        ->get();

        return $results;
    }

    public function setFormatStatements($results)
    {
        $image = new ImageController;
        $results = $image->getImagesUrl($results, $this->path);

        $datetime = new DatetimeController;
        $results = $datetime->setDateTimeTH($results);
        
        foreach ($results as $key => $value) {
            $results[$key]['datetime'] = strtotime($value['updated_at']);
            $results[$key]['statement_categories_id'] = 1;
            $results[$key]['statement_categories_label'] = 'เงินฝาก';
            unset($value['image']);
            unset($value['updated_at']);
        }

        return $results;
    }
}
