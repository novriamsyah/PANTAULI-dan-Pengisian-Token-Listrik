@extends('halaman_template')
@section('css')
<link href="{{ asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
<style type="text/css">

.tabel-riwayat thead tr th, .tabel-riwayat tbody tr th, .tabel-riwayat tbody tr td{
    font-size: 11px;
}

#kartu_ctrl {
    float:left;  margin-left:30px; margin-right:20px; width:40%; border: 1px solid #000; background: linear-gradient(to bottom right, #ccffff 0%, #ffffff 100%); text-align:center;
}
@media (max-width:768px) {
    #kartu_ctrl {
        width: 100%;
    }
}

</style>
@endsection
@section('konten')
<div id="bila"></div>
<div class="container-fluid mt-3">

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" style="text-align: center">
                        <div class="judul" style="text-align: center">
                            <h4>Panel Kontrol Relay <i>Power Factor</i></h4>
                            <hr>
                        </div>
                    </div>
                    <p style="font-size: 14px"><strong><i>*) Untuk Mengubah status klik pada tombol !!</i></strong></p>
                    <div class="col-md-12 mt-4">
                        @foreach($kontrol as $res)
                        <div id="kartu_ctrl" class="card">
                            
                            <div class="card-body">
                                
                                <h5 class="card-title">{{$res->nm_panel}}</h5>
                                    <p class="card-text" id="stat_kon">status : <br>
                                         @php
                                           if($res->panel == '1') {
                                                $stat = "Nyala";
                                            }else{
                                                $stat = "Padam";
                                            }
                                            echo $stat;
                                        @endphp
                                    </p>
                                <input data-id="{{$res->id}}" class="toggle-class" type="checkbox"  data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Nyala" data-off="Padam" {{ $res->panel == true ? 'checked' : '' }}>
                                   
                            </div>
                            
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="text-align:center">Monitoring Panel Relay</h4>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table" id="table-pengunjung" style="width: 100%;">
                            <thead class="text-center">
                                <tr>
                                    <th>PANEL</th>
                                    <th>STATUS</th>
                                    <th>WAKTU</th>
                                </tr>
                            </thead>
                            <tbody class="show-panel">
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection 
@section('script')
<script src="{{ asset('plugins/toastr/js/toastr.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
      $('.toggle-class').change(function() {
          var panel = $(this).prop('checked') == true ? 1 : 0; 
        //   console.log(panel);
          var id = $(this).data('id'); 
           
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '{{ route('status')}}',
              data: {'panel': panel, 'id': id},
              success: function(data){
                
                // tanggalKosong("Tanggal akhir tidak boleh kosong");
                  
                // console.log(data.success)
                // var tes = data.success.panel;
                // // console.log(tes);
                // if(tes == 1) {
                //     var stat = "Nyala";
                // } else {
                //     var stat = "Padam";
                // }
                // console.log(stat);
                // var status_kon = document.getElementById('stat_kon');
                // var status_konlast = parseInt(status_kon.textContent);
                // status_kon.innerHTML = data;
              },
              success:function($data) {
                // $('#bila').fadeIn();
                // $("#bila").css({'background':'#ffcc00', 'color':'#000', 'text-align':'center', 'text-weight':'bold', 'padding':'10px','font-size:':'24px'});
                // $('#bila').text('Perubahan Berhasil Dilakukan');
                // setTimeout(() => {
                //   $('#bila').fadeOut();
                // },4000);
                tanggalKosong("Kondisi Panel Relay Sudah Anda Rubah");
              }
          });
      })
    });

    function tanggalKosong(keterangan){
		toastr.success(keterangan, "Sukses Mengubah", {
		    timeOut:5e3,
		    closeButton:!0,
		    debug:!1,
		    newestOnTop:!0,
		    progressBar:!0,
		    positionClass:"toast-top-right",
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

    var updatekontrol = function() {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: '{{ route('status_kontrol') }}',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        //   const tes = data.data.length;
        //   console.log(tes); 
        //   var coba = data.waktu;
            // console.log(coba);       

        var html = '';
        // var count = 1;
        if(data.status_panel != null) {
            var tam = data.status_panel.length;
            // console.log(tam);
        }
        if(tam>0){
            for(var i=0; i<tam; i++){
                var sts = data.status_panel[i].panel;
                var nama_panel = data.status_panel[i].nm_panel;
                var waktu = data.waktu[i];
                if(sts == 1){
                    var say = "Nyala";
                }else {
                    var say = "Padam";
                }
                // console.log(say);

                html += '<tr>'+
                        '<td align="center">'+ nama_panel  +'</td>'+
                        '<td align="center">'+ say +'</td>'+
                        '<td align="center">'+ waktu +'</td>'+
                        '</tr>';
            }
            $('.show-panel').html(html);
        // console.log(html);
        }
      },
      error: function(data){
        console.log(data);
      }
      

    });
  }
  updatekontrol ();
  setInterval(() => {
    updatekontrol ();
  }, 1000);
    // function autoRefreshPage()
    // {
    //     window.location = window.location.href;
    // }
    // setInterval('autoRefreshPage()', 10000);
</script>

@endsection