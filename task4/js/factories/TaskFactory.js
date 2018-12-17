app.factory('Task',
    function ($resource) {
        return $resource('/dho-test/task4/api/todolist/:id', {id: '@id'}, {
            'get': {method: 'GET'},
            'save': {method: 'POST'},
            'put': {method: 'PUT'},
            'saveAs': {method: 'POST', isArray: true},
            'query': {method: 'GET', isArray: true},
            'remove': {method: 'DELETE'},
            'delete': {method: 'DELETE'}
        });
    }
);







