<div class="row">
    <label class="col-md-3 col-form-label">ชื่อขยะ</label>
    <div class="col-md-9">
        <div class="form-group has-default bmd-form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <input type="text" name="name" class="form-control" value="{{old('name')}}{{isset($trash) ? $trash->name : '' }}">
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-3">
        <label class="col-md-3 col-form-label">หมวดหมู่</label>
        <div class="col-md-9">
            <div class="form-group bmd-form-group">
                <select name="item_cate_id" class="form-control">
                    <option>เลือก...</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{$category->id == $trash->item_cate_id ? 'selected = selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div><!-- col-md-3 -->
            
    <div class="col-md-3">
        <label class="col-md-3 col-form-label">ราคา</label>
        <div class="col-md-9">
            <div class="form-group bmd-form-group">
                <input type="text" name="price" class="form-control" value="{{old('price')}}{{isset($trash) ? $trash->price : '' }}">
                {!! $errors->first('price', '<p class="help-block">:message</p>') !!}

            </div>
        </div>
    </div><!-- col-md-3 -->
    <div class="col-md-3">
        <label class="col-md-3 col-form-label">หน่วยนับ</label>
        <div class="col-md-9">
            <div class="form-group bmd-form-group">
                <select name="unit_id" class="form-control">
                    <option>เลือก...</option>
                    @foreach ($units as $unit)
                        <option value="{{$unit->id}}" {{$unit->id == $trash->unit_id ? 'selected = selected' : ''}}>{{$unit->un_name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('unit_id', '<p class="help-block">:message</p>') !!}

            </div>
        </div>
    </div><!-- col-md-3 -->
</div>

<div class="row">
    <label class="col-md-3 col-form-label">รูปภาพ</label>
    <div class="col-md-9">
        <div class="form-group has-default bmd-form-group">
            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                <div class="fileinput-new thumbnail">
                    <img src="{{$trash->image !="" ? asset('images/'.$trash->image) : asset('assets/img/placeholder.jpg')}}" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                <div>
                    <span class="btn btn-rose btn-round btn-file">
                    <span class="fileinput-new">Select image</span>
                    <span class="fileinput-exists">Change</span>
                    <input type="file" name="file">
                    </span>
                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                </div>
            </div>
            {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
        </div><!--form-group-->
    </div>
</div>

<div class="card-footer ">
        <div class="row">
          <div class="col-md-9">
            <button type="submit" class="btn btn-fill btn-rose">บันทึก<div class="ripple-container"></div></button>
          </div>
        </div>
      </div>
