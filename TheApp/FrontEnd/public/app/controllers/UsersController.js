var app = angular.module('todoApp');

app.controller('UsersController', function (User) {
	// Define our methods on a user
	this.users = [];
	this.user = null;

	this.getAll = function () {
		this.users = User.query(); // Query the users route for all users
	};

	this.getUser = function (user_id) {
		this.user = User.get({ id: user_id }); // Fetch a user by ID
	};

	this.getAll();
	this.getUser(2);
});