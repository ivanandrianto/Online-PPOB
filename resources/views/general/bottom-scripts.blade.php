        <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
        <script src="<?= asset('js/jquery.min.js') ?>"></script>
        <script src="<?= asset('js/jquery-ui.js') ?>"></script>
        <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
        <script src="<?= asset('js/angular-route.min.js') ?>"></script>

        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script type="text/javascript">
          var type = "StafBKD";
        </script>

	    <script>
	    	$(document).ready(function() {
			  $('[data-toggle=offcanvas]').click(function() {
			    $('.sidebar-offcanvas').toggleClass('active', 1000);
			  });
			});
	    </script>