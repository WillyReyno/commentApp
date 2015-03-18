angular.module('mainCtrl', [])

    // Injecte le service Comment dans le controller
    .controller('mainController', function($scope, $http, Comment) {

        // L'objet qui contiendra toutes les données du formulaire de commentaire
        $scope.commentData = {};

        // Variable qui permettra d'afficher l'icône de chargement
        $scope.loading = true;

        // Fonction créée dans le Service
        Comment.get()
            .success(function(data){
                // Récupère tous les commentaires et les attache à $scope.comments
                $scope.comments = data;
                $scope.loading = false;
            });

        // Fonction qui gère l'envoi du formulaire
        $scope.submitComment = function() {
            $scope.loading = true;

            // Enregistre le commentaire, prend en paramètre les données du commentaire du formulaire
            // Fonction créée dans le Service
            Comment.save($scope.commentData)
                .success(function(data){
                    // Si ça marche, on rafraichit la liste des commentaires
                    Comment.get()
                        .success(function(getData) {
                            $scope.comments = getData;
                            $scope.loading = false;
                        });
                })
                .error(function(data){
                    console.log(data);
                });
        };

        // Fonction qui gère la suppression de commentaires
        $scope.deleteComment = function(id) {
            $scope.loading = true;

            // Fonction créée dans le Service
            Comment.destroy(id)
                .success(function(data) {
                    Comment.get()
                        .success(function(getData) {
                            $scope.comments = getData;
                            $scope.loading = false;
                        });
                });
        };
    });