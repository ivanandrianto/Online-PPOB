var appMerchant = angular.module('MerchantRecords', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
	.constant('API_URL', 'http://localhost:8000/api/v1/merchant/')
    .config(function($locationProvider){
        $locationProvider.html5Mode({
            enabled: true,
            requireBase: false
        })
    });

var appItem = angular.module('ItemRecords', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
    .constant('API_URL', 'http://localhost:8000/api/v1/item/')
    .config(function($locationProvider){
        $locationProvider.html5Mode({
            enabled: true,
            requireBase: false
        })
    });