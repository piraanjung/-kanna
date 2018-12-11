<div class="row">
    <div class="col-md-5">
        <div class="row">
            <label class="col-md-3 col-form-label">ชื่อผู้ฝาก</label>
            <div class="col-md-9">
                <div class="form-group has-default bmd-form-group">
                    <select class="form-control select2" name="user_id">
                        @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}} {{$user->last_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div><!--col-md-5-->
    <div class="col-md-4">
        <div class="form-group bmd-form-group">
            <label for="exampleEmail" class="bmd-label-floating">รหัสการซื้อ</label>
            <input type="text" class="form-control" id="invoice_code" name="invoice_code">
        </div>
    </div><!--col-md-4 -->
    <div class="col-md-3">

    </div><!-- col-md-3 -->
</div><!-- row -->




<div>
    <table class="table" id="trashbanktable">
        <thead>
            <th>รายการขยะ</th>
            <th>ราคา/หน่วย</th>
            <th>จำนวน:หน่วย</th>
            <th>คิดเป็นเงิน</th>
            <th></th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="form-group has-default bmd-form-group">
                        <select class="form-control select2" name="item" id="item">
                            <option value="0">เลือก..</option>
                            @foreach ($items as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
                <td><input type="text" class="form-control" name="price[]" id="price_1"></td>
                <td><input type="text" class="form-control" name="amount[]" id="amount_1"></td>
                <td><input type="text" class="form-control" name="total[]" id="total_1"></td>
                <td>
                    <a href="javascript:add_item_row(1)" class="btn btn-just-icon btn-round btn-twitter" id="plus_1">
                        <i class="fa fa-plus"></i>
                        <div class="ripple-container"></div>
                    </a>
                    <a href="javascript:remove_item_row(1)" class="btn btn-just-icon btn-round btn-google" id="minus_1"
                        style="display:none">
                        <i class="fa fa-minus"></i>
                        <div class="ripple-container"></div>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="form-group">
    <button type="submit" class="btn {{$formMode == 'create' ? 'btn-success' : 'btn-warning'}}">
        {{$formMode == 'create' ? 'บันทึก' : 'บันทึกการแก้ไข'}}
    </button>
</div>
