<?php $number = 1; ?>
@foreach($transaksis as $transaksi)
<tr>
	<th>{{ $number }}</th>
	<th>{{ $transaksi->dy_aktif }}</th>
	<td>{{ $transaksi->dy_reaktif }}</td>
	<td>{{ $transaksi->dy_semu }}</td>
	<td>{{ $transaksi->created_at }}</td>
</tr>
<?php $number++; ?>
@endforeach