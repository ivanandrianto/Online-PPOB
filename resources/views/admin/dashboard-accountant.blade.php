<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ARDANA OnLiNe</title>
		@include('general.head')
	</head>

  	<body>

		@include('general.navbar-admin')
		<div class="col-md-12 merchant-welcome">
			<div id="welcome-text">
				<h2>Welcome Accountant</h2>
			</div>
			<div class="container welcome-button">
				<div class="row">
					<a href="/admin/keuntungan"><button type="button" class="btn btn-success">Lihat Keuntungan</button></a>
					<a href="/admin/keuntungan/generate"><button type="button" class="btn btn-success">Generate Keuntungan</button></a>
					<a href="/admin/transaksi"><button type="button" class="btn btn-success">Transaksi</button></a>
				</div>
			</div>
		</div>
	  	@include('general.bottom-scripts')
	  	<script src="<?= asset('app/controllers/cpns.js') ?>"></script>
	</body>
</html>