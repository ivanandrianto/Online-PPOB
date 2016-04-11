

appItem.controller('ItemController', function($scope, $location, $http, API_URL,API_URL_JENIS) {

    
    $http.get(API_URL + "getAll/")
    .success(function(response) {
        $scope.items = response;
    });

    $http.get(API_URL_JENIS + "getAll/")
    .success(function(response) {
        $scope.jenisitems = response;
    });

    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;
        $scope.frmItem.$setUntouched();
        $scope.error = "";
        switch (modalstate) {
            case 'add':
                $scope.form_title = "Tambah Item baru";
                $scope.item = "";
                break;
            case 'edit':
                $scope.form_title = "Edit Item";
                $scope.id = id;
                $http.get(API_URL + 'get/' + id)
                        .success(function(response) {
                            $scope.item = response;
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
            'nama'      : $scope.item.nama,
            'jenis'     : $scope.item.jenis,
            'harga'     : $scope.item.harga
        });

        if (modalstate === 'add'){
            url += "add/";
        } if (modalstate === 'edit'){
            url += "edit/" + id;
        }

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

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Apakah Anda yakin ingin menghapus record ini?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'delete/' + id
            }).success(function(response) {
                if(response == 1){
                    location.reload();
                } else {
                    alert("Tidak dapat menghapus Item");
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
