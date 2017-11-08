@extends('layouts.sidebarTafsir')

@section('content')
<div id="main-panel">
	<div id="top-nav">

	</div>
	<div id="content">
		<div class="container-fluid">
			<!-- basic form -->

			<!-- Basic element -->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Proses Hutang</h3>
							<span class="text-grey">Data Pinjaman</span>
						</div>
						<div class="panel-body table-responsive table-full">
							
							<table class="table table-hover table-bordered">
								<tr>
									<td class="text-center text-nowrap">No</td>
									<td class="text-center text-nowrap">ID Customer</td>
									<td class="text-center text-nowrap">Nama Customer</td>
									<td class="text-center text-nowrap">No Tafsir</td>
									<td class="text-center text-nowrap">Maksimal Pinjaman</td>
									<td class="text-center text-nowrap">Nilai Maksimal Pinjaman</td>
									<td class="text-center text-nowrap">Tanggal</td>
									<td class="text-center text-nowrap">Action</td>
								</tr> 
								<?php $no = 1; ?>
								@foreach($data['tafsir'] as $value)
								
								<tr>
									<td class="text-center text-nowrap">{{$no}}</td>
									<td class="text-center text-nowrap">{{$value->id_customer}}</td>
									<td class="text-center text-nowrap">{{$value->nama}}</td>
									<td class="text-center text-nowrap">{{$value->id_tafsir}}</td>
									<td class="text-center text-nowrap">{{$value->maks_pinjaman}}</td>
									<td class="text-center text-nowrap">{{$value->maks_nilai}}</td>
									<td class="text-center text-nowrap">{{$value->tanggal_tafsir}}</td>
									<td class="text-center text-nowrap">
										<a href="/proses_pinjam/{{$value->id_tafsir}}"><button type="submit" class="btn btn-success"><i class="fa fa-fw fa-list-alt"></i><font color="white">Proses</font></button></a>
									</td>
								</tr>
								<?php $no++;?>
								@endforeach
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection