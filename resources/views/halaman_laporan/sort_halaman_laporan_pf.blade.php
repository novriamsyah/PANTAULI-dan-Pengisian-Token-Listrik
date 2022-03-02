<?php $number = 1; ?>
@foreach($transaksis as $transaksi)
<tr>
	<th>{{ $number }}</th>
	<th>{{ $transaksi->pf }}</th>
	<td>{{ $transaksi->pf_sudah }}</td>
	<td>{{ $transaksi->created_at }}</td>
</tr>
<?php $number++; ?>
@endforeach