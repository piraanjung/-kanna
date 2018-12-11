@extends('layouts.app')


@section('content')
{{-- {{$edit_withdraw}} --}}
@if(Session::has('status'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
@endif
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">สร้างข้อมูลการถอนเงิน</h4>
                </div>
            </div>
            <div class="card-body ">
                <form  action="{{url('withdraw/withdraw_store')}}" method="post" class="form-horizontal">
                    @csrf
                    <div style="float:right">
                            <div class="card-header card-header-primary card-header-text">
                                <div class="card-text">
                                <label class="">ยอดเงินสะสม</label>
                                    <input type="text" id="acc_balance" style="text-align:right" class="form-control" value="0" readonly> 
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">ชื่อ-สกุลผู้ถอนเงิน</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                    <select class="select2" name="user_id" id="withdrawer">
                                        <option value="">เลือกชื่อผู้ถอนเงิน</option>
                                        {{-- <option>เลือก...</option> --}}
                                        @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}} {{$user->last_name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">เลขบัตรประจำตัว</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" class="form-control id_card" name="id_card">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">วันที่ถอน</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" class="form-control datepicker" name="withdrawdate">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">วันที่รับเงิน</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group is-filled">
                                <input type="text" class="form-control datepicker" name="getmoneydate">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">จำนวนเงินที่ถอน</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="text" class="form-control withdraw_amount" placeholder="" name="amount">
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



