<!DOCTYPE html>
<html lang="en" ng-app="DoTransactionRecords">
	<head>
		<title>ARDANA OnLiNe</title>
		@include('general.head')
	</head>

  	<body ng-controller="DoTransactionController">
  	<div class="ng-scope">
		@include('general.navbar')
	    <div class="container transaction-form">		
			<h2>Transaksi</h2>
			{{ $item->nama }}</br>
            <span class="error-msg"><% error %></span>
            <form name="frmDoTransaction" class="form-horizontal" role="form" class="form-horizontal" novalidate="">
                <div class="form-group form-group error">
                	<input type="hidden" id="item_id" name="item_id" value="{{ $item->id }}" ng-model="transaction.item_id" ng-init="transaction.item_id={{ $item->id }}">
                	<label class="col-sm-2 control-label">Nomor</label>
					<div class="col-sm-10 input">
                        <input required type="text" class="form-control has-error" id="nomor" name="nomor"
                        placeholder="{{ $jenis_item->message}}"
                        ng-model="transaction.nomor" ng-required="true">
                        <span class="help-inline" ng-show="frmDoTransaction.transaction.$invalid && frmDoTransaction.transaction.$touched">Required</span>
                    </div>
                	@if(!$item->harga)
                    <label class="col-sm-2 control-label">Nominal</label>
                    <div class="col-sm-10 input">
                        <input required type="text" class="form-control has-error" id="nominal" name="nominal"
                        placeholder="Masukkan nominal merchant" 
                        ng-model="merchant.nominal" ng-required="true">
                        <span class="help-inline" ng-show="frmDoTransaction.nominal.$invalid && frmDoTransaction.nominal.$touched">Required</span>
                    </div>
                    @endif
                    <button type="button" class="btn btn-primary" id="btn-save" ng-click="confirm()" ng-disabled="frmDoTransaction.$invalid">Transaksi!!!</button>
                </div>
            </form>
            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            Apakah Anda yakin ingin melakukan transaksi?</br>
                            {{ $item->nama }}</br>
                            <% transaction.nomor %>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-ok" ng-click="save('{{ csrf_token() }}')">Ya</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            Transaksi berhasil
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-ok" ng-click="ok()">OK</button>
                        </div>
                    </div>
                </div>
            </div>
	  	</div>
	  	@include('general.bottom-scripts')
	  	<script src="<?= asset('app/controllers/do_transaction.js') ?>"></script>
	</body>
</html>