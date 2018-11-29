@extends('layouts.app')
@section('title')
     สร้างข้อมูล staff
@endsection

@section('sidebar')
    @parent
    @include('trash/trash_sidebar',['index' => 5])
@endsection

@section('content')
    <div class="container-fluid">
  
        <form action="{{url('trash_staff/store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @include('trash_staff/form',['formMode'=>'create'])
        </form>
                
</div><!-- container-fluid -->                  

@endsection