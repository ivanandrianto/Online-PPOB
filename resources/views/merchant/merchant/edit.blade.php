<!DOCTYPE html>
<html lang="en" ng-app="MyMerchantRecords">
    <head>
        <title>ARDANA OnLiNe</title>
        @include('general.head')
    </head>

    <body ng-controller="MyMerchantController">

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
                    <h2>Edit My Merchant</h2>
                    <form name="frmItem" class="form-horizontal" novalidate="">
                        <input id="_token" name="_token" type="hidden" value="<?php echo csrf_token(); ?>"
                        ng-model="mymerchant._token">

                        <div class="form-group error">
                            <label for="nama" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input required type="text" class="form-control has-error" id="nama" name="nama" placeholder="Nama" value="<% nama %>" 
                                ng-model="mymerchant.nama" ng-required="true">
                                <span class="help-inline" 
                                ng-show="frmMyMerchant.nama.$invalid && frmMyMerchant.nama.$touched">Field nama harus diisi</span>
                            </div>
                        </div>

                        <div class="form-group error">
                            <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input required type="text" class="form-control has-error" id="alamat" name="alamat" placeholder="Alamat" value="<% mymerchant.alamat %>" 
                                ng-model="mymerchant.alamat" ng-required="true">
                                <span class="help-inline" 
                                ng-show="frmMyMerchant.alamat.$invalid && frmMyMerchant.alamat.$touched">Field alamat harus diisi</span>
                            </div>
                        </div>

                        <div class="form-group error">
                            <label for="telepon" class="col-sm-3 control-label">Telepon</label>
                            <div class="col-sm-9">
                                <input required type="text" class="form-control has-error" id="telepon" name="telepon" placeholder="Telepon" value="<% telepon %>" 
                                ng-model="mymerchant.telepon" ng-required="true">
                                <span class="help-inline" 
                                ng-show="frmMyMerchant.telepon.$invalid && frmMyMerchant.telepon.$touched">Field telepon harus diisi</span>
                            </div>
                        </div>

                        <div class="form-group error">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input required type="email" class="form-control has-error" id="email" name="email" placeholder="Email" value="<% email %>" 
                                ng-model="mymerchant.email" ng-required="true">
                                <span class="help-inline" 
                                ng-show="frmMyMerchant.email.$invalid && frmMyMerchant.email.$touched">Field email harus diisi</span>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="btn-save" ng-click="save('{{ csrf_token() }}')" ng-disabled="frmItem.$invalid">Save changes</button>

                    </form>
                    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <% successMessage %>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="btn-ok" ng-click="ok()">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('general.bottom-scripts')
        <script src="<?= asset('app/controllers/my-merchant.js') ?>"></script>
    </body>
</html>












