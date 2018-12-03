@extends('layouts.app')
@section('title')
     จัดการตารางรับซื้อขยะ
@endsection

@section('sidebar')
 @include('trash/trash_sidebar',['index' => 4])
@endsection

@section('content')
    @if ($staff_count > 0)
        <form action="{{url('staff_operate_schedule/store')}}" method="post">
            @csrf
            @include('staff_operate_schedule/form', ['formMode' =>'create']);
        </form>
    @else
        <div class="row">
            <div class="col-md-8 mr-auto ml-auto">
                <div class="card">
                    <div class="card-body">
                        <h3 class="title text-center">ยังไม่มีการเพิ่มข้อมูล Staff ต้องทำการเพิ่มข้อมูล Staff ก่อน</h3>
                        <ul class="nav nav-pills nav-pills-warning nav-pills-icons justify-content-center" role="tablist">
                                
                                <li class="nav-item">
                                  <a class="nav-link active" href="{{url('trash_staff/index')}}" role="tablist">
                                    <i class="material-icons">person_add</i> เพิ่มข้อมูล Staff
                                  </a>
                                </li>
                               
                              </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
@endsection