angular.module('app').factory('authorAPI', function($http, API_URL){
	
	var _getAuthors = function(){
		return $http.get(API_URL + 'authors');
	};
	var _saveAuthor = function(author){
		return $http.post(API_URL + 'author/add', author);
	};

	return {
		getAuthors : _getAuthors,
		saveAuthor : _saveAuthor
	}
});