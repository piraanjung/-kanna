@extends('layouts.app')

@section('title')
เจ้าหน้าที่จัดการขยะ
@endsection

@section('sidebar')
@parent
@include('trash/trash_sidebar',['index' => 5])
@endsection

@section('content')

@if (session('message'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info alert-with-icon" data-notify="container">
            <i class="material-icons" data-notify="icon">notifications</i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
            </button>
            <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
            <span data-notify="message">{{session('message')}}</span>
        </div>
    </div>
</div>
@endif

<div class="card">
    <div class="card-body">
        <div class="row ">
            <div class="col-md-7">
                <a href="{{url('trash_staff/create')}}" class="btn btn-warning">เพิ่มเจ้าหน้าที่จัดการขยะ</a>
            </div>
            <div class="col-md-5">
                <form class="navbar-form">
                    <span class="bmd-form-group">
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control fltr-controls filtr-search" name="filtr-search"
                                data-search placeholder="Search...">
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </span>
                </form>
            </div>
        </div>
    </div>
</div><!-- card -->

<div class="card">
    <div class="card-body">

        <div class="row push-down">
            <div class="filtr-container">
                @foreach ($staffs as $item)
                <div class="filtr-item col-sm-6 col-lg-3 cards" data-category="{{$item->item_cate_id}}" data-sort="value">
                    <div class="card card-profile">
                        <div class="card-avatar">
                            <a href="#pablo">
                                <img class="img" src="{{asset('assets/img/faces/marc.jpg')}}">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{$item->profile->name}} {{$item->profile->lastname}}</h4>
                            <div class="card-footer">
                                <div class="price">
                                    <h4>{{$item->profile->phone}}</h4>
                                </div>
                                <div class="stats">
                                    <p class="card-category"><i class="material-icons">phone</i> โทรศัพท์</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="price">
                                    <h4>$1.119/night</h4>
                                </div>
                                <div class="stats">
                                    <p class="card-category"><i class="material-icons">place</i> London, UK</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!--filtr-container -->
        </div>
        </form> 
    </div><!-- card-body-->
</div>

@endsection
