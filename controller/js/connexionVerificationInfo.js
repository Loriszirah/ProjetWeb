function verifInfo(){
	/*
	 * But: On vérifie que toutes les cases sont remplies
	 */
	 res=true;
   if(document.getElementById("email").value==""){
		 alert("Vous ne pouvez pas rentrer un email vide pour vous connecter");
		 res=false;
	 }
   if(document.getElementById("passwd").value==""){
		 alert("Vous ne pouvez pas rentrer un mot de passe vide pour vous connecter");
		 res=false;
	 }

	 return res;
}
