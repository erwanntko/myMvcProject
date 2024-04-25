<!DOCTYPE HTML5>

<html lang="fr">
    <head>
        <link rel="stylesheet" href="../css/accueil.css"/>
        <meta charset="utf-8"/>
        <title>Accueil</title>
    </head>
    <body>   
        <section class="Choix_utilisateur">
        
            <p class="texteAccroche">Partez dans des destinations à couper le souffle dans tout l'univers</p>

            <div class="row">

            <?php
            $counter = 0;

            foreach (array_map(null, $catalogueDirectorName, $catalogueDirectorFileNames) as [$name, $image]) {
                echo '<div class="column">';
                echo '<img src="' . htmlspecialchars($image['fileNameImages']) . '.jpg" alt="' . htmlspecialchars($name['name']) .'" class="pays">';
                echo '<p class="nom_pays">' . htmlspecialchars($name['name']) . '</p>';
                echo '</div>';

                $counter++;
                if ($counter >= 6) {
                    echo '</div>';
                    echo '<div class="row">';
                    $counter = 0;
                }
            }    
            ?>
        </section>

        <?php
        foreach ($catalogueParPays as $pays => $voyages) {
            echo "<section class='$pays' id='$pays'>"; 
            echo '<div style="margin-top: 20px;"></div>';
            echo '<h1>',$pays,'</h1>';

            foreach ($voyages as $voyage) {
                echo '<div class="description">';
                echo '<div class="Ville">';
                echo '<p class="titre">',htmlspecialchars($voyage['ville']),' - ',htmlspecialchars($voyage['accroche']),'</p>';
                echo  '<div class="gallery">','<img src="' . htmlspecialchars($voyage['racineImg1']) . '" alt="',htmlspecialchars($voyage['ville']),' de jour" />','<img src="' . htmlspecialchars($voyage['racineImg2']) . '" alt="',htmlspecialchars($voyage['ville']),' de nuit" />','</div>';
                echo '<p class="text_ville_1">',htmlspecialchars($voyage['textVille1']),'</p>','<p class="text_ville_2">',htmlspecialchars($voyage['textVille2']),'</p>','<p class="text_ville_3">',htmlspecialchars($voyage['textVille3']),'</p>';
                echo '<button class="reserverVolBtn" data-destination="', htmlspecialchars($voyage['pays']), ' - ', htmlspecialchars($voyage['ville']), '" data-prix="', htmlspecialchars($voyage['prix']), '" data-userId="', htmlspecialchars($_SESSION['user_id']), '">Réserver un vol</button>';
                echo '</div>','</div>';
                echo '<div style="margin-top: 10px"></div>';
                echo '</section>';
            }
        }
        ?>

        <script>
            //Récupère les prpiété avec data
            document.addEventListener('DOMContentLoaded', function() {
            var reserverVolBtns = document.querySelectorAll('.reserverVolBtn');
            
            reserverVolBtns.forEach(function(btn) {
                btn.addEventListener('click', function(event) {
                    var destination = event.target.getAttribute('data-destination');
                    var prix = parseFloat(event.target.getAttribute('data-prix'));
                    var userId = event.target.getAttribute('data-userId');
                    
                    ouvrirPageReservation(userId, destination, prix);
                });
            });
            });

            //Stock les propriété pour le panier
            function ouvrirPageReservation(userId, destination, prix) {
                if (userId) {
                    var volSelectionne = {
                        user_id: userId,
                        destination: destination,
                        prix: prix
                    };
                    
                    localStorage.setItem("volSelectionne", JSON.stringify(volSelectionne));
                    window.location.href = "controleur/panier.php";
                }
            }

            //Le slide bien mignon
            document.querySelectorAll('.pays').forEach(image => {
                image.addEventListener('click', () => {
            
                    const targetId = image.alt;
            
                    document.getElementById(targetId).scrollIntoView({
                    behavior: 'smooth'
                    });
                });
            });
        </script>
    </body>
</html>