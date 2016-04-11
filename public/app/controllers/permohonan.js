

appPermohonan.controller('PermohonanController', function($scope, $location, $http, API_URL) {
    
    $http.get(API_URL + "getAll/")
    .success(function(response) {
        $scope.permohonans = response;
        console.log($scope.permohonans);
    });

    $scope.confirm = function(id,type) {
        $scope.approveReject= {};
        $scope.approveReject.id=id;
        $scope.approveReject.type=type;

        if($scope.approveReject.type == 1){
            $scope.approveReject.type_string = "Menerima";
        } else {
            $scope.approveReject.type_string = "Menolak";
        }
        $('#confirmModal').modal('show');
    }

    $scope.save = function(csrf_token) {
        $.ajaxSetup({
            headers: {
                'X-XSRF-Token': csrf_token
            }
        });
        var url = API_URL;
        url += "approveReject/" + $scope.approveReject.type + "/" + $scope.approveReject.id;

        $http({
            method: 'POST',
            url: url,
            data: '',
            headers: {'Content-Type': 'application/x-www-form-urlencoded',}
        }).success(function(response) {
            if(response == 1){
                $('#myModal').modal('hide');
                $scope.successMessage = "Data berhasil diupdate";
                $('#successModal').modal('show');
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

    $scope.changeStatus = function(csrf_token){
        if(!$scope.statusFilter){
            $http.get(API_URL + "getAll/")
            .success(function(response) {
                $scope.permohonans = response;
            });
        } else {
            $http.get(API_URL + "getAll/" + $scope.statusFilter)
            .success(function(response) {
                $scope.permohonans = response;
            });
        }
    }
});
