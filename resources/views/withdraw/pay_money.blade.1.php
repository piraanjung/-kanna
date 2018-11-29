@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="col-md-10 col-12 mr-auto ml-auto">
        <!--      Wizard container        -->
        <div class="wizard-container">
            <div class="card card-wizard active" data-color="rose" id="wizardProfile">
                <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                <div class="card-header text-center">
                    <h3 class="card-title">
                        การถอนเงิน
                    </h3>
                    <h5 class="card-description">Withdraw Confirmation</h5>
                </div>
                <div id="withdraw_print">
                    <div class="wizard-navigation">
                        <ul class="nav nav-pills">
                            <li class="nav-item" style="width: 33.3333%;">
                                <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                                    About
                                </a>
                            </li>
                            <li class="nav-item" style="width: 66.6666%;">
                                <a class="nav-link" href="#account" data-toggle="tab" role="tab" style="text-align:right">
                                    <h3 class="card-title">
                                        การถอนเงิน
                                    </h3>
                                </a>
                            </li>

                        </ul>
                        <div class="moving-tab" style="width: 238.885px; transform: translate3d(-8px, 0px, 0px); transition: transform 0s ease 0s;">
                            เลขที่ : {{$wd_transaction->withdraw_code}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="card card-stats">
                                    <div class="card-header card-header-rose card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">equalizer</i>
                                        </div>
                                        <p class="card-category">ยอดเงินคงเหลือ</p>
                                        <h3 class="card-title">75.52</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            {{-- <i class="material-icons">local_offer</i> Tracked from Google Analytics
                                            --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-profile">
                                    {{-- <div class="card-avatar">
                                        <a href="#pablo">
                                            <img class="img" src="{{asset('assets/img/faces/marc.jpg')}}">
                                        </a>
                                    </div> --}}
                                    <div class="card-body">
                                        <h6 class="card-category text-gray">ผู้ถอน</h6>
                                        <h4 class="card-title">{{$wd_transaction->users->name}}
                                            {{$wd_transaction->users->last_name}}</h4>
                                        <p class="card-description">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-profile">
                                    {{-- <div class="card-avatar">
                                        <a href="#pablo">
                                            <img class="img" src="{{asset('assets/img/faces/marc.jpg')}}">
                                        </a>
                                    </div> --}}
                                    <div class="card-body">
                                        <h6 class="card-category text-gray">เจ้าหน้าที่</h6>
                                        <h4 class="card-title">{{$wd_transaction->users->name}}
                                            {{$wd_transaction->users->last_name}}</h4>
                                        <p class="card-description">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card ">
                                    <div class="card-header card-header-rose card-header-text">
                                        <div class="card-icon">
                                            <i class="material-icons">today</i>
                                        </div>
                                        <h4 class="card-title">วันที่ถอนเงิน</h4>
                                    </div>
                                    <div class="card-body ">
                                        <div class="form-group bmd-form-group is-filled">
                                            <input type="text" class="form-control" value="{{$wd_transaction->withdraw_date}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card ">
                                    <div class="card-header card-header-rose card-header-text">
                                        <div class="card-icon">
                                            <i class="material-icons">library_books</i>
                                        </div>
                                        <h4 class="card-title">วันที่รับเงิน</h4>
                                    </div>
                                    <div class="card-body ">
                                        <div class="form-group bmd-form-group is-filled">
                                            <input type="text" class="form-control" value="{{$wd_transaction->get_money_date}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card ">
                                    <div class="card-header card-header-rose card-header-text">
                                        <div class="card-icon">
                                            <i class="material-icons">av_timer</i>
                                        </div>
                                        <h4 class="card-title">จำนวนเงินที่ถอน</h4>
                                    </div>
                                    <div class="card-body ">
                                        <div class="form-group bmd-form-group is-filled">
                                            <input type="text" class="form-control" value="{{$wd_transaction->amount}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--withdraw_print -->
                <div class="card-footer">
                    <div class="ml-auto">
                        {{-- <input type="submit" class="btn btn-next btn-fill btn-success btn-wd" name="next" value="ยืนยัน และ ปริ้น"> --}}
                        <input type="button" id="withdraw_print_btn" class="btn btn-next btn-fill btn-success btn-wd" name="next" value="ยืนยัน และ ปริ้น">

                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
        <!-- wizard container -->
    </div>
</div>
@endsection
