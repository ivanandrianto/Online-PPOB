<!DOCTYPE html>
<html lang="en" ng-app="LoginMerchantRecords">
    <head>
        <title>ARDANA OnLiNe</title>
        @include('general.head')
    </head>

    <body ng-controller="LoginMerchantController">
    <div class="ng-scope">
        @include('general.navbar-guest')
        <div class="container login-form">
            <h2>Login</h2>
            <span class="error-msg"><% error %></span>
            <form name="frmLoginMerchant" class="form-horizontal" role="form" class="form-horizontal" novalidate="">
                <div class="form-group form-group error">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10 input">
                        <input required type="text" class="form-control has-error" id="email" name="email"
                        placeholder="Masukkan email" 
                        ng-model="merchant.email" ng-required="true">
                        <span class="help-inline" ng-show="frmLoginMerchant.email.$invalid && frmLoginMerchant.email.$touched">Required</span>
                    </div>
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10 input">
                        <input required type="password" class="form-control has-error" id="password" name="password"
                        placeholder="Masukkan password" 
                        ng-model="merchant.password" ng-required="true" ng-keyup="$event.keyCode == 13 && save('{{ csrf_token() }}')">
                        <span class="help-inline" ng-show="frmLoginMerchant.password.$invalid && frmLoginMerchant.password.$touched">Required</span>
                    </div>
                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save('{{ csrf_token() }}')" ng-disabled="frmLoginMerchant.$invalid">Login</button>
                </div>
            </form>
        </div>
        @include('general.bottom-scripts')
        <script src="<?= asset('app/controllers/login_merchant.js') ?>"></script>
    </div>
    </body>
</html>