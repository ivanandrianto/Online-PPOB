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

var appJenisItem = angular.module('JenisItemRecords', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
    .constant('API_URL', 'http://localhost:8000/api/v1/jenisitem/')
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
    .constant('API_URL_JENIS', 'http://localhost:8000/api/v1/jenisitem/')
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

var appPermohonan = angular.module('PermohonanRecords', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
    .constant('API_URL', 'http://localhost:8000/api/v1/permohonan/')
    .config(function($locationProvider){
        $locationProvider.html5Mode({
            enabled: true,
            requireBase: false
        })
    });

var appMyMerchant = angular.module('MyMerchantRecords', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
    .constant('API_URL', 'http://localhost:8000/api/v1/my-merchant/')
    .config(function($locationProvider){
        $locationProvider.html5Mode({
            enabled: true,
            requireBase: false
        })
    });

var appLoginAdmin = angular.module('LoginAdminRecords', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
    .constant('API_URL', 'http://localhost:8000/admin/login/')
    .config(function($locationProvider){
        $locationProvider.html5Mode({
            enabled: true,
            requireBase: false
        })
    });

