@extends('layouts.app')

@section('content')
{{-- {{dd($wd_transaction)}} --}}
    <div class="container-fluid">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">แก้ไขข้อมูลการถอนเงิน</h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                            </div><br />
                        @endif
                        <form method="post" action="{{ url('withdraw/update', $wd_transaction->id) }}">
                            @method('PATCH')
                            @csrf

                            <div class="row">
                                    <label class="col-sm-2 col-form-label">รหัสการถอนเงินเลขที่</label>
                                    <div class="col-sm-3">
                                        <div class="form-group bmd-form-group">
                                            <input type="text" class="form-control" name="withdraw_code" value="{{$wd_transaction->withdraw_code}}" readonly>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">ชื่อ-สกุลผู้ถอนเงิน</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group">
                                            <select class="" name="user_id">
                                                <option value="">เลือกชื่อผู้ถอนเงิน</option>
                                                {{-- <option>เลือก...</option> --}}
                                                @foreach ($users as $user)
                                                <option value="{{$user->id}}" {{ $user->id == $wd_transaction->user_id ? 'selected="selected"' : '' }}>{{$user->name}} {{$user->last_name}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">เลขบัตรประจำตัว</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control" name="id_card" value="{{$wd_transaction->users->id_card}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">วันที่ถอน</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control datepicker" name="withdrawdate" value="{{$wd_transaction->withdraw_date}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">วันที่รับเงิน</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group is-filled">
                                        <input type="text" class="form-control datepicker" name="getmoneydate" value="{{$wd_transaction->get_money_date}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">จำนวนเงินที่ถอน</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="" name="amount" value="{{$wd_transaction->amount}}">
                                    </div>
                                </div>
                            </div>
        
                            <div class="card-footer ">
                                    <div class="row">
                                      <div class="col-md-9">
                                        <button type="submit" class="btn btn-fill btn-rose">บันทึก<div class="ripple-container"></div></button>
                                      </div>
                                    </div>
                                  </div>
                          
                        </form>
                    </div>
                </div>
            </div>
           
        </div><!-- /.container-fluid -->

@endsection