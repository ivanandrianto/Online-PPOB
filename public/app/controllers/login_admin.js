


appLoginAdmin.controller('LoginAdminController', function($scope, $location, $http, API_URL) {    
    
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
            'email'         : $scope.admin.email,
            'password'      : $scope.admin.password
        });

        $http({
            method: 'POST',
            url: url,
            data: data,
            headers: {'Content-Type': 'application/x-www-form-urlencoded',}
        }).success(function(response) {
            console.log(response);
            if(response == 1){
                window.location = '/admin/dashbaord';
            } else {
                $scope.error = response;
            }
        }).error(function(response) {
            console.log(response);
        });
    }
});
