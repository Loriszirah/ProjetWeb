var connexion = document.getElementById('connexionBoutton');

connexion.onclick = function(){
  if(document.getElementById('connexion').style.display == "none"){
    document.getElementById('connexion').style.display = "block";
    document.getElementById('inscription').style.display = "none";
  }
  else{
    document.getElementById('connexion').style.display = "none";
  }
}

var inscription = document.getElementById('inscriptionBoutton');

inscription.onclick = function(){
  if(document.getElementById('inscription').style.display == "none"){
    document.getElementById('inscription').style.display = "block";
    document.getElementById('connexion').style.display = "none";
  }
  else{
    document.getElementById('inscription').style.display = "none";
  }
}
