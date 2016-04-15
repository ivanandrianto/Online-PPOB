

appJenisItem.controller('JenisItemController', function($scope, $location, $http, API_URL) {

    $scope.hasSelections_list = [
        {"value":"1","name":"Ya"},
        {"value":"0","name":"Tidak"}
    ];

    $http.get(API_URL + "getAll/")
    .success(function(response) {
        $scope.jenisitems = response;
    });

    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;
        $scope.frmJenisItem.$setUntouched();
        $scope.error = "";
        switch (modalstate) {
            case 'add':
                $scope.form_title = "Tambah jenisitem baru";
                $scope.jenisitem = "";
                break;
            case 'edit':
                $scope.form_title = "Edit jenisitem";
                $scope.id = id;
                $http.get(API_URL + 'get/' + id)
                        .success(function(response) {
                            $scope.jenisitem = response;
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
            'jenis'             : $scope.jenisitem.jenis,
            'hasSelections'     : $scope.jenisitem.hasSelections,
            'title'             : $scope.jenisitem.title,
            'message'           : $scope.jenisitem.message
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
                    alert("Tidak dapat menghapus jenisitem");
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
