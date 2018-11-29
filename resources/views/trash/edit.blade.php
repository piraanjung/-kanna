@extends('layouts.app')
@section('title')
     แก้ไขรายการขยะ
@endsection

@section('sidebar')
 @include('trash/trash_sidebar',['index' => 2])
@endsection

@section('content')
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">mail_outline</i>
                    </div>
                    <h4 class="card-title">ฟอร์มแก้ไขรายการขยะ</h4>
                </div>
                <div class="card-body ">
                    <form action="{{url('trash/update/'.$trash->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        @include('trash/trash_form',['formMode'=>'edit'])
                    </form>
                </div>
                <!--card-body-->
            </div>
            <!--card-->
        </div>
        <!--col md 12 -->
    </div><!-- row -->
</div><!-- container-fluid -->                  

@endsection