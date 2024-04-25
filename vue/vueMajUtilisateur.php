 <!DOCTYPE HTML5>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Modifier les informations de l'utilisateur</title>
        <link rel="stylesheet" href="../css/ajouterUtilisateur.css">
        <link rel="stylesheet" href="../css/navbar.css">
    </head>
    <body>
        <nav class="navbar">
            <p>Panel D'administration</p>
        </nav>
        <section class="inscription">
            <div class="wrapper2">
                <form class="register" action="majUtilisateur.php" method="post">
                    <h1>Modifier les informations de l'utilisateur</h1>
                    
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
                    <div class="input-box">
                        <label for="username">
                            <p class="nom">Nom d'utilisateur:</p>
                        </label>
                        <input
                            type="text"
                            id="username"
                            name="username"
                            class="input-field"
                            required
                            placeholder="Nom d'utilisateur"
                            value="<?php echo htmlspecialchars($user['username']); ?>"

                        />
                    </div>
                    
                    <div class="input-box">
                        <label for="firstName">
                            <p class="nom">Prénom:</p>
                        </label>
                        <input
                            type="text"
                            id="firstName"
                            name="firstName"
                            class="input-field"
                            required
                            placeholder="Prénom"
                            value="<?php echo htmlspecialchars($user['firstName']); ?>"
                        />
                    </div>
                    
                    <div class="input-box">
                        <label for="lastName">
                            <p class="nom">Nom:</p>
                        </label>
                        <input
                            type="text"
                            id="lastName"
                            name="lastName"
                            class="input-field"
                            required
                            placeholder="Nom de famille"
                            value="<?php echo htmlspecialchars($user['lastName']); ?>"
                        />
                    </div>

                    <div class="input-box">
                        <label for="phoneNumber">
                            <p class="nom">Téléphone:</p>
                        </label>
                        <input
                            type="text"
                            id="phoneNumber"
                            name="phoneNumber"
                            class="input-field"
                            required
                            placeholder="Téléphone"
                            value="<?php echo htmlspecialchars($user['phoneNumber']); ?>"
                        />
                    </div>

                    <div class="input-box">
                        <label for="address">
                            <p class="nom">Adresse:</p>
                        </label>
                        <input
                            type="text"
                            id="address"
                            name="address"
                            class="input-field"
                            required
                            placeholder="Adresse"
                            value="<?php echo htmlspecialchars($user['address']); ?>"
                        />
                    </div>

                    <div class="input-box">
                        <label for="postalCode">
                            <p class="nom">Code postal:</p>
                        </label>
                        <input
                            type="text"
                            id="postalCode"
                            name="postalCode"
                            class="input-field"
                            required
                            placeholder="Code postal"
                            value="<?php echo htmlspecialchars($user['postalCode']); ?>"
                        />
                    </div>

                    <button type="submit" class="btn">Modifier les informations</button>
                </form>
            </div>
        </section>
    </body>
</html>