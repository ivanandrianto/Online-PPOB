<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ARDANA OnLiNe</title>
		@include('general.head')
	</head>
  	<body>
		@include('general.navbar-guest')
		<div class="col-md-12 merchant-welcome">
			<div id="welcome-text">
				<h2>Sorry, your application is rejected</h2>
			</div>
		</div>
	  	@include('general.bottom-scripts')
	  	<script src="<?= asset('app/controllers/cpns.js') ?>"></script>
	</body>
</html>