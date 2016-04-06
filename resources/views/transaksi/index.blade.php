<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ARDANA OnLiNe</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= asset('css/style.css') ?>">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

	<!-- top navbar -->
    <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="navigation">
       
    	<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".sidebar-nav">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand " href="#">ARDANA OnLiNe</a>
		</div>
		<div class="collapse navbar-collapse" id="example-navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">MyMerchant</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							Account <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
    </nav>
    
    <div class="container">
    
		<div class="row">
		
			<div class="col-md-12">
			
					<h1>Transaksi</h1>
					
			</div>
		
		</div>
		
		
		<div class="row">
		
			<!-- sidebar -->
			<div class="col-xs-6 col-sm-4 col-md-3 sidebar-offcanvas">
			    <ul data-spy="affix" data-offset-top="120" id="affix" class="nav nav-stacked">
			      <li> <a href="#"> <i class="fa fa-th"></i> Histori Transaksi</a></li>
			      <li><a href="#"> <i class="fa fa-th"></i> Menu2 </a></li>
			    </ul>
			</div>
			
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   		<script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
        <script src="<?= asset('js/jquery.min.js') ?>"></script>
        <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
        <script src="<?= asset('js/angular-route.min.js') ?>"></script>

        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script type="text/javascript">
          var type = "StafBKD";
        </script>
        <script src="<?= asset('app/controllers/cpns.js') ?>"></script>
    
    
    <script>
    	$(document).ready(function() {
		  $('[data-toggle=offcanvas]').click(function() {
		    $('.sidebar-offcanvas').toggleClass('active', 1000);
		  });
		});


    </script>
  

</body></html>