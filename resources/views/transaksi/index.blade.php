<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ARDANA OnLiNe</title>
		@include('general.head')
	</head>

  	<body>

		@include('general.navbar')
	    
	    <div class="container">
			<div class="row">
				<div class="col-md-12">
						<h1>Transaksi</h1>
				</div>
			</div>
			
			
			<div class="row">
				@include('general.sidebar')
				
				<!-- content -->
				<div class="col-xs-12  col-sm-8 col-md-9 content">			 
					Pilih Jenis

					@foreach($jenis_item as $key => $value)
					<div class="jenis-item">
						<a href="transaksi/jenis/{{ $value-> id}}">{{ $value->jenis }}</a>
					</div>
					@endforeach
				</div>
			</div>
	  	</div>
	  	@include('general.bottom-scripts')
	  	<script src="<?= asset('app/controllers/cpns.js') ?>"></script>
	</body>
</html>