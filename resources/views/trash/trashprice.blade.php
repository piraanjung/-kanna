@extends('layouts.app')

@section('title')
     แก้ไขราคาขยะ
@endsection

@section('sidebar')
    @parent
    @include('trash/trash_sidebar',['index' => 3])
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
        <div class="row">
            <div class="col-md-7">ค้นหา : 
                <button class="btn btn-warning" data-filter="all">ทั้งหมด</button>
                <button class="btn btn-primary" data-filter="1">ขยะรีไซเคิล</button>
                <button class="btn btn-success" data-filter="2"> ขยะเปียก</button>
                <button class="btn btn-danger" data-filter="3">ขยะมีพิษ<div class="ripple-container"></div></button>
            </div>
            <div class="col-md-5">
                <form class="navbar-form">
                    <span class="bmd-form-group">
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control fltr-controls filtr-search" name="filtr-search" data-search placeholder="Search...">
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

{{-- <div class="card">
    <div class="card-body"> --}}
        <form action="{{url('trash/update_trashprice')}}" method="POST">
            <div class="card-footer ">
                    <button type="submit" class="btn btn-fill btn-rose">บันทึกการแก้ไขราคาขยะ<div class="ripple-container"></div></button>
                </div>
            @csrf
            <div class="row push-down">   
                <div class="filtr-container">
                    @foreach ($all_items as $item)

                    <div class="filtr-item col-sm-6 col-lg-3 cards" data-category="{{$item->item_cate_id}}" data-sort="value">
                            <div class="card card-pricing card-raised">
                              <div class="card-body">
                                <h4 class="card-category" style="color:black">{{$item->name}}</h4>
                                <div class="card-icon icon-rose">
                                    <img src="{{$item->image =="" ? asset("images/1543310594_trash_cat_2.jpg")  : asset("images/".$item->image)}}" alt="sample">
                                </div>
                                <h3 class="card-title">
                                    <input type="text" class="form-control" name="id[{{$item->id}}]" style="font-size:26px" value="{{$item->price}}">
                                    {{-- <label class="label-control">บาท</label> --}}
                                </h3>
                        
                              </div>
                            </div>
                          </div>

                    @endforeach
                </div> <!--filtr-container -->
            </div>
            
        </form>  
    {{-- </div><!-- card-body-->
</div> --}}

@endsection
