@extends('layouts.app')
@section('title')
     สร้างรายการขยะ
@endsection

@section('sidebar')
    @parent
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
                    <h4 class="card-title">ฟอร์มสร้างรายการขยะ</h4>
                </div>
                <div class="card-body ">
                    <form action="{{url('deposit/store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @include('trashbank.deposit.form', ['formMode' => 'create'])
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