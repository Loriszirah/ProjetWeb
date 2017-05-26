function afficherNom(){
	/*
	 * But : Afficher les champs pour changer le nom de l'équipe
	 */

	document.getElementById("newNom").style.display="block";
	document.getElementById("modifierNom").style.display="none";

	return true;
}

function cacherNom(){
	/*
	 * But : Cacher les champs pour changer le nom de l'équipe
	 */

	document.getElementById("modifierNom").style.display="block";
	document.getElementById("newNom").style.display="none";

	return true;
}

function verifNom(){
	/*
	 * But: On vérifie que le nom n'est pas vide
	 */
	 res=true;
	 if(document.getElementById("nom").value==""){
		 alert("Vous ne pouvez pas rentrer un nom vide");
		 res=false;
	 }
	 return res;
}
