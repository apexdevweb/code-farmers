// Fonction pour calculer le pourcentage de lettres dans le contenu d'une balise <p>
function calculerPourcentageLettres(idBaliseCode) {
  // Récupérer le contenu de la balise <code>
  const paragraphe = document.getElementById(idBaliseCode).textContent;

  // Supprimer les espaces et les caractères non alphabétiques du texte
  const texteSansEspaces = paragraphe.replace(/[^a-zA-Z]/g, "");

  // Calculer le nombre total de caractères alphabétiques
  const totalLettres = texteSansEspaces.length;

  // Calculer le pourcentage de lettres dans le paragraphe
  const pourcentageLettres = (totalLettres / paragraphe.length) * 100;

  // Retourner le pourcentage de lettres arrondi à deux décimales
  return pourcentageLettres.toFixed(2);
}
// Exemple d'utilisation avec l'ID de la balise <code>
const pourcentage = calculerPourcentageLettres("myCopy1");
const pourcentage1 = calculerPourcentageLettres("myCopy2");
const pourcentage2 = calculerPourcentageLettres("myCopy3");

document.getElementById("codemeter1").innerHTML = pourcentage + "%";
document.getElementById("codemeter2").innerHTML = pourcentage1 + "%";
document.getElementById("codemeter3").innerHTML = pourcentage2 + "%";
