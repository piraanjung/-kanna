<!doctype html>
<html lang="en">

<head>
  <title>Hello, world!</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/my.css')}}" rel="stylesheet" />

  <link href="{{asset('assets/css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />
  <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('select2/css/select2.min.css') }}">

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Kan Na
        </a>
      </div>
      <div class="sidebar-wrapper">
            <div class="user">
                    <div class="photo">
                      <img src="{{asset('assets/img/faces/avatar.jpg')}}">
                    </div>
                    <div class="user-info">
                      <a data-toggle="collapse" href="#collapseExample" class="username collapsed" aria-expanded="false">
                        <span>
                          Tania Andrew
                          <b class="caret"></b>
                        </span>
                      </a>
                      <div class="collapse" id="collapseExample" style="">
                        <ul class="nav">
                          <li class="nav-item">
                            <a class="nav-link" href="#">
                              <span class="sidebar-mini"> MP </span>
                              <span class="sidebar-normal"> My Profile </span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">
                              <span class="sidebar-mini"> EP </span>
                              <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">
                              <span class="sidebar-mini"> S </span>
                              <span class="sidebar-normal"> Settings </span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
          @section('sidebar')
          <ul class="nav">
                <li class="nav-item active  ">
                  <a class="nav-link" href="{{url('/')}}">
                    <i class="material-icons">dashboard</i>
                    <p>หน้าหลัก</p>
                  </a>
                </li>
                <!-- your sidebar here -->
              </ul>
          @show
        
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
              <div class="navbar-wrapper">
                    <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                              <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                              <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                            <div class="ripple-container"></div></button>
                          </div>
                <a class="navbar-brand" href="#pablo">@yield('title')</a>
              </div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end">
                <form class="navbar-form">
                  <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                      <i class="material-icons">search</i>
                      <div class="ripple-container"></div>
                    </button>
                  </div>
                </form>
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="#pablo">
                      <i class="material-icons">dashboard</i>
                      <p class="d-lg-none d-md-block">
                        Stats
                      </p>
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="material-icons">notifications</i>
                      <span class="notification">5</span>
                      <p class="d-lg-none d-md-block">
                        Some Actions
                      </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="#">Mike John responded to your email</a>
                      <a class="dropdown-item" href="#">You have 5 new tasks</a>
                      <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                      <a class="dropdown-item" href="#">Another Notification</a>
                      <a class="dropdown-item" href="#">Another One</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="material-icons">person</i>
                      <p class="d-lg-none d-md-block">
                        Account
                      </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                      <a class="dropdown-item" href="#">Profile</a>
                      <a class="dropdown-item" href="#">Settings</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Log out</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
    
   <!--   Core JS Files   -->
   <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
   <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
   <script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}"></script>
   <script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
   <!-- Plugin for the momentJs  -->
   <script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
   <!--  Plugin for Sweet Alert -->
   <script src="{{asset('assets/js/plugins/sweetalert2.js')}}"></script>
   <!-- Forms Validations Plugin -->
   <script src="{{asset('assets/js/plugins/jquery.validate.min.js')}}"></script>
   <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
   <script src="{{asset('assets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
   <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
   <script src="{{asset('assets/js/plugins/bootstrap-selectpicker.js')}}"></script>
   <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
   <script src="{{asset('assets/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
   <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
   <script src="{{asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
   <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
   <script src="{{asset('assets/js/plugins/bootstrap-tagsinput.js')}}"></script>
   <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
   <script src="{{asset('assets/js/plugins/jasny-bootstrap.min.js')}}"></script>
   <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
   <script src="{{asset('assets/js/plugins/fullcalendar.min.js')}}"></script>
   <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
   <script src="{{asset('assets/js/plugins/jquery-jvectormap.js')}}"></script>
   <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
   <script src="{{asset('assets/js/plugins/nouislider.min.js')}}"></script>
   <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
   <!-- Library for adding dinamically elements -->
   <script src="{{asset('assets/js/plugins/arrive.min.js')}}"></script>
   <!--  Google Maps Plugin    -->
   {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
   <!-- Chartist JS -->
   <script src="{{asset('assets/js/plugins/chartist.min.js')}}"></script>
   <!--  Notifications Plugin    -->
   <script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
   <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="{{asset('assets/js/material-dashboard.js?v=2.1.1" type="text/javascript')}}"></script>
   <!-- Material Dashboard DEMO methods, don't include it in your project! -->
   <script src="{{asset('assets/demo/demo.js')}}"></script>
   <script src="{{asset('select2/js/select2.min.js')}}"></script>

   <script>
     $(document).ready(function() {
       $().ready(function() {
         $sidebar = $('.sidebar');
 
         $sidebar_img_container = $sidebar.find('.sidebar-background');
 
         $full_page = $('.full-page');
 
         $sidebar_responsive = $('body > .navbar-collapse');
 
         window_width = $(window).width();
 
         fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();
 
         if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
           if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
             $('.fixed-plugin .dropdown').addClass('open');
           }
 
         }
 
         $('.fixed-plugin a').click(function(event) {
           // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
           if ($(this).hasClass('switch-trigger')) {
             if (event.stopPropagation) {
               event.stopPropagation();
             } else if (window.event) {
               window.event.cancelBubble = true;
             }
           }
         });
 
         $('.fixed-plugin .active-color span').click(function() {
           $full_page_background = $('.full-page-background');
 
           $(this).siblings().removeClass('active');
           $(this).addClass('active');
 
           var new_color = $(this).data('color');
 
           if ($sidebar.length != 0) {
             $sidebar.attr('data-color', new_color);
           }
 
           if ($full_page.length != 0) {
             $full_page.attr('filter-color', new_color);
           }
 
           if ($sidebar_responsive.length != 0) {
             $sidebar_responsive.attr('data-color', new_color);
           }
         });
 
         $('.fixed-plugin .background-color .badge').click(function() {
           $(this).siblings().removeClass('active');
           $(this).addClass('active');
 
           var new_color = $(this).data('background-color');
 
           if ($sidebar.length != 0) {
             $sidebar.attr('data-background-color', new_color);
           }
         });
 
         $('.fixed-plugin .img-holder').click(function() {
           $full_page_background = $('.full-page-background');
 
           $(this).parent('li').siblings().removeClass('active');
           $(this).parent('li').addClass('active');
 
 
           var new_image = $(this).find("img").attr('src');
 
           if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
             $sidebar_img_container.fadeOut('fast', function() {
               $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
               $sidebar_img_container.fadeIn('fast');
             });
           }
 
           if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
             var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
 
             $full_page_background.fadeOut('fast', function() {
               $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
               $full_page_background.fadeIn('fast');
             });
           }
 
           if ($('.switch-sidebar-image input:checked').length == 0) {
             var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
             var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
 
             $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
             $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
           }
 
           if ($sidebar_responsive.length != 0) {
             $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
           }
         });
 
         $('.switch-sidebar-image input').change(function() {
           $full_page_background = $('.full-page-background');
 
           $input = $(this);
 
           if ($input.is(':checked')) {
             if ($sidebar_img_container.length != 0) {
               $sidebar_img_container.fadeIn('fast');
               $sidebar.attr('data-image', '#');
             }
 
             if ($full_page_background.length != 0) {
               $full_page_background.fadeIn('fast');
               $full_page.attr('data-image', '#');
             }
 
             background_image = true;
           } else {
             if ($sidebar_img_container.length != 0) {
               $sidebar.removeAttr('data-image');
               $sidebar_img_container.fadeOut('fast');
             }
 
             if ($full_page_background.length != 0) {
               $full_page.removeAttr('data-image', '#');
               $full_page_background.fadeOut('fast');
             }
 
             background_image = false;
           }
         });
 
         $('.switch-sidebar-mini input').change(function() {
           $body = $('body');
 
           $input = $(this);
 
           if (md.misc.sidebar_mini_active == true) {
             $('body').removeClass('sidebar-mini');
             md.misc.sidebar_mini_active = false;
 
             $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();
 
           } else {
 
             $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');
 
             setTimeout(function() {
               $('body').addClass('sidebar-mini');
 
               md.misc.sidebar_mini_active = true;
             }, 300);
           }
 
           // we simulate the window Resize so the charts will get updated in realtime.
           var simulateWindowResize = setInterval(function() {
             window.dispatchEvent(new Event('resize'));
           }, 180);
 
           // we stop the simulation of Window Resize after the animations are completed
           setTimeout(function() {
             clearInterval(simulateWindowResize);
           }, 1000);
 
         });
       });
     });
   </script>
   <script>
     $(document).ready(function() {
       // Javascript method's body can be found in assets/js/demos.js
       md.initDashboardPageCharts();
 
     });

     $('#minimizeSidebar').click(function(){
        var bodyClassValue = $('body').attr('class')
        if(bodyClassValue == ''){
            $('body').attr('class','sidebar-mini')
        }else{
            $('body').attr('class','')
        }
     })
   </script>

