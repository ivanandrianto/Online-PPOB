<!DOCTYPE html>
<html lang="en" ng-app="RegMerchantRecords">
    <head>
        <title>ARDANA OnLiNe</title>
        @include('general.head')
    </head>

    <body ng-controller="RegMerchantController">
    <div class="ng-scope">
        @include('general.navbar-guest')
        <div class="container registration-form">
            <h2>Register</h2>
            <span class="error-msg"><% error %></span>
            <form name="frmRegMerchant" class="form-horizontal" role="form" class="form-horizontal" novalidate="">
                <div class="form-group form-group error">
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10 input">
                        <input required type="text" class="form-control has-error" id="nama" name="nama"
                        placeholder="Masukkan nama merchant"
                        ng-model="merchant.nama" ng-required="true">
                        <span class="help-inline" ng-show="frmRegMerchant.nama.$invalid && frmRegMerchant.nama.$touched">Required</span>
                    </div>
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10 input">
                        <input required type="text" class="form-control has-error" id="alamat" name="alamat"
                        placeholder="Masukkan alamat merchant" 
                        ng-model="merchant.alamat" ng-required="true">
                        <span class="help-inline" ng-show="frmRegMerchant.alamat.$invalid && frmRegMerchant.alamat.$touched">Required</span>
                    </div>
                    <label class="col-sm-2 control-label">Telepon</label>
                    <div class="col-sm-10 input">
                        <input required type="text" class="form-control has-error" id="telepon" name="telepon"
                        placeholder="Masukkan telepon" 
                        ng-model="merchant.telepon" ng-required="true">
                        <span class="help-inline" ng-show="frmRegMerchant.telepon.$invalid && frmRegMerchant.telepon.$touched">Required</span>
                    </div>
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10 input">
                        <input required type="text" class="form-control has-error" id="email" name="email"
                        placeholder="Masukkan email" 
                        ng-model="merchant.email" ng-required="true">
                        <span class="help-inline" ng-show="frmRegMerchant.email.$invalid && frmRegMerchant.email.$touched">Required</span>
                    </div>
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10 input">
                        <input required type="password" class="form-control has-error" id="password" name="password"
                        placeholder="Masukkan password" 
                        ng-model="merchant.password" ng-required="true">
                        <span class="help-inline" ng-show="frmRegMerchant.password.$invalid && frmRegMerchant.password.$touched">Required</span>
                    </div>
                    <label class="col-sm-2 control-label">Confirm password</label>
                    <div class="col-sm-10 input">
                        <input required type="password" class="form-control has-error" id="password2" name="password2"
                        placeholder="Masukkan password2" 
                        ng-model="merchant.password2" ng-required="true">
                        <span class="help-inline" ng-show="frmRegMerchant.password2.$invalid && frmRegMerchant.password2.$touched">Required</span>
                    </div>
                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save('{{ csrf_token() }}')" ng-disabled="frmRegMerchant.$invalid">Register</button>
                </div>
            </form>
            <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            You're successfully registered. Please wait for our team to review your application
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-ok" ng-click="ok()">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('general.bottom-scripts')
        <script src="<?= asset('app/controllers/register_merchant.js') ?>"></script>
    </div>
    </body>
</html>