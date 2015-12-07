var app=angular.module('app',[]);

app.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('/%');
    $interpolateProvider.endSymbol('%/');
});

app.controller('programasController',function($scope,$http,$sce) {
    $http.get('listarfilesangular').success(function(data) {
        $scope.files = data.files;
        $scope.userName = data.userName;
    });

    $scope.getId=function(idFile){
        $http.post("runfileangular",{'fileId':idFile}).
            success(function(dataResponse){

            $scope.msg=dataResponse.msg;
            $scope.path=dataResponse.path;
            $scope.status=dataResponse.status;

            var i=1;
            var lineas="";
            for (line in dataResponse.resultado){
                lineas+='<code>'+i++ +'.- '+'</code>'+'<code>'+dataResponse.resultado[line] +'</code><br>';
            }
            $scope.lines=$sce.trustAsHtml(lineas);
        }).
            error(function(dataResponse) {
                console.log("algo malo");
            
        });
    }
});