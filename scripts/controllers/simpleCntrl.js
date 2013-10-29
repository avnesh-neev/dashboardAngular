demoApp.controller("SimpleController", function ($scope){
    $scope.isActive = function (viewLocation) { 
        return viewLocation === $location.path();
    };
});