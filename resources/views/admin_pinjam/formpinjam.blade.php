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
							<form action="/hutang" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed" name="autoSumForm">
								<h3 class="panel-title">Formulir Peminjaman</h3>
								<span class="text-black">ID Tafsir : <b>{{$data['user'][0]->id_tafsir}}</b></span>
								<input type="hidden" class="form-control" name="id_tafsir" value="{{$data['user'][0]->id_tafsir}}" required>
							</div>
							<div class="panel-body">

								<table class="table table-stripped">
									<tr>
										<td class="text-center text-nowrap">
											<div class="form-group">
												<label class="col-sm-3 control-label">ID Customer</label>
												<div class="col-sm-9">
													<div class="col-sm-9">
														<label class="col-sm-3 control-label"><font color="black"><b>{{$data['user'][0]->id_customer}}</b></font></label>
														<input type="hidden" class="form-control" name="id_customer" value="{{$data['user'][0]->id_customer}}" required>

													</div>
												</div>
											</div>	
										</td>
										<td class="text-center text-nowrap">
											<div class="form-group">
												<label class="col-sm-3 control-label">Nama</label>
												<div class="col-sm-9">
													<div class="col-sm-9">
														<label class="col-sm-3 control-label"><font color="black"><b>{{$data['user'][0]->nama}}</b></font></label>
														<input type="hidden" value="{{$data['user'][0]->nama}}" class="form-control" name="nama" required>
													</div>
												</div></div>
											</td>											
										</tr>
										<tr>
											<td class="text-center text-nowrap">
												<div class="form-group">
													<br>
													<label class="col-sm-3 control-label">Pinjaman</label>
													<div class="col-sm-9">
														<div class="col-sm-9 input-group" align="left">
															<div class="input-group-addon">IDR</div>
															<input type="number" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" name="jumlah_pinjaman" min="0" max="{{$data['user'][0]->maks_nilai}}" required>								</div>
															<div align="left">
																<span ><font color="green">Maksimal Pinjaman : IDR {{$data['user'][0]->maks_nilai}}</font></span>

															</div>
															<br>
														</div>		
													</td>
													<td class="text-center text-nowrap">
														<div class="form-group">
															<br>
															<label class="col-sm-3 control-label">Bunga</label>
															<div class="col-sm-9">
																<div class="col-sm-9 input-group" align="left">
																	<input type="text" class="form-control" name="bunga_pinjaman" onFocus="startCalc();" onBlur="stopCalc();" value="1.5" required readonly>
																	<div class="input-group-addon">% / Bulan</div>
																</div>
																
															</div><br>
														</div>
													</td>						
												</tr> 
												<tr>
													<td class="text-center text-nowrap" colspan="2">
														<div class="form-group">
																<br>
															<label class="col-sm-3 control-label">Lama Pinjam</label>
															<div class="col-sm-9">
																<div class="col-sm-9 input-group">
																	<input type="text" class="form-control" name="lama_pinjaman" onFocus="startCalc();" onBlur="stopCalc();" required>
																	<div class="input-group-addon">Bulan</div>
																</div>
																<br>
															</div>
														</div>							
													</td>

												</tr>
												<tr>
													<td class="text-center text-nowrap">
														<div class="form-group"><br>
															<label class="col-sm-3 control-label">Angsuran Pinjaman</label>
															<div class="col-sm-9">
																<div class="col-sm-9 input-group" align="left">
																	<div class="input-group-addon">IDR</div> 
																	<input type="text" class="form-control" name="angsuran_pinjaman" onFocus="startCalc();" onBlur="stopCalc();" required>
																	<div class="input-group-addon">/ Bulan</div>
																</div><br>
															</div>
														</div>							
													</td>
													<td class="text-center text-nowrap">
														<div class="form-group"><br>
															<label class="col-sm-3 control-label">Angsuran Bunga</label>
															<div class="col-sm-9">
																<div class="col-sm-9 input-group" align="left">
																	<div class="input-group-addon">IDR</div>
																	<input type="text" class="form-control" name="angsuran_bunga" onFocus="startCalc();" onBlur="stopCalc();"  required >
																	<div class="input-group-addon">/ Bulan</div>
																</div><br>

															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="text-center text-nowrap" colspan="2">
														<div class="form-group"><br>
															<label class="col-sm-3 control-label">Total Angsuran</label>
															<div class="col-sm-9">
																<div class="col-sm-9 input-group">
																	<div class="input-group-addon">IDR</div>
																	<input type="text" class="form-control" name="total_angsuran" onFocus="startCalc();" onBlur="stopCalc();" required>
																	<div class="input-group-addon">/ Bulan</div>																</div><br>
															</div>
														</div>							
													</td>

												</tr>
												<tr>
													<td class="text-center text-nowrap" colspan="2">
														<div class="form-group">
															<input type="hidden" class="form-control" name="id_tafsir" value="{{$data['user'][0]->id_tafsir}}" required>
															<div class="col-sm-12">
																<input type="hidden" name="_token" value="{{ csrf_token() }}">
																<button class="btn btn-success" type="submit">Proses</button>
															</div>
														</div>

													</td>

												</tr>
											</table>
										</form>



									</div>


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>

	<script src="{{url('assets/plugins/jquery/jquery-3.1.1.min.js')}}"></script>
	<script src="{{url('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/plugins/bootstrap/js/uang.js')}}"></script>
	<!-- <script type="text/javascript" src="{{url('assets/plugins/bootstrap/js/hitungan.js')}}"></script> -->
	<script src="{{url('assets/js/theme-floyd.js')}}"></script>

	</html>
	@endsection