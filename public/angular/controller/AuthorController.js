app.controller('AuthorController', function($scope, $http, API_URL, authorAPI)
	{

		authorAPI.getAuthors()
		.success(function(response)
		{
			$scope.authors = response;
		});

		$scope.toggle = function(modalstate) {
		  $scope.modalstate = modalstate;

		  if(modalstate === 'authors' || modalstate === 'edit')
		  {
		  	$('#authorModal').modal('show');
		  }
		}

		$scope.save = function() {

				authorAPI.saveAuthor($scope.author).success(function(response){
				if(response.success)
				{
					$('#authorMsg').html('<div class="alert alert-warning col-ssm-12" >' + response.success.message + '</div>');
					$('#authors').val(response.success.author_id); 
					$(function () {
					   $('#myModal').modal('toggle');
					});
				}
				
				authorAPI.getAuthors()
					.success(function(response)
						{
							$scope.authors = response;
							$(function () {
							   $('#authorModal').modal('toggle');
							});
						});				
			  		}).error(function(response){
						if(response.error)
						{
							$('#main').html('<div class="alert alert-danger col-ssm-12" >' + response.error + '</div>');

							$(function () {
						   		$('#authorModal').modal('toggle');
							});
						}				
				});
			}
	});