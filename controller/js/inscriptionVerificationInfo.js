function verifInfo(){
	/*
	 * But: On vérifie que toutes les cases sont remplies
	 */
   res=true;
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
     document.getElementById("passwdconf").focus();
   }
   return res;
}
