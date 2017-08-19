app.controller('AdminController', function($scope, $http, API_URL, adminAPI)
	{
		$scope.pageSize = 5;
		$scope.currentPage = 1;
		adminAPI.getAdministradores()
		.success(function(response)
		{
			$scope.administradores = response;
		});
// show modal Form
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
	});