<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fontfaces CSS-->
        <link href="{{ asset('/backend/css/font-face.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('/backend/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('/backend/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('/backend/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
        <!-- Vendor CSS-->
        <link href="{{ asset('/backend/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('/backend/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('/backend/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('/backend/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('/backend/vendor/slick/slick.css" rel="stylesheet') }}" media="all">
        <link href="{{ asset('/backend/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('/backend/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
        <!-- Main CSS-->
        <link href="{{ asset('/backend/css/theme.css') }}" rel="stylesheet" media="all">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            a .active{
                color: #4272d7;
                font-weight: 500;
            }
            .invalid-feedback {
             display: block;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 80%;
            color: #dc3545;
            text-align: left;
        }
        </style>


    </head>
    <body class="animsition">
        <div class="page-wrapper">
        <div id="app"></div>
        </div>

        <script src="{{asset('js/app.js')}}"></script>
        <!-- Jquery JS-->
        <script src="{{ asset('/backend/vendor/jquery-3.2.1.min.js') }}"></script>
        <!-- Bootstrap JS-->
        <script src="{{ asset('/backend/vendor/bootstrap-4.1/popper.min.js') }}"></script>
        <!-- Vendor JS       -->
        <script src="{{ asset('/backend/vendor/slick/slick.min.js') }}">
        </script>
        <script src="{{ asset('/backend/vendor/wow/wow.min.js') }}"></script>
        <script src="{{ asset('/backend/vendor/animsition/animsition.min.js') }}"></script>
        <script src="{{ asset('/backend/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
        </script>
        <script src="{{ asset('/backend/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('/backend/vendor/counter-up/jquery.counterup.min.js') }}">
        </script>
        <script src="{{ asset('/backend/vendor/circle-progress/circle-progress.min.js') }}"></script>
        <script src="{{ asset('/backend/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('/backend/vendor/chartjs/Chart.bundle.min.js') }}"></script>
        <script src="{{ asset('/backend/vendor/select2/select2.min.js') }}">
        </script>

        <!-- Main JS-->
        <script src="{{ asset('/backend/js/main.js') }}"></script>
    </body>
</html>
