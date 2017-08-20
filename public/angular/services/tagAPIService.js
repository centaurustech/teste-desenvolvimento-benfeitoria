angular.module('app').factory('tagAPI', function($http, API_URL){
	
	var _getTags = function(){
		return $http.get(API_URL + 'tags');
	};
	var _saveTag = function(tag){
		return $http.post(API_URL + 'tags/add', tag);
	};

	return {
		getTags : _getTags,
		saveTag : _saveTag
	}
});