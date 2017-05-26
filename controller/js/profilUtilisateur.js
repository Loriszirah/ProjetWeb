function afficherMdp(){
	/*
	 * But : Afficher les champs pour changer le mot de passe
	 */

	document.getElementById("new").style.display="block";
	document.getElementById("modifier").style.display="none";

	return true;
}

function cacherMdp(){
	/*
	 * But : Cacher les champs pour changer le mot de passe
	 */

	document.getElementById("modifier").style.display="block";
	document.getElementById("new").style.display="none";

	return true;
}

function verifmdp(){
	/*
	 * But: On vérifie que les deux mdps sont identiques
	 */
	res=true;
   password1=document.getElementById("passwd").value;
   password2=document.getElementById("futur").value
   if(password2!=password1){
     res=false;
     alert("Vos mots de passe ne correspondent pas");
     document.getElementById("futur").focus();
   }
   return res;
}