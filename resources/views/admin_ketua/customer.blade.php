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
					<a class="navbar-brand text-size-20 text-white" href="#"><i class="fa fa-list-alt"></i> Data Customer</a>
				</div>
			</div>
		</nav>
	</div>

	<div id="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Data Customer</h3>
								<label class="label label-success"><b>CUSTOMER</b></label>
							</div>
							<div class="panel-body table-responsive table-full">
								<table id="customer" class=" display table table-responsive table-hover">
									<thead>
									<tr>
										<td class="text-center text-nowrap">No</td>
										<td class="text-center text-nowrap">Nama</td>
										<td class="text-center text-nowrap">Alamat</td>
										<td class="text-center text-nowrap">Tanggal Lahir</td>
									</tr>
									</thead>
									<tbody>
										@foreach($data['customer'] as $key => $value)
										<tr>
										<td class="text-center text-nowrap">{{($key+1)}}</td>
										<td class="text-center text-nowrap">{{$value->nama}}</td>
										<td class="text-center text-nowrap">{{$value->alamat}}</td>
										<td class="text-center text-nowrap">{{$value->tanggal_lahir}}</td>	
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