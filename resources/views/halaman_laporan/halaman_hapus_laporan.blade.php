@extends('halaman_template')
@section('css')
<link href="{{ asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/clockpicker/dist/jquery-clockpicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/jquery-asColorPicker-master/css/asColorPicker.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
@endsection
@section('konten')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Hapus</a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/laporan_pf') }}">Hapus Laporan Energi</a></li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        	<div class="card">
                <div class="card-body">
                    <div class="row">
                    	<div class="col-md-12">
                    		<h4 class="card-title">Pilih Data Laporan Energi</h4>
                    	</div>
                    </div>
                    <div class="row mt-3">
                    	<div class="col-md-12">
                    		<form class="filter_form" action="{{ url('/filter_hapus_energi') }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini ?')">
                    			@csrf
                    			<input type="text" name="check_button" class="check_button" hidden="">
                    			<div class="form-row align-items-center">
                    				<div class="col-md-8">
                    					<div class="input-group">
                    						<div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input id="semua_check" name="check_semua" type="checkbox" checked="" value="1">
                                                    <label for="semua_check" class="form-check-label">&nbsp;Semua</label>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control datepicker-autoclose" name="start_date" placeholder="mm/dd/yyyy" disabled="" autocomplete="off">
                                            <input type="text" class="form-control datepicker-autoclose" name="end_date" placeholder="mm/dd/yyyy" disabled="" autocomplete="off">
                    					</div>
                    				</div>
                    				<div class="col-md-2">
                    					<button type="button" class="btn mb-1 btn-danger btn-block btn-flat font-weight-bold hapus_laporan_btn"><i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus</button>
									
                    				</div>	
																	
                    			</div>
                    		</form>
                    	</div>
						{{-- <div class="col-md-2 mt-3">
							
								
								
								<a href="{{ url('/hapus_halaman') }}" class="btn mb-1 font-weight-bold btn-sm btn-danger">Hapus Data <span class="btn-icon-right"><i class="fa fa-trash"></i></span></a>
						</div> --}}
                    	<div class="col-md-12">
                    		<hr>
                    	</div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/js/toastr.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('plugins/clockpicker/dist/jquery-clockpicker.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-asColorPicker-master/libs/jquery-asColor.js') }}"></script>
<script src="{{ asset('plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js') }}"></script>
<script src="{{ asset('plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('js/plugins-init/form-pickers-init.js') }}"></script>
<script src="{{ asset('plugins/sweetalert/js/sweetalert.min.js') }}"></script>
<script type="text/javascript">

@if ($message = Session::get('hapuss'))
swal(
    "Berhasil!",
    "{{ $message }}",
    "success"
);
@endif

	$(document).on('click', '#semua_check', function(){
		if(this.checked == true){
	        $(this).val('1');
	        $('.datepicker-autoclose').prop('disabled', true);
	        $('.datepicker-autoclose').val('');
	        $('.check_button').val('filter');
			$('.filter_form').submit();
	    }else{
	        $(this).val('0');
	        $('.datepicker-autoclose').prop('disabled', false);
	    }
	});

	$(document).on('click', '.hapus_laporan_btn', function(){
		var start_date = $('input[name=start_date]').val();
		console.log(start_date);
		var end_date = $('input[name=end_date]').val();
		console.log(start_date);
		if((start_date != '' && end_date != '') || $('#semua_check').val() == '1'){
			$('.check_button').val('filter');
			$('.filter_form').submit();
		}else if(start_date == '' && end_date == ''){
			tanggalKosong("Tanggal awal dan akhir tidak boleh kosong");
		}else if(start_date == ''){
			tanggalKosong("Tanggal awal tidak boleh kosong");
		}else{
			tanggalKosong("Tanggal akhir tidak boleh kosong");
		}
	});



	

	function tanggalKosong(keterangan){
		toastr.warning(keterangan, "Peringatan!", {
		    timeOut:5e3,
		    closeButton:!0,
		    debug:!1,
		    newestOnTop:!0,
		    progressBar:!0,
		    positionClass:"toast-bottom-right",
		    preventDuplicates:!0,
		    onclick:null,
		    showDuration:"300",
		    hideDuration:"1000",
		    extendedTimeOut:"1000",
		    showEasing:"swing",
		    hideEasing:"linear",
		    showMethod:"fadeIn",
		    hideMethod:"fadeOut",
		    tapToDismiss:!1
		});
	}

	// $('.filter_form').submit(function(e){
	// 	var check_button = $('.check_button').val();
	// 	if(check_button == 'filter'){
	// 		e.preventDefault();
	// 		var request = new FormData(this);
	// 		$.ajax({
	// 			url: "{{ url('/filter_laporan_energi') }}",
	// 			method: "POST",
	// 			data: request,
	// 			contentType: false,
	// 			processData: false,
	// 			success:function(data){
	// 				$('.isi_tabel').html(data);
	// 				// console.log(data);
	// 			}
	// 		});
	// 	}
	// });
</script>
@endsection