

appDoTransaction.controller('DoTransactionController', function($scope, $location, $http, API_URL) {    
    $scope.error = "";
    $scope.save = function(csrf_token) {
        alert($scope.transaction.item_id);
        $.ajaxSetup({
            headers: {
                'X-XSRF-Token': csrf_token
            }
        });
        //alert($scope.kebutuhan.kebutuhan_pendidikan[0]);
        var url = API_URL;
        //alert($scope.kebutuhan.kebutuhan_pendidikan);

        var data = $.param({
            'item_id'       : $scope.transaction.item_id,
            'nomor'         : $scope.transaction.nomor,
            'price'         : $scope.transaction.price
        });

        $http({
            method: 'POST',
            url: url,
            data: data,
            headers: {'Content-Type': 'application/x-www-form-urlencoded',}
        }).success(function(response) {
            $('#confirmModal').modal('hide');
            console.log(response);
            if(response == 1){
                $('#successModal').modal({
                    backdrop: 'static',
                    keyboard: false
                })
                $('#successModal').on('hidden.bs.modal', function () {
                    location.reload();
                })
                $('#successModal').modal('show');
            } else {
                $scope.error = response;
            }
        }).error(function(response) {
            console.log(response);
        });
    }

    $scope.confirm = function() {
        $('#confirmModal').modal('show');
    }

    $scope.ok = function() {
        window.location="/merchant/transaksi";
    }
});
