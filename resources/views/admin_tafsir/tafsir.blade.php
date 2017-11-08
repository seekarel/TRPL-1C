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
							<a class="navbar-brand text-size-24" href="#"><i class="fa fa-list-alt"></i> Formulir Tafsir Barang</a>
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
								
								<div class="panel-body">
								<form action="/perhitungan" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
								<div class="col-md-6">
								<div class="form-group">
									<div class="form-group">
										<label class="col-sm-3 control-label">ID Customer</label>
										<div class="col-sm-9">
											<select class="form-control" name="id_customer" placeholder="Magnitudo" required>
												<option value="">PILIH ID CUSTOMER</option>
												@foreach($data['customer'] as $row)
												<option value='{{$row->id_customer}}'>{{$row->nama}}</option>;
												@endforeach												
											
											</select>
										</div>
									</div>								
								</div>
								<hr>
								<div class="form-group">
									<div class="form-group">
										<label class="col-sm-3 control-label">Penghasilan</label>
										<div class="col-sm-9">
											<select class="form-control" name="id_penghasilan" placeholder="Magnitudo" required>
												<option value="">PILIH SUB-KRITERIA</option>
												@foreach($data['penghasilan'] as $row)
												<option value='{{$row->id_penghasilan}}'>{{$row->nama}}</option>;
												@endforeach	
											</select>
										</div>
									</div>								
								</div>
								<div class="form-group">
									<div class="form-group">
										<label class="col-sm-3 control-label">Kondisi Usaha</label>
										<div class="col-sm-9">
											<select class="form-control" name="id_kondisiusaha" placeholder="Magnitudo" required>
												<option value="">PILIH SUB-KRITERIA</option>
												@foreach($data['kondisiusaha'] as $row)
												<option value='{{$row->id_kondisiusaha}}'>{{$row->nama}}</option>;
												@endforeach	
											</select>
										</div>
									</div>								
								</div>
								<div class="form-group">
									<div class="form-group">
										<label class="col-sm-3 control-label">Kemampuan Melunasi Hutang</label>
										<div class="col-sm-9">
											<select class="form-control" name="id_melunasi" placeholder="Magnitudo" required>
												<option value="">PILIH SUB-KRITERIA</option>
												@foreach($data['kemampuanmelunasihutang'] as $row)
												<option value='{{$row->id_melunasi}}'>{{$row->nama}}</option>;
												@endforeach	
											</select>
										</div>
									</div>								
								</div>	
								<div class="form-group">
									<div class="form-group">
										<label class="col-sm-3 control-label">Aset</label>
										<div class="col-sm-9">
											<select class="form-control" name="id_aset" placeholder="Magnitudo" required>
												<option value="">PILIH SUB-KRITERIA</option>
												@foreach($data['aset'] as $row)
												<option value='{{$row->id_aset}}'>{{$row->nama}}</option>;
												@endforeach	
											</select>
										</div>
									</div>								
								</div>
								<div class="form-group">
									<div class="form-group">
										<label class="col-sm-3 control-label">Tanggungan Hidup</label>
										<div class="col-sm-9">
											<select class="form-control" name="id_tanggungan" placeholder="Magnitudo" required>
												<option value="">PILIH SUB-KRITERIA</option>
												@foreach($data['tanggunganhidup'] as $row)
												<option value='{{$row->id_tanggungan}}'>{{$row->nama}}</option>;
												@endforeach	
											</select>
										</div>
									</div>								
								</div>
								<div class="form-group">
									<div class="form-group">
										<label class="col-sm-3 control-label">Kepemilikan Rumah</label>
										<div class="col-sm-9">
											<select class="form-control" name="id_kepemilikan" placeholder="Magnitudo" required>
												<option value="">PILIH SUB-KRITERIA</option>
												@foreach($data['kepemilikanrumah'] as $row)
												<option value='{{$row->id_kepemilikan}}'>{{$row->nama}}</option>;
												@endforeach	
											</select>
										</div>
									</div>
								</div>									
								</div>
								<div class="col-md-6">
								<div class="form-group">
									<div class="form-group">
										<label class="col-sm-3 control-label">Tanggal</label>
										<div class="col-sm-9">
											<input type="date" placeholder="Placeholder text" class="form-control" name="tanggal_tafsir" required>
										</div>
									</div>
								</div>
								<hr>
								<div class="form-group">
									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Barang</label>
										<div class="col-sm-9">
											<textarea class="form-control" name="nama_barang" placeholder="Example : BPKB Mobil Honda HR-V" ></textarea>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="form-group">
										<label class="col-sm-3 control-label">Nilai Barang</label>
										<div class="col-sm-9 input-group">
											<div class="input-group-addon">IDR</div>
											<input type="text" class="form-control" name="nilai_barang" placeholder="Total Harga" required">
											<!-- <input type="text" class="form-control" name="nilai_barang" placeholder="Total Harga" required onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"> -->
										</div>
									</div>
								</div>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<div class="form-group">
										<label class="col-sm-3 control-label"></label>
										<div class="col-sm-9">
											<button class="btn btn-success" type="submit">Submit</button>
										</div>
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
		