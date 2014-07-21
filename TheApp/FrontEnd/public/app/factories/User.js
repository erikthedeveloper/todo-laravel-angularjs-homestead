var app = angular.module('todoApp');

var base_url = 'http://api.todo.dev';

/**
 * Users Factory	
 * @param  $resource module
 * @return Users $resource
 */
app.factory('User', ['$resource', function ($resource) {
	return $resource(base_url + '/users/:id', { id: '@id' });
}]);