@extends('layouts.app')
@section('title')
     จัดการตารางรับซื้อขยะ
@endsection

@section('sidebar')
 @include('trash/trash_sidebar',['index' => 4])
@endsection

@section('content')
    <form action="{{url('staff_operate_schedule/store')}}" method="POST">
        @csrf
        @include('staff_operate_schedule/form', ['formMode' =>'create']);
    </form>
@endsection