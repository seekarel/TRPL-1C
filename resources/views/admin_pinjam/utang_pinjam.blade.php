@extends('layouts.sidebarTafsir')

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
									<h3 class="panel-title">Data Peminjam</h3>
								</div>
								<div class="panel-body table-responsive table-full">
									<table id="hutang" class=" display table table-stripped table-bordered">
									<thead>
										<tr>
											<td class="text-center text-nowrap">No</td>
											<td class="text-center text-nowrap">ID Pinjamman</td>
											<td class="text-center text-nowrap">Nama Customer</td>
											<td class="text-center text-nowrap">Jumlah Pinjamman</td>
											<td class="text-center text-nowrap">Angsuran Pokok</td>
											<td class="text-center text-nowrap">Angsuran Bunga</td>
											<td class="text-center text-nowrap">Status</td>
											<td class="text-center text-nowrap">Action</td>
										</tr> 
									</thead>
									<tbody>
										<?php $no = 1 ?>
										@foreach($data['hutang'] as $value)
										<tr>
											<td class="text-center text-nowrap">{{$no}}</td>
											<td class="text-center text-nowrap">{{$value->id_pinjaman}}</td>
											<td class="text-center text-nowrap">{{$value->nama}}</td>
											<td class="text-center text-nowrap">IDR. {{round($value->jumlah_pinjaman)}}</td>
											<td class="text-center text-nowrap">IDR. {{round($value->angsuran_pokok)}}</td>
											<td class="text-center text-nowrap">IDR. {{round($value->angsuran_bunga)}}</td>
											<td class="text-center text-nowrap">
											
											@if ($value->sisa_pinjaman==0)
												<label class="label label-success">Lunas</label>
											@else
												<label class="label label-default">Belum</label>
											@endif
											
											</td>
											<td class="text-center text-nowrap"><a href="detail/{{$value->id_pinjaman}}"><button type="submit" class="btn btn-primary">View</button></a></td>
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