var base_url = 'http://api.todo.dev';

/** NOTE **/
/** We may want to consider using RESTangular for future project due to its more friendly and complete interface to HTTP **/

/**
 * Users Factory	
 * @param  $resource module
 * @return Users $resource
 */
app.factory('User', ['$resource', function ($resource) {
	return $resource(base_url + '/users/:id/:resource', { id: '@id' }, {
		update: {
			method: 'PUT'
		}
	});
}]);

/**
 * Task Factory
 * @param  $resource module
 * @return Tasks $resource
 */
app.factory('Task', ['$resource', function ($resource) {
	return $resource(base_url + '/tasks/:id/:resource', { id: '@id'}, {
		update: {
			method: 'PUT'
		}
	});
}]);

/**
 * Task Group Factory
 * @param  $resource module
 * @return Task Group $resource
 */
app.factory('TaskGroup', ['$resource', function ($resource) {
	return $resource(base_url + '/task-groups/:id', { id: '@id' }, {
		update: {
			method: 'PUT'
		}
	});
}]);

/**
 * Tag Factory
 * @param  $resource module
 * @return Tag $resource
 */
app.factory('Tag', ['$resource', function ($resource) {
	return $resource(base_url + '/tags/:id', { id: '@id' }, {
		update: {
			method: 'PUT'
		}
	});
}]);

/**
 * Comment Factory
 * @param  $resource module
 * @return Comment $resource
 */
app.factory('Comment', ['$resource', function ($resource) {
	return $resource(base_url + '/comments/:id', { id: '@id' });
}]);