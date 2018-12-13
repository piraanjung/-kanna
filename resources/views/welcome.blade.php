<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

        <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="../assets/demo/demo.css" rel="stylesheet" />
        <!-- Styles -->
        <style>
            html,
            body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links {
                margin: 20px
            }

            .links>a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .card-category {
                font-size: 1.5em;
            }

        </style>
    </head>

    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <a href="{{ url('/home') }}">Home</a>
                    @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                    @endif
                    @endauth
                </div>
            @endif
            <?php 
            $arrays =[
                [
                    'icons'=> 'payment',
                    'title' => 'ธนาคารขยะ',
                    'url' => 'trashbank'
                ],
                [
                    'icons'=> 'delete_outline',
                    'title' => 'จัดการข้อมูลขยะ',
                    'url' => 'trash/dashboard'
                ],
                [
                    'icons'=> 'home',
                    'title' => 'ครุภัณฑ์ โรงเรียน',
                    'url' => ''
                ],
                [
                    'icons'=> 'delete_outline',
                    'title' => 'ประปา',
                    'url' => ''
                ],
                [
                    'icons'=> 'people',
                    'title' => 'จัดการผู้ใช้งาน',
                    'url' => 'users'
                ],
            ];
            ?>
            <div class="content">
                <div class="title m-b-md">
                    KANNA Sys.
                </div>
                <div class="links">
                    <div class="row">
                        @foreach ($arrays as $arr)
                        <div class="col-sm-6 col-lg-3 cards">
                            <div class="card card-pricing card-raised">
                                <div class="card-body">
                                    <div class="card-icon icon-rose">
                                        <a href="{{url($arr['url'])}}">
                                            <i class="material-icons">{{$arr['icons']}}</i>
                                        </a>
                                    </div>
                                    <h4 class="card-title">{{$arr['title']}}</h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><!--r0w-->
                </div><!--links-->
            </div><!--c0ntent-->

        </div><!--flex-center-->
    </body>

</html>
