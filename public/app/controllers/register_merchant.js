

appRegMerchant.controller('RegMerchantController', function($scope, $location, $http, API_URL) {    
    $scope.error = "";
    $scope.save = function(csrf_token) {
        $.ajaxSetup({
            headers: {
                'X-XSRF-Token': csrf_token
            }
        });
        //alert($scope.kebutuhan.kebutuhan_pendidikan[0]);
        var url = API_URL;
        //alert($scope.kebutuhan.kebutuhan_pendidikan);

        var data = $.param({
            'nama'          : $scope.merchant.nama,
            'alamat'        : $scope.merchant.alamat,
            'telepon'       : $scope.merchant.telepon,
            'email'         : $scope.merchant.email,
            'password'      : $scope.merchant.password,
            'password2'     : $scope.merchant.password2
        });

        $http({
            method: 'POST',
            url: url,
            data: data,
            headers: {'Content-Type': 'application/x-www-form-urlencoded',}
        }).success(function(response) {
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

    $scope.ok = function() {
        window.location="/merchant/login";
    }
});
