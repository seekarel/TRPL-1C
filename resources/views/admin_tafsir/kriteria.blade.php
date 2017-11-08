@extends('layouts.sidebarTafsir')

@section('content')
<div id="main-panel">
	<div id="top-nav">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<!-- Navbar toggle button -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
						<i class="fa fa-bars"></i>
					</button>
					<!-- Sidebar toggle button -->
					<button type="button" class="sidebar-toggle">
						<i class="fa fa-bars"></i>
					</button>
					<a class="navbar-brand text-size-24"><i class="fa fa-list-alt"></i>Data Kriteria</a>
				</div>
			</div>
		</nav>
	</div>
	<div id="content">
		<div class="container-fluid">
			<!-- basic form -->
			
			<!-- Basic element -->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Tabel Kriteria</h3>
							<span class="text-grey">Tabel Kriteria Tafsir</span>
						</div>
						<div class="panel-body table-responsive table-full">
							<table class="table table-stripped table-bordered">
								<tr>
									<td class="text-center text-nowrap"></td>
									<td class="text-center text-nowrap text-grey">Penghasilan</td>
									<td class="text-center text-nowrap text-grey">Kondisi Usaha</td>
									<td class="text-center text-nowrap text-grey">Kem Melunasi Hutang</td>
									<td class="text-center text-nowrap text-grey">Aset</td>
									<td class="text-center text-nowrap text-grey">Tanggungan Hidup</td>
									<td class="text-center text-nowrap text-grey">Kepemilikan Rumah</td>
									<td class="text-center text-nowrap text-grey">PV</td>
								</tr>
								@php
								$indeks = 0;
								@endphp
								@for ($i = 0; $i < 6; $i++)
								
								<tr>
									<td class='text-center text-nowrap text-grey'>{{$data['nama_kriteria'][$i]}}</td>
									@for ($j=0; $j < 6 ; $j++) 
									
									<td class='text-center text-nowrap text-black'>{{$data['kriteria'][$indeks]->nilai_kriteria}}</td>
									@php
									$indeks++;
									@endphp
									@endfor				
									<td class='text-center text-nowrap text-red'>{{$data['pv_kriteria'][$i]}}</td>		
								</tr>

								@endfor
								
								
								<tr>
									<td class="text-center text-nowrap text-grey">Jumlah</td>
									
									@for ($j=0; $j < 6 ; $j++) 
									
									<td class='text-center text-nowrap text-red'>{{$data['jumlah_kriteria'][$j]}}</td>

									@endfor
									
									<td class="text-center text-nowrap text-red"></td>		
								</tr>
								<tr>
									<td class="text-center text-nowrap text-grey">PEV</td>
									<td class="text-left text-nowrap text-red" colspan="7">{{$data['pev']}}</td>	
								</tr>
								<tr>
									<td class="text-center text-nowrap text-grey">CI</td>
									<td class="text-left text-nowrap text-red" colspan="7">{{$data['ci']}}</td>	
								</tr>
								<tr>
									<td class="text-center text-nowrap text-grey">CR</td>
									<td class="text-left text-nowrap text-red" colspan="7">{{$data['cr']}}</td>	
								</tr>
							</table>
							
							
						</div>
					</div>
				</div>
			</div>
		</div>
		@endsection