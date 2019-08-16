<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="/public/template/public/img/favicon.png" type="image/png">
        <title>About me</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/public/template/public/css/bootstrap.css">
        <link rel="stylesheet" href="/public/template/public/vendors/linericon/style.css">
        <link rel="stylesheet" href="/public/template/public/css/font-awesome.min.css">
        <link rel="stylesheet" href="/public/template/public/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="/public/template/public/vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="/public/template/public/vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="/public/template/public/vendors/animate-css/animate.css">
        <link rel="stylesheet" href="/public/template/public/vendors/flaticon/flaticon.css">
        <!-- main css -->
        <link rel="stylesheet" href="/public/template/public/css/style.css">
        <link rel="stylesheet" href="/public/template/public/css/responsive.css">
        <script src="/public/files/ad/ckeditor/ckeditor.js" type="text/javascript" charset="utf-8" async defer></script>
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu" id="mainNav">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<!-- Brand and toggle get grouped for better mobile display -->
						
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item active"><a class="nav-link" href="{{route('aboutme.index.index')}}">Trang chủ</a></li> 
								<li class="nav-item"><a class="nav-link" href="{{route('aboutme.index.index')}}#about">Tôi là ai</a></li> 
								<li class="nav-item"><a class="nav-link" href="{{route('aboutme.index.index')}}#duan">Dự án</a>
								<li class="nav-item"><a class="nav-link" href="{{route('aboutme.index.index')}}#tincongnghe">Tin công nghệ</a>
								<li class="nav-item"><a class="nav-link" href="{{route('aboutme.index.index')}}#about">Ki nang</a>
								<li class="nav-item"><a class="nav-link" href="">Chặng đường đã qua</a></li>
								<li class="nav-item"><a class="nav-link" href="{{route('aboutme.index.index')}}#lienhe">Liên hệ</a></li> 
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>