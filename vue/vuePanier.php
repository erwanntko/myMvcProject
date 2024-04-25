<!DOCTYPE html>

<html lang="fr">
    <head>
        <link rel="stylesheet" href="../css/panier.css"/>
        <meta charset="UTF-8" />
        <title>Panier</title>
    </head>
    <body>
        <h1 class="panier">Récapitulatif de votre panier</h1>
        
        <section class="resume"></section>
        <aside>
            <div class="tarification"></div>
        </aside>
        <script>

            //Récupère des valeurs pour le prix
            document.addEventListener('DOMContentLoaded', function() {
            var volSelectionneJSON = localStorage.getItem("volSelectionne");
            if (volSelectionneJSON) {
                var volSelectionne = JSON.parse(volSelectionneJSON);
                
                var destinationElement = document.getElementById('destinationElement');
                var nombreBilletsSelect = document.getElementById('nombreBillets');
                var prixTotalElement = document.getElementById('prixTotalElement');
                var tarificationElement = document.querySelector('.tarification');
                
                destinationElement.textContent = 'Destination : ' + volSelectionne.destination;

                var prixParBillet = volSelectionne.prix;
        
                // Calcule des montants requis et les affiches
                function calculerPrix() {

                    var nombreBillets = parseInt(nombreBilletsSelect.value);
                    var sousTotal = prixParBillet * nombreBillets;
                    var tva = sousTotal * 0.2;
                    var charge = 30.00;
                    var total = sousTotal + tva + charge;
                    
                    prixTotalElement.textContent = 'Prix total: ' + total.toFixed(2) + '€';
                    
                    tarificationElement.innerHTML = `
                        <p>${nombreBillets} billet(s) : ${sousTotal.toFixed(2)}€</p>
                        <p>20% TVA : ${tva.toFixed(2)}€</p>
                        <p>Charge : ${charge.toFixed(2)}€</p>
                        <p>Sous-total : ${total.toFixed(2)}€</p>`;
                }
            
                // Appelez la fonction pour calculer le prix total initial et afficher la tarification
                calculerPrix();
            
                //Permet de recalculer en direct le prix des billets si changement de quantité de billet
                nombreBilletsSelect.addEventListener('change', calculerPrix);
            }});

            // Force à toi cette requête marche pas
            function ajouterAuPanier() {
                var volSelectionneJSON = localStorage.getItem("volSelectionne");
                console.log('volSelectionneJSON:', volSelectionneJSON);
                                
                if (volSelectionneJSON) {
                    var volSelectionne = JSON.parse(volSelectionneJSON);
                    console.log('volSelectionne:', volSelectionne);

                    var reservationData = {
                        user_id: volSelectionne.user_id,
                                        ville: volSelectionne.destination,
                                        reservation_date: new Date().toISOString().split('T')[0]
                                    };
                                    console.log('reservationData:', reservationData);

                                    fetch('/controleur/panier.php', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify(reservationData)
                                    })
                                    .then(response => {
                                        if (response.ok) {
                                            alert('Réservation ajoutée avec succès');
                                        } else {
                                            
                                            console.error('Erreur HTTP:', response.statusText);
                                            alert('Erreur lors de l\'ajout de la réservation');
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Erreur:', error);
                                        alert('Erreur lors de l\'ajout de la réservation');
                                    });
                                }
                            }
        </script>

        <div class="reservationDetails" id="reservationDetails">
            <p id="destinationElement" class="destination"></p>
            <label class="quantite" for="nombreBillets">Quantité:</label>
            <select class="quantite" id="nombreBillets" onchange="calculerPrix()">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <p id="prixTotalElement" class="prixTotal"></p>
        </div>
        <button onclick="ajouterAuPanier()">Valider le panier</button>
    </body>
</html>