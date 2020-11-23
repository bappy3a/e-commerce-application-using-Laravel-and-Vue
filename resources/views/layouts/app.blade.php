<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
         
        <!-- Custom CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/styles.css') }}" rel="stylesheet">
        <style>
            .preloader{
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                z-index: 1000;
            }
        </style>

    </head>
    
    <body class="grocery-theme light">
        <id id="app">
                <div class="preloader"><span class="preloader-js"></span></div>
            <div id="main-wrapper">
                @yield('content')
            </div>
        </id>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('frontend/assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/owl-carousel.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/ion.rangeSlider.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/smoothproducts.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery-rating.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jQuery.style.switcher.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
        <script>
            function openRightMenu() {
                document.getElementById("rightMenu").style.display = "block";
            }
            function closeRightMenu() {
                document.getElementById("rightMenu").style.display = "none";
            }
        </script>
        <script>
            window.onload = function(){
                document.querySelector(".preloader").style.display = "none";
            }
        </script>
    </body>
</html>