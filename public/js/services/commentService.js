angular.module('commentService', [])
    .factory('Comment', function($http) {
       return {

           // Récupère tous les commentaires
           get : function() {
               return $http.get('api/comments');
           },

           // Enregistre un commentaire (passe commentData en paramètre)
           save : function(commentData) {
               return $http({
                   method: 'POST',
                   url: 'api/comments',
                   headers: {'Content-Type' : 'application/x-www-form-urlencoded'},
                   data: $.param(commentData)
               });
           },

           // Détruit un commentaire
           destroy : function(id) {
               return $http.delete('api/comments/' + id);
           }
       }
    });
