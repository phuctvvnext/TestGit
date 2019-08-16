<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/templates/admin/img/apple-icon.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/templates/admin/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>AdminCP - VinaEnter</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />


  <!-- Bootstrap core CSS     -->
  <link href="/public/template/admin/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Animation library for notifications   -->
  <link href="/public/template/admin/css/animate.min.css" rel="stylesheet"/>

  <!--  Paper Dashboard core CSS    -->
  <link href="/public/template/admin/css/paper-dashboard.css" rel="stylesheet"/>


  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="/public/template/admin/css/demo.css" rel="stylesheet" />


  <!--  Fonts and icons     -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
  <link href="/public/template/admin/css/themify-icons.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="/public/files/ad/ckeditor/ckeditor.js" type="text/javascript" charset="utf-8" async defer></script>

</head>
<body>

<div class="wrapper">
  <div class="sidebar" data-background-color="white" data-active-color="danger">
    <div class="sidebar-wrapper">
      <div class="logo">
        <a href="{{-- {{ route('admin.story.index') }} --}}" class="simple-text">AdminCP</a>
      </div>
      @include('templates.admin.sidebar')
    </div>
  </div>

  <div class="main-panel">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar bar1"></span>
            <span class="icon-bar bar2"></span>
            <span class="icon-bar bar3"></span>
          </button>
          <a class="navbar-brand" href="{{-- {{ route('admin.story.index') }} --}}">Trang quản lý</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              @php
                $user = Auth::user();
               // dd($user);
              @endphp
              @if(Auth::check())
              <a href="{{ route('auth.auth.logout') }}">
                <i class="ti-settings"></i>
                <p>Logout</p>
              </a>
              @else
              <a href="{{ route('auth.auth.login') }}">
                <i class="ti-settings"></i>
                <p>Logout</p>
              </a>
              @endif 
            </li>
          </ul>

        </div>
      </div>
    </nav>

    <div class="content">
      <div class="container-fluid">