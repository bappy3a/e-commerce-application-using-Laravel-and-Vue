<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <title>{{ config('app.name') }} - Login</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="{{ asset('backend/libs/assets/animate.css/animate.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('backend/libs/assets/font-awesome/css/font-awesome.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('backend/libs/assets/simple-line-icons/css/simple-line-icons.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('backend/libs/jquery/bootstrap/dist/css/bootstrap.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('backend/css/app.min.css') }}" type="text/css" />
</head>
<body>
<div class="app app-header-fixed ">    
  @yield('content')
</div>

<script src="{{ asset('backend/js/app.min.js') }}"></script>

</body>

</html>
