<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Laravel + Angular Comment App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <style>
        body {
            padding-top:30px;
        }
        form {
            padding-bottom:20px;
        }
        .comment {
            padding-bottom:20px;
        }
    </style>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>

    <script src="js/controllers/mainCtrl.js"></script>
    <script src="js/services/commentService.js"></script>
    <script src="js/app.js"></script>
</head>
<body class="container" ng-app="commentApp">
<div ng-controller="mainController" class="col-md-8 col-md-offset-2">

    <div class="page-header">
        <h2>Laravel and Angular SPA</h2>
        <h4>Commenting System</h4>
    </div>

    <form ng-submit="submitComment()">
        <div class="form-group">
            <input type="text" class="form-control input-sm" name="author" ng-model="commentData.author" placeholder="name">
        </div>

        <div class="form-group">
            <input type="text" class="form-control input-lg" name="comment" ng-model="commentData.text" placeholder="Your text">
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>

    <p class="text-center" ng-show="loading">
        <span class="fa fa-meh-o fa-5x fa-spin"></span>
    </p>

    <div class="comment" ng-hide="loading" ng-repeat="comment in comments">
        <h3>Comment #{{ comment.id }} <small>by {{ comment.author }}</small></h3>
        <p>{{ comment.text }}</p>

        <p><a href="#" ng-click="deleteComment(comment.id)" class="text-muted">Delete</a></p>
    </div>

</div>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Willy
 * Date: 18/03/2015
 * Time: 22:16
 * To change this template use File | Settings | File Templates.
 */
 
 