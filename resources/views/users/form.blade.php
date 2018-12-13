<div class="row">
    <div class="form-group bmd-form-group col-md-4">
        <label for="name" class="bmd-label-floating">ชื่อ</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
    </div>
    <div class="form-group bmd-form-group col-md-4">
        <label for="last_name" class="bmd-label-floating">สกุล</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}">
    </div>
    <div class="form-group bmd-form-group col-md-4">
        <label for="id_card" class="bmd-label-floating">เลขบัตรประชาชน</label>
        <input type="number" class="form-control" id="id_card" name="id_card" value="{{$user->id_card}}">
    </div>
</div>

<div class="row">
    <div class="form-group bmd-form-group col-md-4">
        <label for="mobile" class="bmd-label-floating">เบอร์โทรศัพท์</label>
        <input type="text" class="form-control" id="mobile" name="mobile" value="{{$user->mobile}}">
    </div>
    <div class="form-group bmd-form-group col-md-4">
        <label for="email" class="bmd-label-floating">อีเมลล์</label>
        <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
    </div>
</div>

<div class="row">
        <div class="col-md-4">
            <div class="form-group {{ $errors->has('province') ? 'has-error' : ''}}">
                <label for="province" class="label-control">จังหวัด</label>
                <select class="select2 form-control province" name="province" id="province">
                    <option>เลือก...</option>
                    {{-- <option>เลือก...</option> --}}
                    @foreach ($provinces as $province)
                    <option value="{{$province->province_code}}">{{$province->province_name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('province', '<p class="help-block">:message</p>') !!}

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="label-control">อำเภอ</label>
                <select name="district" class="select2 form-control district"></select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="label-control">ตำบล</label>
                <select name="tambon" class="select2 form-control tambon"></select>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">ที่อยู่</label>
                <input type="text" class="form-control" name="address" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123/123 บ้านรักสะอาด">
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:30px">
        <div class="col-md-4">
            <div class="card card-profile">
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="card-avatar empty_img" id="empty_img">
                        <img src="../../assets/img/placeholder.jpg" alt="...">
                    </div>
    
                    <div class="card-avatar fileinput-preview fileinput-exists"></div>
    
                    {{-- <div class="fileinput-preview fileinput-exists"></div> --}}
                    <div>
                        <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">Add Photo</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="file" id="file">
                        </span>
                        <br>
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i
                                class="fa fa-times"></i> Remove</a>
                    </div>
                </div><!--fileinput-->
            </div><!--card-profile-->
        </div>
        <div class="col-md-4">
                <div class="form-group bmd-form-group">
                    <label class="label-floating">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group bmd-form-group">
                    <label class="label-floating">Password</label>
                    <input type="text" class="form-control" name="password">
                </div>
            </div>
    </div><!--row-->
    
    
<div class="form-group">
    <button type="submit" class="btn {{$formMode == 'create' ? 'btn-success' : 'btn-warning'}}">
        {{$formMode == 'create' ? 'บันทึก' : 'บันทึกการแก้ไข'}}
    </button>
</div>
