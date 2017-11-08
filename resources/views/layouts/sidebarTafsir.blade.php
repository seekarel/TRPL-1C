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
one = document.autoSumForm.jumlah_pinjaman.value;
two = document.autoSumForm.lama_pinjaman.value;
three = document.autoSumForm.bunga_pinjaman.value;
bunga = (one * 1) * (three /100);
angs_pinjaman = Math.round((one / two));
angs_bunga = (one * 1) * (three /100);
total_angs = (angs_pinjaman * 1) + (angs_bunga * 1);

if (one == "" || two == "") {
	document.autoSumForm.angsuran_pinjaman.value = 0;
	document.autoSumForm.angsuran_bunga.value = 0;
	document.autoSumForm.total_angsuran.value = 0;
}else{
	document.autoSumForm.angsuran_pinjaman.value = (angs_pinjaman * 1);
	document.autoSumForm.angsuran_bunga.value = (angs_bunga * 1);
	document.autoSumForm.total_angsuran.value = (total_angs * 1);
}


}
function stopCalc(){
clearInterval(interval);}
</script>
</head>

<body>
	<div id="wrapper">
		<div id="sidebar" >
			<div id="sidebar-wrapper">
				<div class="sidebar-title">
					<span class="text-size-40 text-loose">PEGADAIAN</span><br>
					<span class="text-size-18 text-grey">Menangani Masalah<br> Tanpa Masalah</span>
				</div>
				<div class="sidebar-avatar">
					<div class="sidebar-avatar-image"><img src="assets/images/logo.jpg" alt="" class="img-circle"></div>
					<div class="sidebar-avatar-text">Admin Tafsir</div>
				</div>
				<ul class="sidebar-nav">
					<li class="sidebar-close"><a href="#"><i class="fa fa-fw fa-close"></i></a></li>
					<li><a href="/home_tafsir"><i class="fa fa-fw fa-home"></i><span>Home</span></a></li>
					<li><a href="/tafsir"><i class="fa fa-fw fa-list-alt"></i><span>Form Tafsir</span></a></li>
					<li><a href="/survey_pinjam"><i class="fa fa-fw fa-pencil"></i><span>Data Survey</span></a></li>
					<li><a href="/transaksi_pinjam"><i class="fa fa-fw fa-list-alt"></i><span>Proses Hutang</span></a></li>
					<li><a href="/utang_pinjam"><i class="fa fa-fw fa-list-alt"></i><span>Data Peminjam</span></a></li>
					<li><a href="{{ url('/logout')}}"><i class="fa fa-fw fa-power-off"></i><span>Logout</span></a></li>
					<!-- <li><a href="/kriteria_tafsir"><i class="fa fa-fw fa-pencil"></i><span>Tabel Kriteria</span></a></li>
					<li><a href="/subkriteria_tafsir"><i class="fa fa-fw fa-list-alt"></i><span>Tabel Sub-Kriteria</span></a></li> -->
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
    $('#hutang').DataTable({
    	 "lengthMenu": [[7, 25, 50, -1], [7, 25, 50, "All"]]
    });

} );
</script>
@extends('pesan')

</html>