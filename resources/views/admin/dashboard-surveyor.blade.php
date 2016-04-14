<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ARDANA OnLiNe</title>
		@include('general.head')
	</head>

  	<body>

		@include('general.navbar_wo_sidebar')
		<div class="col-md-12 merchant-welcome">
			<div id="welcome-text">
				<h2>Welcome Software Engineer</h2>
			</div>
			<div class="container welcome-button">
				<div class="row">
					<a href="/admin/permohonan"><button type="button" class="btn btn-success">Permohonan</button></a>
				</div>
			</div>
		</div>
	  	@include('general.bottom-scripts')
	  	<script src="<?= asset('app/controllers/cpns.js') ?>"></script>
	</body>
</html>