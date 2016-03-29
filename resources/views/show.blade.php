dd($fullname);
@extends('Layout.Layout')
@section('content')
<script>
app.controller('BlogController',function($scope,$http){
   $http.get("http://localhost/Laravel/public/store")
  .success(function (response) {$scope.fullname = response.fullname;});
});
</script>
 

<ul>
  <li ng-repeat="x in fullname">
    {{ x.firstName + ', ' + x.lastName }}
  </li>
</ul>

 @stop