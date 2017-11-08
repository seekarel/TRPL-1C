@extends('layouts.sidebarBayar')

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
							<form action="/pembayaran_transaksi" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed" name="autoSumForm">
								<h3 class="panel-title">Pembayaran Cicilan</h3>
								<span class="text-black">ID Pinjaman : <b>{{$data['transaksi'][0]->id_pinjaman}}</b></span>
								<input type="hidden" class="form-control" name="id_pinjaman" value="{{$data['transaksi'][0]->id_pinjaman}}" required>
							</div>
							<div class="panel-body">

								<table class="table table-stripped">
									<tr>
										<td class="text-center text-nowrap">
											<div class="form-group">
												<label class="col-sm-3 control-label">ID Customer</label>
												<div class="col-sm-9">
													<div class="col-sm-9">
														<label class="col-sm-3 control-label"><font color="black"><b>{{$data['transaksi'][0]->id_customer}}</b></font></label>
														<input type="hidden" class="form-control" name="id_customer" value="{{$data['transaksi'][0]->id_customer}}" required>

													</div>
												</div>
											</div>	
										</td>
										<td class="text-center text-nowrap">
											<div class="form-group">
												<label class="col-sm-3 control-label">Nama</label>
												<div class="col-sm-9">
													<div class="col-sm-9">
														<label class="col-sm-3 control-label"><font color="black"><b>{{$data['transaksi'][0]->nama}}</b></font></label>
														<input type="hidden" value="{{$data['transaksi'][0]->nama}}" class="form-control" name="nama" required>
													</div>
												</div></div>
											</td>											
										</tr>
										<tr>
													<td class="text-center text-nowrap">
												<div class="form-group">
													<br>
													<label class="col-sm-3 control-label">Angsuran Ke</label>
													<div class="col-sm-9">
														<div class="col-sm-9 input-group">
															<label class="col-sm-3 control-label"><font color="black"><b>{{$data['angsuran'][0]->angsuran+1}}</b></font></label>
															<input type="hidden" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" name="angsuranke" value="{{$data['angsuran'][0]->angsuran+1}}" required readonly></div>
															<br>
														</div>		
													</td>			
											<td class="text-center text-nowrap">
												<div class="form-group">
													<br>
													<label class="col-sm-3 control-label">Jumlah Angsuran</label>
													<div class="col-sm-9">
														<div class="col-sm-9 input-group" align="left">
															<label class="col-sm-3 control-label"><font color="black"><b>{{round($data['transaksi'][0]->total_angsuran)}}</b></font></label>
															<input type="hidden" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" name="angsuran_total" min="0" max="{{$data['transaksi'][0]->total_angsuran}}" value="{{$data['transaksi'][0]->total_angsuran}}" required readonly></div>
															<br>
														</div>		
													</td>
												</tr> 
												<tr>
													<td class="text-center text-nowrap" >
														<div class="form-group">
																<br>
															<label class="col-sm-3 control-label">Administrasi</label>
															<div class="col-sm-9">
																<div class="col-sm-9 input-group">
																	<div class="input-group-addon">IDR</div> 
																	<input type="text" class="form-control" name="administrasi" onFocus="startCalc();" onBlur="stopCalc();" value="1500" required readonly>
																</div>
																<br>
															</div>
														</div>							
													</td>
													<td class="text-center text-nowrap" >
														<div class="form-group">
																<br>
															<label class="col-sm-3 control-label">Total</label>
															<div class="col-sm-9">
																<div class="col-sm-9 input-group">
																	<div class="input-group-addon">IDR</div> 
																	<input type="text" class="form-control" name="total" onFocus="startCalc();" onBlur="stopCalc();" required readonly>
																</div>
																<br>
															</div>
														</div>							
													</td>

												</tr>
												<tr>
													<td class="text-center text-nowrap">
														<div class="form-group"><br>
															<label class="col-sm-3 control-label">Pembayaran</label>
															<div class="col-sm-9">
																<div class="col-sm-9 input-group" align="left">
																	<div class="input-group-addon">IDR</div>
																	<input type="text" class="form-control" name="pembayaran" onFocus="startCalc();" onBlur="stopCalc();" required>
																</div><br>
															</div>
														</div>							
													</td>
													<td class="text-center text-nowrap">
														<div class="form-group"><br>
															<label class="col-sm-3 control-label">Kembalian</label>
															<div class="col-sm-9">
																<div class="col-sm-9 input-group" align="left">
																	<div class="input-group-addon">IDR</div>
																	<input type="text" class="form-control" name="kembalian" onFocus="startCalc();" onBlur="stopCalc();"  required >
																</div><br>

															</div>
														</div>
													</td>
												</tr>
												
												<tr>
													<td class="text-center text-nowrap" colspan="2">
														<div class="form-group">
															
															<div class="col-sm-12">
																<input type="hidden" name="_token" value="{{ csrf_token() }}">
																<input type="hidden" name="angsuran_pokok" value="{{$data['transaksi'][0]->angsuran_pokok}}">
																<input type="hidden" name="angsuran_bunga" value="{{$data['transaksi'][0]->angsuran_bunga}}">
																<input type="hidden" name="sisa_hutang" value="{{$data['transaksi'][0]->sisa_pinjaman}}">

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