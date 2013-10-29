var demoApp = angular.module("demoApp", []);

demoApp.config(function ($routeProvider){
    $routeProvider
    .when('/login',
    {
        controller: 'SimpleController',
        templateUrl: 'login.php'
    })
    .when('/about',
    {
        controller: 'SimpleController',
        templateUrl: 'about.php'
    })
    .when('/contact',
    {
        controller: 'SimpleController',
        templateUrl: 'contact.php'
    })
    .otherwise( {redirectTo: '/login'} );
    }
);