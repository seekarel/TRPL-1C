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
	<link rel="stylesheet" href="{{url('assets/css/datatables.min.css')}}">
	<script><!--

function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
administrasi = document.autoSumForm.administrasi.value;
angsuran_total = document.autoSumForm.angsuran_total.value;
pembayaran = document.autoSumForm.pembayaran.value;

total = Math.round((angsuran_total * 1) + (administrasi * 1));
document.autoSumForm.total.value = (total * 1);

if (pembayaran == "") {
	document.autoSumForm.kembalian.value = 0;
}else{
	document.autoSumForm.kembalian.value = (pembayaran * 1) - (total * 1);
}


}
function stopCalc(){
clearInterval(interval);}
</script>
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
					<div class="sidebar-avatar-image"><img src="assets/images/logo.jpg" alt="" class="img-circle"></div>
					<div class="sidebar-avatar-text">Admin {{$data['session']['username']}}</div>
				</div>
				<ul class="sidebar-nav">
					<li class="sidebar-close"><a href="#"><i class="fa fa-fw fa-close"></i></a></li>
					<li><a href="/home_bayar"><i class="fa fa-fw fa-home"></i><span>Home</span></a></li>
					<li><a href="/pembayaran"><i class="fa fa-fw fa-pencil"></i><span>Pembayaran</span></a></li>
					<li><a href="/detail_pinjam"><i class="fa fa-fw fa-list-alt"></i><span>Data Peminjam</span></a></li>
					<li><a href="/logout"><i class="fa fa-fw fa-power-off"></i><span>Logout</span></a></li>
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
<script type="text/javascript" src="{{url('assets/plugins/bootstrap/js/uang.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/swal.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/jquery-1.12.4.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/datatables.min.js')}}"></script>
<!-- <script type="text/javascript" src="{{url('assets/plugins/bootstrap/js/hitungan.js')}}"></script> -->
<script src="{{url('assets/js/theme-floyd.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#pembayaran').DataTable({
    	 "lengthMenu": [[7, 25, 50, -1], [7, 25, 50, "All"]]
    });
    $('#detail').DataTable({
    	 "lengthMenu": [[7, 25, 50, -1], [7, 25, 50, "All"]]
    });

} );
</script>
@extends('pesan')

</html>