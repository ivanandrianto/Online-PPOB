<!DOCTYPE html>
<html lang="en-US" ng-app="JenisItemRecords">
    <head>
        <title>Jenis Item</title>

        <!-- Load Bootstrap CSS -->
        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= asset('css/style.css') ?>">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body ng-controller="JenisItemController">
        @include('general.navbar-admin')
        <div class="container mycontainer">
            <div class="row">
                <div class="col-md-12">
                        <h1>Jenis Item</h1>
                </div>
            </div>

            <div class="row">
                @include('general.sidebar-se')
                <div class="col-xs-12  col-sm-8 col-md-9 content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jenis</th>
                                <th>hasSelections</th>
                                <th>Title</th>
                                <th>Message</th>
                                <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Tambah JenisItem Baru</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="jenisitem in jenisitems">
                                <td><% jenisitem.id %></td>
                                <td><% jenisitem.jenis %></td>
                                <td><% jenisitem.hasSelections %></td>
                                <td><% jenisitem.title %></td>
                                <td><% jenisitem.message %></td>
                                <td>
                                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', jenisitem.id)">Edit</button>
                                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(jenisitem.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>    
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="myModalLabel"><% form_title %></h4>
                            </div>
                            <div class="modal-body">
                                <% error %>
                                <form name="frmJenisItem" class="form-horizontal" novalidate="">
                                    <input id="_token" name="_token" type="hidden" value="<?php echo csrf_token(); ?>"
                                    ng-model="jenisitem._token">

                                    <div class="form-group error">
                                        <label for="jenis" class="col-sm-3 control-label">Jenis</label>
                                        <div class="col-sm-9">
                                            <input required type="text" class="form-control has-error" id="jenis" name="jenis" placeholder="Jenis" value="<% jenis %>" 
                                            ng-model="jenisitem.jenis" ng-required="true">
                                            <span class="help-inline" 
                                            ng-show="frmJenisItem.jenis.$invalid && frmJenisItem.jenis.$touched">Field jenis harus diisi</span>
                                        </div>
                                    </div>


                                    <div class="form-group error">
                                        <label for="hasSelections" class="col-sm-3 control-label">hasSelections</label>
                                        <div class="col-sm-9">
                                            <select class="form-control has-error" id="hasSelections" name="hasSelections" 
                                                ng-init="jenisitem.hasSelections=hasSelections_list[0]['value']"
                                                ng-model="jenisitem.hasSelections"
                                                ng-options="x.value as x.name for x in hasSelections_list" ng-required="true"
                                            >
                                            </select>
                                            <span class="help-inline" 
                                            ng-show="frmJenisItem.hasSelections.$invalid && frmJenisItem.hasSelections.$touched">Field hasSelections harus diisi</span>
                                        </div>
                                    </div>

                                    

                                    <div class="form-group error">
                                        <label for="title" class="col-sm-3 control-label">Title</label>
                                        <div class="col-sm-9">
                                            <input required type="text" class="form-control has-error" id="title" name="title" placeholder="Title" value="<% title %>" 
                                            ng-model="jenisitem.title" ng-required="true">
                                            <span class="help-inline" 
                                            ng-show="frmJenisItem.title.$invalid && frmJenisItem.title.$touched">Field title harus diisi</span>
                                        </div>
                                    </div>

                                    <div class="form-group error">
                                        <label for="message" class="col-sm-3 control-label">Message</label>
                                        <div class="col-sm-9">
                                            <input required type="text" class="form-control has-error" id="message" name="message" placeholder="Message" value="<% jenis %>" 
                                            ng-model="jenisitem.message" ng-required="true">
                                            <span class="help-inline" 
                                            ng-show="frmJenisItem.message.$invalid && frmJenisItem.message.$touched">Field message harus diisi</span>
                                        </div>
                                    </div>


                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, jenisitem.id, '{{ csrf_token() }}')" ng-disabled="frmJenisItem.$invalid">Save changes</button>
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
        @include('general.bottom-scripts')
        <script src="<?= asset('app/controllers/jenisitem.js') ?>"></script>
    </body>
</html>