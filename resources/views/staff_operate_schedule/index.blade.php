@extends('layouts.app')
@section('title')
     จัดการตารางรับซื้อขยะ
@endsection

@section('sidebar')
 @include('trash/trash_sidebar',['index' => 4])
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

<a href="{{ url('staff_operate_schedule/create') }}" class="btn btn-info">เพิ่มข้อมูล</a>
<a href="{{ url('staff_operate_schedule/history') }}" class="btn">ประวัติ</a>

@foreach ($during_staff_schedule as $items)
<div class="col-12">
    <!--      Wizard container        -->
    <div class="wizard-container">
      <div class="card card-wizard active" data-color="rose" id="wizardProfile">
          <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
          <div class="card-header text-center">
            <h3 class="card-title">
              เจ้าหน้าที่ผู้รับผิดชอบการรับซื้อขยะ
            </h3>
            {{-- <h5 class="card-description">This information will let us know more about you.</h5> --}}
          </div>
          <div class="wizard-navigation">
            <ul class="nav nav-pills">
              <li class="nav-item" style="width: 33.3333%;">
                <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                    
                </a>
              </li>
              <li class="nav-item" style="width: 33.3333%;">
                <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                    พื้นที่รับซื้อ : <h4>{{$items[0]->buy_trash_area->area_name}} </h4>
                </a>
              </li>
              <li class="nav-item" style="width: 33.3333%;">
                <a class="nav-link" href="#address" data-toggle="tab" role="tab">
                    จุดรับซื้อ : <h4>{{$items[0]->buy_trash_point->point_name}}</h4>
                </a>
              </li>
            </ul>
          <div class="moving-tab" style="width: 238.885px; transform: translate3d(-8px, 0px, 0px); transition: transform 0s ease 0s;">
              วันที่ : {{$items[0]->operation_date}} <br>เวลา : {{$items[0]->operation_time}}
                </div></div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="about">
            <div class="row">
            @foreach ($items as $item)
            
            <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-avatar">
                    <a href="#pablo">
                      <img class="img" src="{{asset('assets/img/faces/marc.jpg')}}">
                    </a>
                  </div>
                  <div class="card-body">
                    <h6 class="card-category text-gray">{{$item->user->id_card}}</h6>
                    <h4 class="card-title">{{$item->user->name}} {{$item->user->last_name}}</h4>
                        <div class="card-footer">
                            <div class="price">
                              <h4>{{$item->user->mobile}}</h4>
                            </div>
                            <div class="stats">
                              <p class="card-category"><i class="material-icons">phone</i> เบอร์โทร</p>
                            </div>
                          </div>
                          <div class="card-footer">
                              <div class="price">
                                <h4>{{$item->status}}</h4>
                              </div>
                              <div class="stats">
                                <p class="card-category"><i class="material-icons">people</i> สถานะ</p>
                              </div>
                            </div>
                    {{-- <a href="#pablo" class="btn btn-rose btn-round">Follow</a> --}}
                  </div>
                </div>
              </div>
               
            @endforeach 
          </div>                          
        </div>
      </div>
     
  </div>
</div>
<!-- wizard container -->
</div>
@endforeach

@endsection