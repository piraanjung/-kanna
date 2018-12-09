@extends('layouts.app')
@section('title')
     สร้างรายการขยะ
@endsection

@section('sidebar')
    @parent
    @include('trash/trash_sidebar',['index' => 7])
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
                    <h4 class="card-title">ฟอร์มแก้รายการขยะ</h4>
                </div>
                <div class="card-body ">
                    <form action="{{url('settings/buy_trash_point/update/'.$buy_trash_point->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        @include('settings/buy_trash_point.form', ['formMode' => 'update'])
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