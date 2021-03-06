@extends('layouts.sidebarAdmin')

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
							<a class="navbar-brand text-size-16" href="#"><i class="fa fa-list-alt"></i>Detail Hutang</a>
						</div>
					</div>
				</nav>
			</div>
		
			<div id="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Detail Pembayarann</h3>
									<span class="text-black"><b>Id Hutang :  {{$data['detail'][0]->id_pinjaman}} - {{$data['detail'][0]->nama}} </b></span>
								</div>
								<div class="panel-body table-responsive table-full">
									<table class=" display table table-responsive table-hover">
									
										<tr>
											<td class="text-center text-nowrap">Bulan</td>
											<td class="text-center text-nowrap">Angsuran Bunga</td>
											<td class="text-center text-nowrap">Angsuran Pokok</td>
											<td class="text-center text-nowrap">Total Angsuran</td>
											<td class="text-center text-nowrap">Sisa Pinjaman</td>
										</tr> 
										<tr>
											<td class="text-center text-nowrap">0</td>
											<td class="text-center text-nowrap">0</td>
											<td class="text-center text-nowrap">0</td>
											<td class="text-center text-nowrap">0</td>
											<td class="text-center text-nowrap">{{$data['jumlah_pinjaman']}}</td>
										</tr>
									@foreach($data['detail'] as $value)										
										<tr>
											<td class="text-center text-nowrap">{{$value->angsuran_ke}}</td>
											<td class="text-center text-nowrap">{{$value->angsuran_bunga}}</td>
											<td class="text-center text-nowrap">{{$value->angsuran_pokok}}</td>
											<td class="text-center text-nowrap">{{$value->angsuran_total}}</td>
											<td class="text-center text-nowrap">{{$value->sisa_pinjaman}}</td>
									@endforeach
										</tr>
										<tr>
											<td class="text-center text-nowrap"><b>Jumlah</b></td>
											<td class="text-center text-nowrap"><b>{{$data['total'][0]->total_bunga}}</b></td>
											<td class="text-center text-nowrap"><b>{{round($data['total'][0]->total_pokok)}}</b></td>
											<td class="text-center text-nowrap"><b>{{$data['total'][0]->total}}</b></td>
											<td class="text-center text-nowrap"><b></b></td>
										</tr> 
									</table>
									<div class="col-md-12" align="right">
									<a href="/riwayat"><button type="submit" class="btn btn-warning"><b>Kembali</b></button></a>
									<a href="/pdf/{{$data['detail'][0]->id_pinjaman}}"><button type="submit" class="btn btn-warning"><b>cetak</b></button></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection