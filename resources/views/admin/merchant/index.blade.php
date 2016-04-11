<!DOCTYPE html>
<html lang="en-US" ng-app="MerchantRecords">
    <head>
        <title>Merchant</title>

        <!-- Load Bootstrap CSS -->
        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= asset('css/style.css') ?>">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body ng-controller="MerchantController">
        <div class="mycontainer">
            <div class="content" style="width:900px;height:100%">
                <h2>Merchant</h2>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="merchant in merchants">
                                <td><% merchant.id %></td>
                                <td><% merchant.nama %></td>
                                <td><% merchant.alamat %></td>
                                <td><% merchant.telepon %></td>
                                <td><% merchant.email %></td>
                                <td><% merchant.status %></td>
                                <td>
                                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', merchant.id)">Edit</button>
                                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(merchant.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- End of Table-to-load-the-data Part -->
                    <!-- Modal (Pop up when detail button clicked) -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title" id="myModalLabel"><% form_title %></h4>
                                </div>
                                <div class="modal-body">
                                    <% error %>
                                    <form name="frmMerchant" class="form-horizontal" novalidate="">
                                        <input id="_token" name="_token" type="hidden" value="<?php echo csrf_token(); ?>"
                                        ng-model="merchant._token">

                                        <div class="form-group error">
                                            <label for="nama" class="col-sm-3 control-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input required type="text" class="form-control has-error" id="nama" name="nama" placeholder="Nama" value="<% nama %>" 
                                                ng-model="merchant.nama" ng-required="true">
                                                <span class="help-inline" 
                                                ng-show="frmMerchant.nama.$invalid && frmMerchant.nama.$touched">Field nama harus diisi</span>
                                            </div>
                                        </div>

                                        <div class="form-group error">
                                            <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input required type="text" class="form-control has-error" id="alamat" name="alamat" placeholder="Alamat" value="<% alamat %>" 
                                                ng-model="merchant.alamat" ng-required="true">
                                                <span class="help-inline" 
                                                ng-show="frmMerchant.alamat.$invalid && frmMerchant.alamat.$touched">Field alamat harus diisi</span>
                                            </div>
                                        </div>

                                        <div class="form-group error">
                                            <label for="telepon" class="col-sm-3 control-label">Telepon</label>
                                            <div class="col-sm-9">
                                                <input required type="text" class="form-control has-error" id="telepon" name="telepon" placeholder="Telepon" value="<% telepon %>" 
                                                ng-model="merchant.telepon" ng-required="true">
                                                <span class="help-inline" 
                                                ng-show="frmMerchant.telepon.$invalid && frmMerchant.telepon.$touched">Field telepon harus diisi</span>
                                            </div>
                                        </div>

                                        <div class="form-group error">
                                            <label for="email" class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-9">
                                                <input required type="text" class="form-control has-error" id="email" name="email" placeholder="Email" value="<% email %>" 
                                                ng-model="merchant.email" ng-required="true">
                                                <span class="help-inline" 
                                                ng-show="frmMerchant.email.$invalid && frmMerchant.email.$touched">Field email harus diisi</span>
                                            </div>
                                        </div>

                                        <div class="form-group error">
                                            <label for="status" class="col-sm-3 control-label">Status</label>
                                            <div class="col-sm-9">
                                                <select id="status" name="status" class="form-control" ng-model="merchant.status">
                                                  <option value="Diproses">Diproses</option>
                                                  <option value="Diterima">Diterima</option>
                                                  <option value="Ditolak">Ditolak</option>
                                                </select>
                                                <span class="help-inline" 
                                                ng-show="frmMerchant.status.$invalid && frmMerchant.status.$touched">Field status harus diisi</span>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, merchant.id, '{{ csrf_token() }}')" ng-disabled="frmMerchant.$invalid">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
        <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
        <script src="<?= asset('js/jquery.min.js') ?>"></script>
        <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
        <script src="<?= asset('js/angular-route.min.js') ?>"></script>
        
        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controllers/merchant.js') ?>"></script>
    </body>
</html>