<script>
    $(document).ready(function() {
      // initialise Datetimepicker and Sliders
      md.initFormExtendedDatetimepickers();
      if ($('.slider').length != 0) {
        md.initSliders();
      }

      
    });
    $('.dataTable').dataTable();
    $('.select2').select2();

    function withdraw_print(){
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.post( "/withdraw/confrim_withdraw_status", { id: 1,_token: CSRF_TOKEN })
      .done(function( data ) {
        if(data === 'true'){
          
          $('.no-print').css('display', 'none')
          window.print();
          $('.no-print').css('display', 'block')
        }

      });
    }
    

  </script>
  <script>
    $('#buy_trash_area_id').change(function(){
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      area_id = $(this).val()
      $.ajax({
        url: '/staff_operate_schedule/get_trash_operate_points',
        type: 'POST',
        data: {_token: CSRF_TOKEN, area_id:area_id},
        dataType: 'JSON',  
        success: function (data) { 
            $("#buy_trash_point").html(data);
        }
      }); 
    })

    $('.province').change(function(){
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      province_code = $(this).val()
      console.log(province_code)
      $.ajax({
        url: '/trash_staff/get_districts',
        type: 'POST',
        data: {_token: CSRF_TOKEN, province_code:province_code},
        // dataType: 'JSON',  
        success: function (data) { 
            $(".district").html(data);
        }
      }); 
    })

    $('.district').change(function(){
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      amphur_code = $(this).val()
      console.log(amphur_code)
      $.ajax({
        url: '/trash_staff/get_tambons',
        type: 'POST',
        data: {_token: CSRF_TOKEN, amphur_code: amphur_code},
        success: function(data){
          console.log(data)
          $('.tambon').html(data)
        }
      })
    })

    $('#file').change(function(){
      $('#empty_img').attr('class','card-avatar hide_placeholder_img')
    })
    $('a.fileinput-exists').click(function(){
      $('#empty_img').attr('class','card-avatar')
    })

  </script>
  
  <script src="{{asset('filterizr/jquery.filterizr.min.js')}}"></script>

  <script>
$(document).ready(function() {
  var options = {
   animationDuration: 0.5, // in seconds
   filter: 'all', // Initial filter
   callbacks: { 
      onFilteringStart: function() { },
      onFilteringEnd: function() { },
      onShufflingStart: function() { },
      onShufflingEnd: function() { },
      onSortingStart: function() { },
      onSortingEnd: function() { }
   },
   controlsSelector: '', // Selector for custom controls
   delay: 0, // Transition delay in ms
   delayMode: 'progressive', // 'progressive' or 'alternate'
   easing: 'ease-out',
   filterOutCss: { // Filtering out animation
      opacity: 0,
      transform: 'scale(0.5)'
   },
   filterInCss: { // Filtering in animation
      opacity: 0,
      transform: 'scale(1)'
   },
   layout: 'sameSize', // See layouts
   multifilterLogicalOperator: 'or',
   selector: '.filtr-container',
   setupControls: true // Should be false if controlsSelector is set 
} 
// You can override any of these options and then call...
var filterizd = $('.filtr-container').filterizr(options);
// If you have already instantiated your Filterizr then call...
filterizd.filterizr('setOptions', options);
});
  </script>
 </body>
 
 </html>
 