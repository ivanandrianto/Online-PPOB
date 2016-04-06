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
					<h2>{{ $jenis_item->title }}</h2>
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-2 control-label">No. Pelanggan</label>
							<div class="col-sm-10 input">
								<input type="text" class="form-control" id="no_pelanggan" name="no_pelanggan"
								placeholder="Masukkan no. pelanggan Anda">
							</div>
							@if(!$item->harga)
							<label class="col-sm-2 control-label">Nominal</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="price" name="price"
								placeholder="Besar Tagihan">
							</div>
							@endif
						</div>
					</form>		
				</div>
			</div>
	  	</div>
	  	@include('general.bottom-scripts')
	  	<script src="<?= asset('app/controllers/cpns.js') ?>"></script>
	</body>
</html>