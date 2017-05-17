angular.module("app").controller("testController", function()
{
	$scope.equipes = equipesFactory.getEquipes();

	$scope.addEquipe=function(equipe){
		equipesFactory.addEquipe(equipe);
		$scope.newEquipe.nom='';
		$scope.newEquipe.capitaine='';
	}
});