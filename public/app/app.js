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

var appRegMerchant = angular.module('RegMerchantRecords', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
    .constant('API_URL', 'http://localhost:8000/merchant/register/')
    .config(function($locationProvider){
        $locationProvider.html5Mode({
            enabled: true,
            requireBase: false
        })
    });

var appLoginMerchant = angular.module('LoginMerchantRecords', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
    .constant('API_URL', 'http://localhost:8000/merchant/login/')
    .config(function($locationProvider){
        $locationProvider.html5Mode({
            enabled: true,
            requireBase: false
        })
    });

var appDoTransaction = angular.module('DoTransactionRecords', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
    .constant('API_URL', 'http://localhost:8000/merchant/transaksi/do/')
    .config(function($locationProvider){
        $locationProvider.html5Mode({
            enabled: true,
            requireBase: false
        })
    });