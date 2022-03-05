@extends('halaman_template')
@section('css')
<link href="{{ asset('plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
@endsection
@section('konten')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Kelola Data</a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/kelola_pulsa') }}">Kelola Pulsa</a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/tambah_pulsa') }}">Tambah Pulsa</a></li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Top Up Pulsa</h4>
                    <div class="form-validation">
                        <form class="form-valide" action="{{ url('/simpan_pulsa') }}" method="post" name="outlet_baru_form">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-nama">Device<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-nama" name="nama" placeholder="Masukkan nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-pulsa">Jumlah Pulsa <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" id="val-pulsa" name="pulsa" placeholder="Masukkan Jumlah kWh ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('plugins/toastr/js/toastr.min.js') }}"></script>
<script src="{{ asset('js/jquery.form-validator.min.js') }}"></script>
<script type="text/javascript">

@if ($message = Session::get('tidak_tersimpan'))
toastr.warning("{{ $message }}","Peringatan !", {
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
})
@endif


(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
}(jQuery));



$(function() {
  $("form[name='outlet_baru_form']").validate({
    rules: {
      nama: "required",
      // hotline: "required",
      pulsa: "required",
      // harga: {
      //   required: true
      // }
    },
    messages: {
      nama: "<span style='color: red;'>Device tidak boleh kosong</span>",
      // hotline: "<span style='color: red;'>No. HP tidak boleh kosong</span>",
      pulsa: "<span style='color: red;'>Jumlah Pulsa tidak boleh kosong</span>",
      // alamat: {
      //   required: "<span style='color: red;'>Alamat tidak boleh kosong</span>"
      // }
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>
@endsection