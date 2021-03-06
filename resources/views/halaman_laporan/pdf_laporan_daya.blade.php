<!DOCTYPE html>
<html>
<head>
	<title>Laporan Daya</title>
	<style type="text/css">
		html{
			margin: 0;
			padding: 0;
			font-family: "Nunito", sans-serif;
		}
		.header{
			width: 100%;
			height: auto;
			background-color: #f7f7f7f7;
			padding-bottom: 50px;
		}
		.logo-laundry{
		    object-fit: cover;
		    width: 4rem;
		    height: 4rem;
		}
		.text-right{
			text-align: center;
		}
		.text-center{
			text-align: left;
		}
		.table-header tr td{
			padding: 5px;
			color: #999999;
			font-size: 12px;

		}
		.table-content tr th{
			padding: 8px;
			font-size: 11px;
			color: #999999;
			border-bottom: 1px solid #ddd;
		}
		.table-content tr td{
			padding: 8px;
			font-size: 11px;
			color: #454545;
			border-bottom: 1px solid #ddd;
			text-align: center;
		}
		.body-content{
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<div class="header">
		<table style="width: 100%;" class="table-header">
			<tr>
				{{-- <td style="padding-top: 50px; padding-left: 50px;"><img src="{{ asset('icons/pratama_icon.png') }}" class="logo-laundry"></td> --}}
				<td class="text-right" style="font-size: 28px; color: #313131; padding-top: 50px;">Aplikasi Pantau Listrik</td>
			</tr>
			<tr>
				<td colspan="2" style="font-size: 14px; color: #313131; padding-top: 10px; " class="text-right">Data Realtime Daya Berbasis IoT</td>
			</tr>
			<tr>
				<td colspan="2" class="text-right" style="">
					@if($tanggal != '')
					{{ $tanggal }}
					@else
					{{ date('d M Y', strtotime($start_date2)) . ' - ' . date('d M Y', strtotime($end_date2)) }}
					@endif
				</td>
			</tr>
		</table>
	</div>
	<div class="body-content">
		<table style="width: 100%; border-collapse: collapse; padding-right: 50px; padding-left: 50px;" class="table-content">
			<tr>
				<th>NO</th>
				<th>Daya Aktif</th>
				<th>Daya Reaktif</th>
				<th>Daya Semu</th>
				<th>Waktu</th>
			</tr>
			@foreach($transaksis as $transaksi)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $transaksi->dy_aktif }}</td>
				<td>{{ $transaksi->dy_reaktif }}</td>
				<td>{{ $transaksi->dy_semu }}</td>
				<td>{{ $transaksi->created_at }}</td>
			</tr>
			@endforeach
			
		</table>
	</div>
</body>
</html>