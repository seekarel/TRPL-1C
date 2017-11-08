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
							<h3 class="panel-title">Formulir Validasi</h3>
							<span class="text-grey">Data Tafsir</span>
						</div>
						<div class="panel-body">
							<form action="/validasi" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
								<div class="col-md-6">
									<div class="form-group">
										<div class="form-group">
											<label class="col-sm-3 control-label">ID Tafsir</label>
											<div class="col-sm-9">
												<div class="col-sm-9">
													<input type="text" class="form-control" name="id_tafsir" value="{{$data['tafsir'][0]->id_tafsir}}" required readonly>
												</div>
											</div>
										</div>								
									</div>
									<hr>
									<div class="form-group">
										<div class="form-group">
											<label class="col-sm-3 control-label">Penghasilan</label>
											<div class="col-sm-9">
												<div class="col-sm-9">
													<input type="text" class="form-control" name="id_penghasilan" value="{{$data['tafsir'][0]->id_penghasilan}}" required readonly>
												</div>
											</div>
										</div>								
									</div>
									<div class="form-group">
										<div class="form-group">
											<label class="col-sm-3 control-label">Kondisi Usaha</label>
											<div class="col-sm-9">
												<div class="col-sm-9">
													<input type="text" class="form-control" name="id_kondisiusaha" value="{{$data['tafsir'][0]->id_kondisiusaha}}" required readonly>
												</div>
											</div>
										</div>								
									</div>
									<div class="form-group">
										<div class="form-group">
											<label class="col-sm-3 control-label">Kemampuan Melunasi Hutang</label>
											<div class="col-sm-9">
												<div class="col-sm-9">
													<input type="text" class="form-control" name="id_melunasi" value="{{$data['tafsir'][0]->id_melunasi}}" required readonly >
												</div>
											</div>
										</div>								
									</div>	
									<div class="form-group">
										<div class="form-group">
											<label class="col-sm-3 control-label">Aset</label>
											<div class="col-sm-9">
												<div class="col-sm-9">
													<input type="text" class="form-control" name="id_aset" value="{{$data['tafsir'][0]->id_aset}}" required readonly>
												</div>
											</div>
										</div>								
									</div>
									<div class="form-group">
										<div class="form-group">
											<label class="col-sm-3 control-label">Tanggungan Hidup</label>
											<div class="col-sm-9">
												<div class="col-sm-9">
													<input type="text" class="form-control" name="id_tanggungan" value="{{$data['tafsir'][0]->id_tanggungan}}" required readonly>
												</div>
											</div>
										</div>								
									</div>
									<div class="form-group">
										<div class="form-group">
											<label class="col-sm-3 control-label">Kepemilikan Rumah</label>
											<div class="col-sm-9">
												<div class="col-sm-9">
													<input type="text" class="form-control" name="id_kepemilikan" value="{{$data['tafsir'][0]->id_kepemilikan}}" required readonly>
												</div>
											</div>
										</div>
									</div>									
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="form-group">
											<label class="col-sm-3 control-label">ID Customer</label>
											<div class="col-sm-9">
												<input type="text" value="{{$data['tafsir'][0]->id_customer}}" class="form-control" name="id_customer" required readonly>
											</div>
										</div>
									</div>
									<hr>
									<div class="form-group">
										<div class="form-group">
											<label class="col-sm-3 control-label">Nama Barang</label>
											<div class="col-sm-9">
												<input type="text" value="{{$data['tafsir'][0]->nama_barang}}" class="form-control" name="nama_barang" required readonly>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="form-group">
											<label class="col-sm-3 control-label">Nilai Barang</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="nilai_barang" value="{{$data['tafsir'][0]->nilai_barang}}" required readonly>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="form-group">
											<label class="col-sm-3 control-label">Presentase Pinjaman</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="maks_pinjaman" value="{{$data['tafsir'][0]->maks_pinjaman*100}}" required readonly>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="form-group">
											<label class="col-sm-3 control-label">Maks Pinjaman</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="maks_nilai" value="{{$data['tafsir'][0]->maks_nilai}}" required >
											</div>
										</div>
										<input type="hidden" class="form-control" name="nilai_ahp" value="{{$data['tafsir'][0]->nilai_ahp}}" required >

									</div>
									<div class="form-group">
										<div class="form-group">
											<label class="col-sm-3 control-label">Tanggal Tafsir</label>
											<div class="col-sm-9">
												<input type="date" class="form-control" name="tanggal_tafsir" value="{{$data['tafsir'][0]->tanggal_tafsir}}" required readonly>
											</div>
										</div>
									</div>

									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<div class="form-group">
											<label class="col-sm-3 control-label"></label>
											<div class="col-sm-9">
												<button class="btn btn-success" type="submit" value="terima" name="terima">Approve</button>												
												<button class="btn btn-danger" type="submit" value="tolak" name="tolak">Decline</button>
											</div>
										</div>
									</div>

								</form>
								
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection