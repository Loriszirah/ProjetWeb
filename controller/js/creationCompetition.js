function verifDateValide(){
	/*
	 * But: On vérifie que la date est 5 jours après la date actuelle
	 */
	 res=true;
   date=document.getElementById("dateDebut").value;
   var arrayOfStrings = date.split('-');
   var dateVoulue=new Date(arrayOfStrings[0],arrayOfStrings[1],arrayOfStrings[2]);
   var dateActuelle=new Date();
   var tempsEcoule = dateVoulue.getTime()-dateActuelle.getTime();//en millisecondes
   if((tempsEcoule/(1000*60*60*24))<5){
	     alert("Vous ne pouvez pas rentrer une date de début de compétition inférieure à 5 jours à compter de la date actuelle");
	     res=false;
	 }
	 return res;
}
