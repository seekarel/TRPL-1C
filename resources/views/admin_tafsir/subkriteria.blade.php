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
					<a class="navbar-brand text-size-24"><i class="fa fa-list-alt"></i>Data Sub-Kriteria Tafsir</a>
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
							<h3 class="panel-title">Tabel Sub-Kriteria</h3>
							<span class="text-grey">Tabel Sub-Kriteria Tafsir</span>
						</div>
						<div class="panel-body table-responsive table-full">
							<table class="table table-stripped table-bordered">
								<tr>
									<td class="text-center text-nowrap"></td>
									<td class="text-center text-nowrap text-grey">Sangat Baik</td>
									<td class="text-center text-nowrap text-grey">Baik</td>
									<td class="text-center text-nowrap text-grey">Sedang</td>
									<td class="text-center text-nowrap text-grey">Kurang</td>
									<td class="text-center text-nowrap text-grey">Sangat Kurang</td>
									<td class="text-center text-nowrap text-grey">PV</td>
								</tr>
								@php
								$indeks = 0;
								@endphp
								@for ($i = 0; $i < 5; $i++)
								
								<tr>
									<td class='text-center text-nowrap text-grey'>{{$data['nama_subkriteria'][$i]}}</td>
									@for ($j=0; $j < 5 ; $j++) 
									
									<td class='text-center text-nowrap text-black'>{{$data['subkriteria'][$indeks]->nilai_sub}}</td>
									@php
									$indeks++;
									@endphp

									@endfor				
									<td class='text-center text-nowrap text-black'>{{$data['pv_subkriteria'][$i]}}</td>
								</tr>

								@endfor
								
								<tr>
									<td class="text-center text-nowrap text-grey">Jumlah</td>
									
									@for ($j=0; $j < 5 ; $j++) 
									
									<td class='text-center text-nowrap text-red'>{{$data['jumlah_subkriteria'][$j]}}</td>

									@endfor	
									
									<td class="text-center text-nowrap text-red"></td>		
								</tr>
								
							</table>
						</div>
						<div class="panel-body">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection