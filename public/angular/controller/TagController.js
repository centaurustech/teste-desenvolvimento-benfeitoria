app.controller('TagController', function($scope, $http, API_URL, tagAPI)
	{
		$scope.pageSize = 5;
		$scope.currentPage = 1;
		tagAPI.getTags()
		.success(function(response)
		{
			$scope.tags = response;
		});

		$scope.toggle = function(modalstate) {
		  $scope.modalstate = modalstate;
		  switch(modalstate) {
 			case 'tags':
		    default:
		      break;
		  }
		  if(modalstate === 'tags' || modalstate === 'edit')
		  {
		  	$('#tagModal').modal('show');
		  }
		}

		$scope.save = function() {

				tagAPI.saveTag($scope.tag).success(function(response){
				if(response.success)
				{
					$('#tagMsg').html('<div class="alert alert-warning col-ssm-12" >' + response.success.message + '</div>');
					$('#tags').val(response.success.tag_id); 
					$(function () {
					   $('#myModal').modal('toggle');
					});
				}
				
				tagAPI.getTags()
					.success(function(response)
						{
							$scope.tags = response;
							$(function () {
							   $('#tagModal').modal('toggle');
							});
						});				
			  		}).error(function(response){
						if(response.error)
						{
							$('#main').html('<div class="alert alert-danger col-ssm-12" >' + response.error + '</div>');

							$(function () {
						   		$('#tagModal').modal('toggle');
							});
						}				
				});
			}
	});