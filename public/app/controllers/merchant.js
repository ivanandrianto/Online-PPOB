

appMerchant.controller('MerchantController', function($scope, $location, $http, API_URL) {


    $http.get(API_URL + "getAll/")
    .success(function(response) {
        $scope.merchants = response;
    });

    //show modal form
    $scope.toggle = function(modalstate, nik) {
        $scope.modalstate = modalstate;
        $scope.frmMerchant.$setUntouched();
        $scope.error = "";
        switch (modalstate) {
            case 'edit':
                $scope.form_title = "Edit Merchant";
                $scope.nik = nik;
                $http.get(API_URL + 'get/' + nik)
                        .success(function(response) {
                            $scope.merchant = response;                            
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
        var data = $.param({
            '_token'        : csrf_token,
            'nama'          : $scope.merchant.nama,
            'lokasi'        : $scope.merchant.lokasi,     
            'telepon'       : $scope.merchant.telepon,
            'email'         : $scope.merchant.email,
            'status'        : $scope.merchant.status
        });

        if (modalstate === 'edit'){
            url += "edit/" + id;
        }
        alert(url);

        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.merchant),
            headers: {'Content-Type': 'application/x-www-form-urlencoded',}
        }).success(function(response) {
            alert(response);
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
            alert(response);
            console.log(response);
            alert('Error');
        });
    }

    $scope.ok = function() {
        location.reload();
    }

    //delete record
    $scope.confirmDelete = function(nik) {
        var isConfirmDelete = confirm('Apakah Anda yakin ingin menghapus record ini?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'delete/' + nik
            }).success(function(response) {
                if(response == 1){
                    location.reload();
                } else {
                    alert("Tidak dapat menghapus Merchant");
                }
            }).error(function(response) {
                console.log(response);
                alert('Error');
            });
        } else {
            return false;
        }
    }
});
