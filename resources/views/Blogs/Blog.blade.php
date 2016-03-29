@extends('Layout.Layout')
@section('content')
<script>
app.controller('BlogController',function($scope,$http){
    $scope.user;
    $scope.user_returned;
    
    $scope.submit = function(){
        $http.post("{{ action('BlogController@store') }}",$scope.user)
        .then(function(response){
              $scope.user_returned = response.data;
        });
    }
});
</script>

<div ng-controller="BlogController" >
    <div class="col-md-12">
    <form ng-submit="submit()">  
    <input type="hidden" name="method" value="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    First Name: <input type="text"name="firstName" ng-model="user.firstName"><br>
    Last Name: <input type="text" name="lastName" ng-model="user.lastName"><br>
<br>
<input type="submit"><br>
    </form>
    </div>
    <div ng-if="user_returned == null">Submitting..</div>
    
<div class="col-md-12"> 
    
    @{{user_returned}}
</div>
</div>
@stop