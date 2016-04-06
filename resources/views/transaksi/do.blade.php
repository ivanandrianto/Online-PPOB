<h2>{{ $jenis_item->title }}</h2>

<ul>
{{ $jenis_item->message }} <input type="text" name="message" id="message"></br>
@if(!$item->harga)
	Nominal <input type="text" name="price" id="price">
@endif
</ul>