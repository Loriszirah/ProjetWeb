function verifPassword(){
  /*
   * But : On vérifie si les deux mots de passe sont indentiques
   */
   res=true;
   password1=document.getElementById("passwd").value;
   password2=document.getElementById("passwdconf").value
   if(password2!=password1){
     res=false;
     alert("Vos mots de passe ne correspondent pas");
     document.getElementById("passwdconf").focus();
   }
   return res;
}
