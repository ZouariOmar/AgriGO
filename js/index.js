
//flag pour connaitre le thème courant du site.
var themeCourant = "DARK";
//Les différents éléments HTML à affecter par le changement du thème du site.
var body = document.getElementById("corps");
var miniature = document.getElementById("miniature");
var panier = document.getElementById("panier");
var miniatures = document.querySelectorAll(".thumbnail");
var entetes = document.querySelectorAll("th");
var cellules = document.querySelectorAll("td");
var carte = document.getElementById("carte");

//Variables correspondants aux éléments img à animer
var animation1 = document.getElementById("animation1");
var animation2 = document.getElementById("animation2");
//Identifiant du timer
var id = null;
//Élément HTML qui, s'il existe (n'est pas null), indique que le panier est vide.
var vide = document.getElementById("vide");

if(vide !== null){
    //Ici, on est en présence d'un panier vide. On affiche alors une image
    document.getElementById("radin").style.display = "inline";
}
function validateQuantity(form) {
    const quantityInput = form.querySelector('input[name="quantite"]');
    const quantity = parseInt(quantityInput.value, 10);

    if (isNaN(quantity) || quantity === 0) {
        alert("Erreur : Le champ quantité est vide ou égal à zéro. Veuillez entrer une quantité valide.");
        quantityInput.focus(); // Met le focus sur le champ pour corriger la valeur.
        return false; // Empêche l'envoi du formulaire.
    }

    return true; // Permet l'envoi si la validation est réussie.
}

window.onload = () => {
    const totalElement = document.getElementById("total");
    const montant = parseFloat(totalElement.getAttribute("montant"));

    if (montant >= 100000) {
        alert("Wow. Un montant de plus de 100000 DT mérite un cadeau !");
    }
};


