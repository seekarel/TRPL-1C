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
									<h3 class="panel-title">Data Survey</h3>
									<span class="text-grey">Data Peminjam</span>
								</div>
								<div class="panel-body table-responsive table-full">
									<table class="table table-stripped table-bordered">
										<tr>
											<td class="text-center text-nowrap">ID Tafsir</td>
											<td class="text-center text-nowrap">Nama Customer</td>
											<td class="text-center text-nowrap">No HP</td>
											<td class="text-center text-nowrap">Alamat</td>
											<td class="text-center text-nowrap">Jenis Barang</td>
											<td class="text-center text-nowrap">Nilai Barang</td>
											<td class="text-center text-nowrap">Maksimal Pinjaman</td>
											<td class="text-center text-nowrap">Nilai Maksimal Pinjaman</td>
											<td class="text-center text-nowrap">Nilai AHP</td>
											<td class="text-center text-nowrap">Tanggal</td>
											<td class="text-center text-nowrap">Action</td>
										</tr> 
										@foreach($data['tafsir'] as $value)
										
										<tr>
											<td class="text-center text-nowrap">{{$value->id_tafsir}}</td>
											<td class="text-center text-nowrap">{{$value->nama}}</td>
											<td class="text-center text-nowrap">{{$value->hp}}</td>
											<td class="text-center text-nowrap">{{$value->alamat}}</td>
											<td class="text-center text-nowrap">{{$value->nama_barang}}</td>
											<td class="text-center text-nowrap">Rp. {{$value->nilai_barang}}</td>
											<td class="text-center text-nowrap">{{($value->maks_pinjaman * 100)}} %</td>
											<td class="text-center text-nowrap">{{$value->maks_nilai}}</td>
											<td class="text-center text-nowrap">{{$value->nilai_ahp}}</td>
											<td class="text-center text-nowrap">{{$value->tanggal_tafsir}}</td>
											<td class="text-center text-nowrap">
											<a href="/validasi_pinjam/{{$value->id_tafsir}}"><button type="submit" class="btn btn-success"><i class="fa fa-fw fa-list-alt"></i><font color="white">View</font></button></a>
											</td>
										</tr>
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