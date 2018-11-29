@extends('layouts.app')

@section('content')
<style>
.invoice {
    position: relative;
    background: #fff;
    border: 1px solid #f4f4f4;
    padding: 20px;
    margin: 10px 25px;
}
.page-header {
    /* margin: 10px 0 20px 0 !important; */
    font-size: 22px !important;
}
.page-header {
    /* padding-bottom: 9px !important; */
    /* margin: 40px 0 20px !important; */
    color: black !important;
    border-bottom: 1px solid #eee !important;
    min-height:0%
}
</style>
<div class="container-fluid">
        <div class="invoice"  id="invoice2">
                <!-- title row -->
                <div class="row">
                  <div class="col-xs-12 col-md-12">
                    <h2 class="page-header">
                      <i class="fa fa-globe"></i> AdminLTE, Inc.
                      <small class="pull-right"> - {{date('d/m/Y')}}</small>
                    </h2>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-6 col-md-6 invoice-col">
                    From
                    <address>
                      <strong>Admin, Inc.</strong><br>
                      795 Folsom Ave, Suite 600 San Francisco, CA 94107<br>
                      Phone: (804) 123-5432<br>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6 col-md-6 invoice-col">
                    To
                    <address>
                      <strong>{{$wd_transaction->users->name}} {{$wd_transaction->users->last_name}}</strong><br>
                      {{$wd_transaction->users->address}}
                      อ.{{$wd_transaction->users->district->amphur_name}} จ.{{$wd_transaction->users->province->province_name}} 
                      {{$wd_transaction->users->zipcode}}<br>
                      โทรศัพท์:{{$wd_transaction->users->mobile}}
                    
                    </address>
                  </div>
                  <!-- /.col -->
                
                  <!-- /.col -->
                </div>
                <!-- /.row -->
          
                <!-- Table row -->
                <div class="row">
                  <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>เลขที่</th>
                        <th>รายการ</th>
                        <th>วันที่ทำรายการ</th>
                        <th>วันที่รับเงิน</th>
                        <th>จำนวน(บาท)</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>{{$wd_transaction->withdraw_code}}</td>
                        <td>ถอนเงิน</td>
                        <td>{{$wd_transaction->withdraw_date}}</td>
                        <td>{{$wd_transaction->get_money_date}}</td>
                        <td>{{$wd_transaction->amount}}</td>
                      </tr>
                    
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
          
                <div class="row">
                  <!-- accepted payments column -->
                  <div class="col-xs-6 col-md-6">
                    <p class="lead">Payment Methods:</p>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="label-control">ผู้ถอน</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="label-control">เจ้าหน้าที่</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-xs-6 col-md-6">
                    <p class="lead">ยอดเงินสะสม </p>
          
                    <div class="table-responsive">
                      <table class="table">
                        <tbody>
                        <tr>
                          <th>คงเหลือ:</th>
                          <td>265.24</td>
                        </tr>
                      </tbody></table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-xs-12 col-md-12">
                    <a href="javascript:withdraw_print('invoice')" target="_blank" class="btn btn-success pull-right"><i class="fa fa-print"></i> Print</a>
                    <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                      <i class="fa fa-download"></i> Generate PDF
                    </button>
                  </div>
                </div>
              </div>
</div>
@endsection
