<div class="containerProgressBar">
    <h5><span>H</span>tml</h5>
    <div class="progress_bar">
        <span id="progr" data-width=""></span>
    </div>
    <h5><span>C</span>ss</h5>
    <div class="progress_bar">
        <span id="progr1" data-width=""></span>
    </div>
    <h5><span>J</span>avascript</h5>
    <div class="progress_bar">
        <span id="progr2" data-width=""></span>
    </div>
</div>

<script>
    // Fonction pour calculer le pourcentage de lettres dans le contenu d'une balise <p>
    function calculerPourcentageLettres(idBaliseP) {
        // Récupérer le contenu de la balise <p>
        const paragraphe = document.getElementById(idBaliseP).textContent;

        // Supprimer les espaces et les caractères non alphabétiques du texte
        const texteSansEspaces = paragraphe.replace(/[^a-zA-Z]/g, '');

        // Calculer le nombre total de caractères alphabétiques
        const totalLettres = texteSansEspaces.length;

        // Calculer le pourcentage de lettres dans le paragraphe
        const pourcentageLettres = (totalLettres / paragraphe.length) * 100;

        // Retourner le pourcentage de lettres arrondi à deux décimales
        return pourcentageLettres.toFixed(2);
    }

    // Exemple d'utilisation avec l'ID de la balise <p>
    const pourcentage = calculerPourcentageLettres('myCopy1');
    const pourcentage1 = calculerPourcentageLettres('myCopy2');
    const pourcentage2 = calculerPourcentageLettres('myCopy3');
    document.getElementById('progr').innerHTML = pourcentage + '%';
    document.getElementById('progr1').innerHTML = pourcentage1 + '%';
    document.getElementById('progr2').innerHTML = pourcentage2 + '%';
</script>