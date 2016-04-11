<!DOCTYPE html>
<html lang="en-US" ng-app="PermohonanRecords">
    <head>
        <title>Permohonan</title>

        <!-- Load Bootstrap CSS -->
        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= asset('css/style.css') ?>">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body ng-controller="PermohonanController">
        <div class="mycontainer">
            <div class="content" style="width:900px;height:100%">
                <h2>Permohonan</h2>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Merchant</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                                <th>Status: <select id="select_status" name="select_status" class="form-control"  ng-model="statusFilter" ng-change="changeStatus()">
                                  <option value="">Semua SKPD</option>
                                  <option value="Diterima">Diterima</option>
                                  <option value="Ditolak">Ditolak</option>
                                </select>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="permohonan in permohonans">
                                <td><% permohonan.id %></td>
                                <td><% permohonan.merchant.nama %></td>
                                <td><% permohonan.created_at %></td>
                                <td><% permohonan.status %></td>
                                <td ng-hide="permohonan.status!='Diproses'">
                                    <button class="btn btn-danger btn-xs btn-approve" ng-click="confirm(permohonan.id,1)">Approve</button>
                                    <button class="btn btn-danger btn-xs btn-reject" ng-click="confirm(permohonan.id,0)">Reject</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <% approveReject.type_string %> permohonan dengan ID <% approveReject.id %>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="btn-ok" ng-click="save('{{ csrf_token() }}')">OK</button>
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
        <script src="<?= asset('app/controllers/permohonan.js') ?>"></script>
    </body>
</html>