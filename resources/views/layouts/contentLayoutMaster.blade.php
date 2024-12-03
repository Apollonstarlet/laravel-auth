<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
  data-assets-path="{{asset('assets/')}}" data-template="vertical-menu-template">
<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>{{env('APP_NAME')}} | @yield('title')</title>

  <meta name="description" content="Mopart" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets/vendor/fonts/materialdesignicons.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome.css')}}" />

  {{-- Include core + vendor Styles --}}
  @include('panels.styles')

</head>
@include('layouts.verticalLayoutMaster')
<!-- END: Head-->
</html>