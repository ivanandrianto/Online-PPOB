<h2>{{ $jenis_item->title }}</h2>

<ul>
@foreach($items as $key => $value)
	<a href="transaksi/item/{{ $value-> id}}"><li>{{ $value->nama }}</li></a>
@endforeach
</ul>