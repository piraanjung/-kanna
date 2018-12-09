<ul class="nav">
        <li class="nav-item <?php echo  $index == 1 ? 'active' : ''?>">
            <a class="nav-link" href="{{url('trash/dashboard')}}">
                <i class="material-icons">timeline</i>
                <p>Dashboard จัดการขยะ</p>
            </a>
        </li>
        <li class="nav-item <?php echo  $index == 2 ? 'active' : '';?>">
          <a class="nav-link" href="{{url('trash/trash_lists')}}">
            <i class="material-icons">person</i>
            <p>รายการขยะ</p>
          </a>
        </li>
        <li class="nav-item <?php echo  $index == 3 ? 'active' : '';?>">
          <a class="nav-link" href="{{url('trash/trashprice')}}">
            <i class="material-icons">content_paste</i>
            <p>แก้ไขราคาขยะ</p>
          </a>
        </li>
        <li class="nav-item <?php echo  $index == 4 ? 'active' : '';?>">
          <a class="nav-link" href="{{url('staff_operate_schedule/index')}}">
            <i class="material-icons">library_books</i>
            <p>ตั้งค่าวันรับซื้อขยะ</p>
          </a>
        </li>
        <li class="nav-item <?php echo  $index == 5 ? 'active' : '';?>">
            <a class="nav-link" href="{{url('trash_staff/index')}}">
            <i class="material-icons">bubble_chart</i>
            <p>เจ้าหน้าที่จัดการขยะ</p>
          </a>
        </li>
    
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#tablesExamples" aria-expanded="true">
              <i class="material-icons">grid_on</i>
              <p> ตั้งค่า
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse show" id="tablesExamples" style="">
              <ul class="nav">
                <li class="nav-item <?php echo  $index == 6 ? 'active' : '';?>">
                  <a class="nav-link" href="{{url('settings/buy_trash_area/index')}}">
                    <span class="sidebar-mini"> RT </span>
                    <span class="sidebar-normal"> ตั้งค่าพื้นที่รับซื้อขยะ </span>
                  </a>
                </li>
                <li class="nav-item <?php echo  $index == 7 ? 'active' : '';?>">
                  <a class="nav-link" href="{{url('settings/buy_trash_point/index')}}">
                    <span class="sidebar-mini"> ET </span>
                    <span class="sidebar-normal"> ตั้งค่าจุดรับซื้อขยะ </span>
                  </a>
                </li>
                <li class="nav-item <?php echo  $index == 8 ? 'active' : '';?>">
                    <a class="nav-link" href="../../examples/tables/extended.html">
                      <span class="sidebar-mini"> ET </span>
                      <span class="sidebar-normal"> ตั้งค่าหน่วยนับ </span>
                    </a>
                  </li>
                  <li class="nav-item <?php echo  $index == 9 ? 'active' : '';?>">
                      <a class="nav-link" href="../../examples/tables/extended.html">
                        <span class="sidebar-mini"> ET </span>
                        <span class="sidebar-normal"> ตั้งค่าประเภทขยะ </span>
                      </a>
                    </li>
              </ul>
            </div>
          </li>
      </ul>