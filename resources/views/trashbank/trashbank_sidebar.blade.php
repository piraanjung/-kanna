<ul class="nav">
    <li class="nav-item <?php echo  $index == 1 ? 'active' : ''?>">
        <a class="nav-link" href="{{url('trashbank')}}">
            <i class="material-icons">timeline</i>
            <p>Dashboard</p>
        </a>
    </li>
        <li class="nav-item <?php echo  $index == 2 ? 'active' : '';?>">
            <a class="nav-link" href="{{url('deposit/index')}}">
              <i class="material-icons">person</i>
              <p>ฝากเงิน</p>
            </a>
          </li>
        <li class="nav-item <?php echo  $index == 3 ? 'active' : '';?>">
          <a class="nav-link" href="{{url('withdraw/index')}}">
            <i class="material-icons">person</i>
            <p>ถอนเงิน</p>
          </a>
        </li>
        <li class="nav-item <?php echo  $index == 4 ? 'active' : '';?>">
          <a class="nav-link" href="{{url('withdraw/withdraw_history')}}">
            <i class="material-icons">content_paste</i>
            <p>ประวัติธุรกรรมถอนเงิน</p>
          </a>
        </li>
        
      </ul>