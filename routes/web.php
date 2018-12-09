<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('withdraw/index', 'WithdrawController@index');
Route::get('withdraw/withdraw_table', 'WithdrawController@withdraw_table');
Route::get('withdraw/withdraw_form', 'WithdrawController@withdraw_form');
Route::post('withdraw/withdraw_store', 'WithdrawController@withdraw_store');
Route::get('withdraw/edit/{id}', 'WithdrawController@edit');
Route::patch('withdraw/update/{id}', 'WithdrawController@update');
Route::get('withdraw/pay_money/{id}', 'WithdrawController@pay_money');

Route::get('print/statement', 'PrintController@pay_money_statement');
Route::get('withdraw/print/{id}', 'WithdrawController@print');
Route::post('withdraw/confrim_withdraw_status', 'WithdrawController@confrim_withdraw_status');
Route::get('withdraw/withdraw_history', 'WithdrawController@withdraw_history');

Route::get('trash/dashboard', 'TrashController@index');
Route::get('trash/trash_lists', 'TrashController@trash_lists');
Route::get('trash/create', 'TrashController@create');
Route::post('trash/store', 'TrashController@store');
Route::get('trash/edit/{id}', 'TrashController@edit');
Route::patch('trash/update/{id}', 'TrashController@update');
Route::get('trash/trashprice', 'TrashController@trashprice');
Route::post('trash/update_trashprice', 'TrashController@update_trashprice');

Route::get('staff_operate_schedule/index', 'StaffOperateScheduleController@index');
Route::get('staff_operate_schedule/create', 'StaffOperateScheduleController@create');
Route::post('staff_operate_schedule/get_trash_operate_points', 'StaffOperateScheduleController@get_trash_operate_points');
Route::post('staff_operate_schedule/store', 'StaffOperateScheduleController@store');

Route::get('trash_staff/index', 'TrashStaffController@index');
Route::get('trash_staff/create', 'TrashStaffController@create');
Route::post('trash_staff/get_districts', 'TrashStaffController@get_districts');
Route::post('trash_staff/get_tambons', 'TrashStaffController@get_tambons');
Route::post('trash_staff/store', 'TrashStaffController@store');

Route::get('get_jquery/check_bottle_barcode/{id}', 'GetJQueryController@check_bottle_barcode');
Route::post('get_jquery/store_bottles', 'GetJQueryController@store_bottles');


Route::post('/authen', 'AuthenController@authen');
Route::post('/authen-by-password-and-phone','AuthenController@authen_by_password_and_phone');


Route::get('settings/buy_trash_area/index', 'settings\BuyTrashAreaController@index');
Route::get('settings/buy_trash_area/create', 'settings\BuyTrashAreaController@create');
Route::post('settings/buy_trash_area/store', 'settings\BuyTrashAreaController@store');
Route::get('settings/buy_trash_area/edit/{id}', 'settings\BuyTrashAreaController@edit');
Route::patch('settings/buy_trash_area/update/{id}', 'settings\BuyTrashAreaController@update');
Route::get('settings/buy_trash_area/delete/{id}', 'settings\BuyTrashAreaController@delete');

Route::get('settings/buy_trash_point/index', 'settings\BuyTrashPointController@index');
Route::get('settings/buy_trash_point/create', 'settings\BuyTrashPointController@create');
Route::post('settings/buy_trash_point/store', 'settings\BuyTrashPointController@store');
Route::get('settings/buy_trash_point/edit/{id}', 'settings\BuyTrashPointController@edit');
Route::patch('settings/buy_trash_point/update/{id}', 'settings\BuyTrashPointController@update');
Route::get('settings/buy_trash_point/delete/{id}', 'settings\BuyTrashPointController@delete');