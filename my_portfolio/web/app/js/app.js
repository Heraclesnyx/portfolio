const app = angular.module('app', ['ngRoute']);

app.config(['$httpProvider', function($httpProvider) {
    $httpProvider.defaults.withCredentials = false;
}]);

app.config(function($routeProvider) {
	$routeProvider.when('/', {
		templateUrl: 'app/js/templates/projets.html',
		controller: 'mainController'
	});
});

app.controller('mainController', function($scope) {
    // create a message to display in our view
    // $scope.texte = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sem mauris, feugiat in nisi eget, posuere mattis turpis. Aliquam quis sapien lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam volutpat in sapien ut faucibus. Phasellus turpis nibh, semper dapibus felis sed, iaculis dignissim elit. Phasellus eget quam eu erat sagittis pellentesque non at nibh. Integer porttitor dui sapien, ac vestibulum quam tincidunt in. Pellentesque congue libero non volutpat ultricies.';
});


// app.controller('projetController', function($scope){
// 	$scope.texte = "I'm here, hello world";	
// });