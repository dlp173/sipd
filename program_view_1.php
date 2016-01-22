
  
  <div ng-app="app_pertamaku" ng-controller="ini_controller">
   
    <input type="text" ng-model="result">
    <ul> 
 <li ng-repeat="val in ini_datanya | filter:result" >
  {{val.idprogram}}
 {{val.idsatker}}
 {{val.namaprogram}}
  
 </li>
 <ul>
  </div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
  <script>
   var app=angular.module('app_pertamaku',[]);
   app.controller('ini_controller',function($scope,$http){
    $scope.ini_datanya=[];
    $http.get("<?php echo site_url('program/data');?>").success(function(result){
     $scope.ini_datanya=result;
    });
    
   });
  </script>
