

appMyMerchant.controller('MyMerchantController', function($scope, $location, $http, API_URL) {

    
    $http.get(API_URL + "get/")
    .success(function(response) {
        $scope.mymerchant = response;
    });

    //show modal form
    $scope.save = function(modalstate, id, csrf_token) {
        $scope.modalstate = modalstate;
        $scope.frmMyMerchant.$setUntouched();
        $scope.error = "";
        switch (modalstate) {
            case 'edit':
                $scope.form_title = "Edit MyMerchant";
                $scope.id = id;
                $http.get(API_URL + 'get/' + id)
                        .success(function(response) {
                            $scope.mymerchant = response;
                        });
                break;
            default:
                break;
        }
        $('#myModal').modal('show');
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id, csrf_token) {
        $.ajaxSetup({
            headers: {
                'X-XSRF-Token': csrf_token
            }
        });
        var url = API_URL;
        var _data = $.param({
            'nama'          : $scope.mymerchant.nama,
            'alamat'        : $scope.mymerchant.alamat,
            'telepon'       : $scope.mymerchant.telepon,
            'email'         : $scope.mymerchant.email
        });

        url += "edit/";

        $http({
            method: 'POST',
            url: url,
            data: _data,
            headers: {'Content-Type': 'application/x-www-form-urlencoded',}
        }).success(function(response) {
            if(response == 1){
                $('#myModal').modal('hide');
                if (modalstate === 'edit'){
                    $scope.successMessage = "Data berhasil diupdate";
                } else {
                    $scope.successMessage = "Data berhasil disimpan";
                }
                $('#successModal').modal({
                    backdrop: 'static',
                    keyboard: false  // to prevent closing with Esc button (if you want this too)
                })
                $('#successModal').on('hidden.bs.modal', function () {
                    location.reload();
                })
                $('#successModal').modal('show');
                //location.reload();
            } else {
                $scope.error = response;
            }
        }).error(function(response) {
            console.log(response);
            alert('Error');
        });
    }

    $scope.ok = function() {
        location.reload();
    }
});
