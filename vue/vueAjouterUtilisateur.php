<!DOCTYPE HTML5>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Création de compte / Connexion</title>
        <link rel="stylesheet" href="../css/ajouterUtilisateur.css" />
        <link rel="stylesheet" href="../css/navbar.css" />
    </head>
    <body>
        <nav class="navbar">
            <p>Panel D'administration</p>
        </nav>
        <section class="inscription">
            <div class="wrapper2">
                <form class="register" action="ajouterUtilisateur.php" method="post">
                <h1>Ajouter un utilisateur</h1>
                <div class="input-box">
                    <label for="username" placeholder="Nom d'utilisateur" required>
                    <p class="nom">Username :</p>
                    </label>
                    <input
                    type="text"
                    id="username"
                    name="username"
                    class="input-field"
                    required
                    />
                </div>
                <div class="input-box">
                    <label for="password" placeholder="Mot de passe" required>
                    <p class="nom">Mot de passe :</p>
                    </label>
                    <input
                    type="password"
                    id="password"
                    name="password"
                    class="input-field"
                    required
                    />
                </div>
                <div class="input-box">
                    <label for="firstName" placeholder="Prénom" required>
                    <p class="nom">Prénom :</p>
                    </label>
                    <input
                    type="text"
                    id="firstName"
                    name="firstName"
                    class="input-field"
                    required
                    />
                </div>
                <div class="input-box">
                    <label for="lastName" placeholder="Nom de famille" required>
                    <p class="nom">Nom :</p>
                    </label>
                    <input
                    type="text"
                    id="lastName"
                    name="lastName"
                    class="input-field"
                    required
                    />
                </div>
                <div class="input-box">
                    <label for="phoneNumber" placeholder="Numéro de téléphone" required>
                    <p class="nom">Téléphone :</p>
                    </label>
                    <input
                    type="text"
                    id="phoneNumber"
                    name="phoneNumber"
                    class="input-field"
                    required
                    />
                </div>
                <div class="input-box">
                    <label for="address" placeholder="Adresse" required>
                    <p class="nom">Adresse :</p>
                    </label>
                    <input
                    type="text"
                    id="address"
                    name="address"
                    class="input-field"
                    required
                    />
                </div>
                <div class="input-box">
                    <label for="postalCode" placeholder="Code postal" required>
                    <p class="nom">Code postal :</p>
                    </label>
                    <input
                    type="text"
                    id="postalCode"
                    name="postalCode"
                    class="input-field"
                    required
                    />
                </div>
                <button type="submit" class="btn">Créer un compte</button>
                </form>
            </div>
        </section>
    </body>
</html>