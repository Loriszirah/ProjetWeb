function verifInfo(){
	/*
	 * But: On vérifie que toutes les cases sont remplies
	 */
	 res=true;
   if(document.getElementById("nom").value==""){
		 alert("Veuilez indiquer votre nom");
		 res=false;
	 }
   if(document.getElementById("prenom").value==""){
		 alert("Veuilez indiquer votre prenom");
		 res=false;
	 }
   if(document.getElementById("email").value==""){
		 alert("Veuilez indiquer votre email");
		 res=false;
	 }
   if(document.getElementById("psoeudo").value==""){
		 alert("Veuilez indiquer votre psoeudo");
		 res=false;
	 }
   if(document.getElementById("age").value==""){
		 alert("Veuilez indiquer votre age");
		 res=false;
	 }
   if(document.getElementById("telephone").value==""){
		 alert("Veuilez indiquer votre numero de téléphone");
		 res=false;
	 }
   if(document.getElementById("ville").value==""){
		 alert("Veuilez indiquer votre ville");
		 res=false;
	 }
   if(document.getElementById("passwd").value==""){
		 alert("Veuilez indiquer un mot de passe");
		 res=false;
	 }
	 return res;
}

function verifPassword(){
  /*
   * But : On vérifie si les deux mots de passe sont indentiques
   */
   res=true;
   password1=document.getElementById("passwd").value;
   password2=document.getElementById("passwdconf").value
   if(password2!=password1){
     res=false;
   }
   return res;
}
