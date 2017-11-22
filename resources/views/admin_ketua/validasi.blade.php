@extends('layouts.sidebarKetua')

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
					<a class="navbar-brand text-size-20" href="#"><i class="fa fa-list-alt"></i> Detail Validasi</a>
				</div>
			</div>
		</nav>
	</div>

	<div id="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Data Validasi</h3>
								<label class="label label-success"><b>APPROVE</b></label>
							</div>
							<div class="panel-body table-responsive table-full">
								<table id="validasi_approve" class=" display table table-responsive table-hover">
									<thead>
										<tr>
											<td class="text-center text-nowrap">No</td>
											<td class="text-center text-nowrap">Id Tafsir</td>
											<td class="text-center text-nowrap">Nama</td>
											<td class="text-center text-nowrap">Status</td>
										</tr>
									</thead>
									<tbody>
										@foreach($data['terima'] as $key => $value)
										<tr>
											<td class="text-center text-nowrap">{{($key+1)}}</td>
											<td class="text-center text-nowrap">{{$value->id_tafsir}}</td>										
											<td class="text-center text-nowrap">{{$value->nama}}</td>
											<td class="text-center text-nowrap"><label class="label label-success">APPROVE</label></td>
										</tr>
										@endforeach
									</tbody> 
								</table>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Data Validasi</h3>
								<label class="label label-danger"><b>DECLINE</b></label>
							</div>
							<div class="panel-body table-responsive table-full">
								<table id="validasi_decline" class=" display table table-responsive table-hover">
									<thead>
										<tr>
											<td class="text-center text-nowrap">No</td>
											<td class="text-center text-nowrap">Id Tafsir</td>
											<td class="text-center text-nowrap">Nama</td>
											<td class="text-center text-nowrap">Status</td>
										</tr>
									</thead>
									<tbody>
										@foreach($data['tolak'] as $key => $value)
										<tr>
											<td class="text-center text-nowrap">{{($key+1)}}</td>
											<td class="text-center text-nowrap">{{$value->id_tafsir}}</td>										
											<td class="text-center text-nowrap">{{$value->nama}}</td>
											<td class="text-center text-nowrap"><label class="label label-danger">DECLINE</label></td>
										</tr>
										@endforeach
									</tbody> 
								</table>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection