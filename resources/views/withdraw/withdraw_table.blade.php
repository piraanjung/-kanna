@extends('layouts.app')
@section('title')
    ถอนเงิน
@endsection
@section('sidebar')
     @parent
     @include('withdraw.withdraw_sidebar',['index'=>2])
@endsection

@section('content')
@if(session()->get('session'))
<div class="alert alert-success">
    {{ session()->get('success') }}
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
                    <h4 class="card-title">ข้อมูลการขอถอนเงิน</h4>
                    <a href="{{url('withdraw/withdraw_form')}}" class="btn btn-primary btn-round" style="float:right">ถอนเงิน</a>

                </div>
                <div class="card-body">
                    <table class="table dataTable" id="myTable">
                        <thead>
                            <tr>
                                <th>ชื่อ-สกุล</th>
                                <th>รหัสการถอน</th>
                                <th>จำนวนเงิน</th>
                                <th>วันที่ทำเรื่อง</th>
                                <th>วันที่มารับเงิน</th>
                                <th>สถานะ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($withdraws as $withdraw)
                            <tr>
                                <td>{{$withdraw->users->name}}  {{$withdraw->users->last_name}}</td>
                                <td>{{$withdraw->withdraw_code}}</td>
                                <td>{{$withdraw->amount}}</td>
                                <td>{{$withdraw->withdraw_date}}</td>
                                <td>{{$withdraw->get_money_date}}</td>
                                <td>{{$withdraw->withdraw_status}}</td>
                                <td class="td-actions text-right">
                                    <a href="{{url('withdraw/pay_money',$withdraw->id)}}" rel="tooltip" class="btn btn-primary" data-original-title="" title="">
                                        <i class="material-icons">money</i>
                                    </a>
                                    <a href="{{url('withdraw/edit',$withdraw->id)}}" rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a href="{{url('withdraw/delete',$withdraw->id)}}" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
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
