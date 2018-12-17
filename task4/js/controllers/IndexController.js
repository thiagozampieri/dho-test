// public/js/controllers/IndexController.js
app.controller('IndexController',
    function ($scope, Task) {

        $scope.contanier = new Task();
        $scope.contaniers = [];
        $scope.list = function () {
            $scope.contaniers = [];
            Task.query({}, function(contaniers) {
                if (contaniers) $scope.contaniers = contaniers;
            });
        };

        $scope.add = function () {
            $scope.contanier.$save(function (response) {
                console.log(response);
                if (response && response.created == true) {
                    $scope.list();
                    $scope.contanier = new Task();
                }
            });
        };

        $scope.update = function(model) {
            console.log(model);
            Task.put(model, function(response) {
                console.log(response);
                $scope.list();
            });
        }

        $scope.remove = function(id) {
            Task.remove({id: id}, function(response) {
                console.log(response);
                if (response && response.removed == true) {
                    $scope.list();
                }
            })
        }

        $scope.updateAll = function(){
            var arr = [];
            $scope.contaniers.forEach(function(item, index) {
                arr.push({
                    id: item.id,
                    title: item.title,
                    description: item.description,
                    position: (index+1),
                });
            });

            Task.saveAs(arr, function(response) {
                console.log(response);
                $scope.list();
            })
        }

        $scope.list();

        $scope.sortableOptions = {
            update: function(e, ui) {
                setTimeout(function () { $scope.updateAll(); }, 1000);
            },
            'ui-floating': true
        };

    }
);
