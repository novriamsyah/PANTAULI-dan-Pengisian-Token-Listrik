<div class="card">
    <div class="card-body">
        <h4 class="card-title">Data 10 Suhu Update</h4>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <table class="table" id="table-pengunjung" style="width: 100%;">
                    <thead class="text-center">
                        <tr>
                            <th>NO</th>
                            <th>Suhu</th>
                            <th>WAKTU</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($suhu_data as $datas)
                        <tr>
                            <th style="padding-left: 20px;">{{ $loop->iteration }}</th>
                            <td wire:poll>{{ $datas->temp }}</td>
                            @php
                            \Carbon\Carbon::setLocale('id');
                            @endphp
                            <td>{{ Carbon\Carbon::parse($datas->created_at)->diffForHumans()}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



