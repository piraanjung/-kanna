@extends('layouts.app')
@section('title')
     สร้างรายการขยะ
@endsection

@section('sidebar')
    @parent
    @include('trash/trash_sidebar',['index' => 2])
@endsection

@section('content')
@section('content')
@if(session()->get('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div><br />
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">ข้อมูลผู้ใช้งานระบบ</h4>
                    <a href="{{url('users/create')}}" class="btn btn-primary btn-round" style="float:right">เพิ่มผู้ใช้งานระบบ</a>

                </div>
                <div class="card-body">
                    <?php $i=1;?>
                    <table class="table dataTable" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อ-สกุล</th>
                                <th>เบอร์โทร</th>
                                <th>ตำบล</th>
                                <th>อำเภอ</th>
                                <th>จังหวัด</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$user->name}}  {{$user->last_name}}</td>
                                <td>{{$user->mobile}}</td>
                                <td>{{$user->amphur_id}}</td>
                                <td>{{$user->district_id}}</td>
                                <td>{{$user->province_id}}</td>
                                <td class="td-actions text-right">
                                    <a href="{{url('user/pay_money',$user->id)}}" rel="tooltip" class="btn btn-primary" data-original-title="" title="">
                                        <i class="material-icons">money</i>
                                    </a>
                                    <a href="{{url('user/edit',$user->id)}}" rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a href="{{url('user/delete',$user->id)}}" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                        <i class="material-icons">close</i>
                                    </a>
                                </td>
                        
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!--c0rd-body -->
            </div>
           
        </div><!-- col-md-12 -->
    </div><!--row -->

</div><!-- /.container-fluid -->

@endsection

@endsection
