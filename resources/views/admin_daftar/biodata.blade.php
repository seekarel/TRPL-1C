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
							<a class="navbar-brand text-size-24" href="#"><i class="fa fa-list-alt"></i> Edit Biodata</a>
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
									<h3 class="panel-title">Biodata Pegadai</h3>
									<span class="text-grey">Data Pelanggan</span>
								</div>
								<div class="panel-body">
									<form action="{{url('/update_biodata')}}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
									<input type="hidden" class="form-control" name="id_customer" value="{{$data['biodata'][0]->id_customer}}" required>
										<div class="form-group">
											<label class="col-sm-3 control-label">Nama Lengkap</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="nama" value="{{$data['biodata'][0]->nama}}" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Alamat</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="alamat" value="{{$data['biodata'][0]->alamat}}" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Tempat Lahir</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="kota_lahir" value="{{$data['biodata'][0]->kota_lahir}}" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Tanggal Lahir	</label>
											<div class="col-sm-6">
												<input type="date" placeholder="Placeholder text" class="form-control" name="tanggal_lahir" value="{{$data['biodata'][0]->tanggal_lahir}}" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Pekerjaan</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="pekerjaan" value="{{$data['biodata'][0]->pekerjaan}}" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">No KTP</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="ktp" value="{{$data['biodata'][0]->ktp}}"required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">No HP</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="hp" value="{{$data['biodata'][0]->hp}}"required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Agama</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="agama" value="{{$data['biodata'][0]->agama}}" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Nama Ibu</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="nama_ibu" value="{{$data['biodata'][0]->nama_ibu}}" required>
											</div>
										</div>
											<div class="form-group">
											<label class="col-sm-3 control-label">Jenis Kelamin</label>
											<div class="col-sm-3">
												<?php $sex=$data['biodata']['0']->jenis_kelamin ?>
												<input type="radio" class="radio-control" name="jenis_kelamin" value="Laki-Laki" {{$sex=='Laki-Laki'?'checked':''}}>Laki-Laki</br>
												<input type="radio" class="radio-control" name="jenis_kelamin" value="Perempuan" {{$sex=='Perempuan'?'checked':''}}>Perempuan
											</div>
											
										</div>
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<div class="form-group">
											<div class="col-sm-9" align="right">
												<button class="btn btn-success" type="submit" name="oke" value="oke">Update</button>
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