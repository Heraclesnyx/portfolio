const app = angular.module('app', ['ngRoute']);

app.config(['$httpProvider', function($httpProvider) {
    $httpProvider.defaults.withCredentials = false;
}]);

app.config(function($routeProvider) {
	$routeProvider.when('/', {
		templateUrl: 'app/js/templates/presentation.html',
		controller: 'mainController'
	});
});

app.controller('mainController', function($scope) {
    // create a message to display in our view
    $scope.texte = 'Everyone come and see how good I look!';
});