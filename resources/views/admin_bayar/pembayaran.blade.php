@extends ('layouts.sidebarBayar')
@section('content')
<div id="main-panel">
			<div id="top-nav">
				
			</div>
			<div id="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Data Pembayaran</h3>
								</div>
								<div class="panel-body table-responsive table-full">
									<table id="pembayaran" class=" display table table-stripped table-bordered">
									<thead>
										<tr>
											<td class="text-center text-nowrap">No</td>
											<td class="text-center text-nowrap">ID Pinjamman</td>
											<td class="text-center text-nowrap">ID Customer</td>
											<td class="text-center text-nowrap">Nama Customer</td>
											<td class="text-center text-nowrap">Sisa Pinjaman</td>
											<td class="text-center text-nowrap">Sisa Cicilan</td>
											<td class="text-center text-nowrap">Action</td>
										</tr> 
									</thead>
									<tbody>
										<?php $no = 1 ?>
										@foreach($data['user'] as $value)
										<tr>
											<td class="text-center text-nowrap">{{$no}}</td>
											<td class="text-center text-nowrap">{{$value->id_pinjaman}}</td>
											<td class="text-center text-nowrap">{{$value->id_customer}}</td>
											<td class="text-center text-nowrap">{{$value->nama}}</td>
											<td class="text-center text-nowrap">IDR. {{round($value->sisa_pinjaman)}}</td>
											<td class="text-center text-nowrap">{{$value->sisa_cicilan}} Bulan</td>
											<td class="text-center text-nowrap"><a href="transaksi/{{$value->id_pinjaman}}"><button type="submit" class="btn btn-success">Proses</button></a></td>
										</tr> 
										<?php $no++ ?>
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
@endsection