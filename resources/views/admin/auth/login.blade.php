<!DOCTYPE html>
<html lang="en" ng-app="LoginAdminRecords">
    <head>
        <title>ARDANA OnLiNe</title>
        @include('general.head')
    </head>

    <body ng-controller="LoginAdminController">
    <div class="ng-scope">
        @include('general.navbar-guest')
        <div class="container login-form">
            <h2>Login</h2>
            <span class="error-msg"><% error %></span>
            <form name="frmLoginAdmin" class="form-horizontal" role="form" class="form-horizontal" novalidate="">
                <div class="form-group form-group error">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10 input">
                        <input required type="text" class="form-control has-error" id="email" name="email"
                        placeholder="Masukkan email" 
                        ng-model="admin.email" ng-required="true">
                        <span class="help-inline" ng-show="frmLoginAdmin.email.$invalid && frmLoginAdmin.email.$touched">Required</span>
                    </div>
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10 input">
                        <input required type="password" class="form-control has-error" id="password" name="password"
                        placeholder="Masukkan password" 
                        ng-model="admin.password" ng-required="true">
                        <span class="help-inline" ng-show="frmLoginAdmin.password.$invalid && frmLoginAdmin.password.$touched">Required</span>
                    </div>
                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save('{{ csrf_token() }}')" ng-disabled="frmLoginAdmin.$invalid">Login</button>
                </div>
            </form>
        </div>
        @include('general.bottom-scripts')
        <script src="<?= asset('app/controllers/login_admin.js') ?>"></script>
    </div>
    </body>
</html>