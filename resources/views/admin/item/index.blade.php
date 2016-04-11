<!DOCTYPE html>
<html lang="en-US" ng-app="ItemRecords">
    <head>
        <title>Item</title>

        <!-- Load Bootstrap CSS -->
        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= asset('css/style.css') ?>">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body ng-controller="ItemController">
        <div class="mycontainer">
            <div class="content" style="width:900px;height:100%">
                <h2>Item</h2>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Harga</th>
                                <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Tambah Item Baru</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in items">
                                <td><% item.id %></td>
                                <td><% item.nama %></td>
                                <td><% item.jenis %></td>
                                <td><% item.harga %></td>
                                <td>
                                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', item.id)">Edit</button>
                                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(item.id)">Delete</button>
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
                                    <form name="frmItem" class="form-horizontal" novalidate="">
                                        <input id="_token" name="_token" type="hidden" value="<?php echo csrf_token(); ?>"
                                        ng-model="item._token">

                                        <div class="form-group error">
                                            <label for="nama" class="col-sm-3 control-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input required type="text" class="form-control has-error" id="nama" name="nama" placeholder="Nama" value="<% nama %>" 
                                                ng-model="item.nama" ng-required="true">
                                                <span class="help-inline" 
                                                ng-show="frmItem.nama.$invalid && frmItem.nama.$touched">Field nama harus diisi</span>
                                            </div>
                                        </div>

                                        <div class="form-group error">
                                            <label for="jenis" class="col-sm-3 control-label">Jenis</label>
                                            <div class="col-sm-9">
                                                <select class="form-control has-error" id="jenis" name="jenis" 
                                                    ng-model="item.jenis"
                                                    ng-options="x.id as x.jenis for x in jenisitems" ng-required="true"
                                                >
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group error">
                                            <label for="harga" class="col-sm-3 control-label">Harga</label>
                                            <div class="col-sm-9">
                                                <input required type="text" class="form-control has-error" id="harga" name="harga" placeholder="Harga" value="<% harga %>" 
                                                ng-model="item.harga" ng-required="true">
                                                <span class="help-inline" 
                                                ng-show="frmItem.harga.$invalid && frmItem.harga.$touched">Field harga harus diisi</span>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, item.id, '{{ csrf_token() }}')" ng-disabled="frmItem.$invalid">Save changes</button>
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
        <script src="<?= asset('app/controllers/item.js') ?>"></script>
    </body>
</html>