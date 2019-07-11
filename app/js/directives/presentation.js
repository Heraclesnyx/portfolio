app.directive('presentation', function() {  
   return {
    restrict: 'E', 
    scope: { 
      info: '=' 
    }, 
    templateUrl: 'js/directives/presentation.html'
  }; 
});