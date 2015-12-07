<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="UTF-8">
    <title>Lista de programas</title>
    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/angular.min.js') }}
    {{ HTML::script('js/programaController.js') }}

    {{ HTML::style('css/bootstrap.min.css') }}

</head>
<body ng-controller="programasController">
    <li>
        <a href="{{ url('images/listarfiles') }}">
            <i class="fa fa-folder-open"></i>Ver archivos
        </a>
    </li>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Aqui estan tus archivos /%userName%/</h3>
                </div>
                Buscador:
                <input type="text" ng-model="palabra" placeholder="Busca programa"/>
                <div class="panel-body">
                    <ul class="list-group">
                        <div ng-repeat="file in files | filter:palabra"/>
                            <div class="row">
                                <div class="col-md-6">
                                    <li class="list-group-item">
                                        <span class="badge"> /%file.tamano|number %/ KB </span>
                                        /%file.clientOriginalName%/
                                    </li>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" ng-click="getId(file.id)" class="btn btn-success"><span class="glyphicon glyphicon-play" aria-hidden="true"></span></button>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container" ng-show="status==0">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Terminal : /%path%/</h3>
                </div>
                <div class="panel-body" style="...">
                    <div class="alert alert-success" role="alert">
                        /% msg %/
                    </div>
                    <div ng-bind-html="lines"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>