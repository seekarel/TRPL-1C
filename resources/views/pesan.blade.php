
<script type="text/javascript" src="{{url('assets/js/swal.js')}}"></script>

<script type="text/javascript">
	// sukses
	var sukses = '{{session('sukses')}}';
	var gagal = '{{session('gagal')}}';
	var fail_login = '{{session('fail_login')}}';
	var logout = '{{session('logout')}}';
	var input = '{{session('input')}}';
	var update = '{{session('update')}}';
	var terima = '{{session('terima')}}';
	var tolak = '{{session('tolak')}}';
	var transaksi = '{{session('transaksi')}}';

	if(transaksi != ''){
		swal({
			type: 'success',
			title: sukses,
			showConfirmButton: false,
			timer: 1600
		})
	}

	if(sukses != ''){
		swal({
			type: 'success',
			title: sukses,
			showConfirmButton: false,
			timer: 1600
		})
	}

	if(terima != ''){
		swal({
			type: 'success',
			title: terima,
			showConfirmButton: false,
			timer: 1600
		})
	}

	if(tolak != ''){
		swal({
			type: 'error',
			title: tolak,
			showConfirmButton: false,
			timer: 1600
		})
	}

	if(gagal != ''){
		swal({
			type: 'error',
			title: gagal,
			showConfirmButton: false,
			timer: 1600
		})
	}

	if(fail_login != ''){
		swal({
			type: 'error',
			title: 'Maaf', 
			text: fail_login	,
			showConfirmButton: false,
			timer: 1300
		})
	}

	if(logout != ''){
		swal({
			type: 'success',
			title: 'Berhasil Keluar',
			showConfirmButton: false,
			timer: 1300
		})
	}

	if(input != ''){
		swal({
			type: 'success',
			title: 'Data Berhasil Ditambahkan',
			showConfirmButton: false,
			timer: 1200
		})
	}

	if(update != ''){
		swal({
			type: 'success',
			title: 'Data Berhasil Diubah',
			showConfirmButton: false,
			timer: 1600
		})
	}

</script>