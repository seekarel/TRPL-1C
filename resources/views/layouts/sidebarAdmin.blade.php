<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pegadaian</title>
	<link rel="stylesheet" href="{{url('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('assets/plugins/fontawesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{url('assets/css/theme-floyd.css')}}">
	<link rel="stylesheet" href="{{url('assets/css/theme-helper.css')}}">
</head>

<body>
	<div id="wrapper">
		<div id="sidebar">
			<div id="sidebar-wrapper">
				<div class="sidebar-title">
					<span class="text-size-40 text-loose">PEGADAIAN</span><br>
					<span class="text-size-18 text-grey">Menangani Masalah<br> Tanpa Masalah</span>
				</div>
				<div class="sidebar-avatar">
					<div class="sidebar-avatar-image"><img src="{{url('assets/images/logo.jpg')}}" alt="" class="img-circle"></div>
					<div class="sidebar-avatar-text">{{$data['nama_user']}}</div> <!-- nama peruser -->
				</div>
				<ul class="sidebar-nav">
					<li class="sidebar-close"><a href="#"><i class="fa fa-fw fa-close"></i></a></li>
					<li><a href="/homes"><i class="fa fa-fw fa-home"></i><span>Home</span></a></li>
					<li><a href="/biodata"><i class="fa fa-fw fa-pencil"></i><span>Biodata</span></a></li>
					<li><a href="/riwayat"><i class="fa fa-fw fa-list-alt"></i><span>Riwayat</span></a></li>
					<li><a href="{{ url('/logout')}}"><i class="fa fa-fw fa-power-off"></i><span>Logout</span></a></li>
				</ul>
				<div class="sidebar-footer">
					<hr style="border-color: #DDD">
					created by <a href="http://www.instagram.com/seekarel" target="_blank" class="text-default">Sekar Elok</a><br>
				</div>
			</div>
		</div>
		
			@yield('content')
	</div>
</body>
<script src="{{url('assets/plugins/jquery/jquery-3.1.1.min.js')}}"></script>
<script src="{{url('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/theme-floyd.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/swal.js')}}"></script>
@extends('pesan')

</html>