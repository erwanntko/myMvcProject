<!DOCTYPE HTML5>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Création de compte / Connexion</title>
        <link rel="stylesheet" href="../css/logister.css" />
        <link rel="stylesheet" href="../css/navbar.css" />
    </head>
    <body>
        <script>
            function selectRole(role) {
                // Réinitialiser tous les boutons
                document.querySelectorAll('.toggle-btn').forEach(btn => {
                    btn.classList.remove('selected');
                });
                // Sélectionner le bouton correspondant
                document.getElementById('role-' + role.toLowerCase()).classList.add('selected');
                // Mettre à jour le champ caché
                document.getElementById('role').value = role;
            }
        </script>
        <nav class="navbar">
            <p>Bienvenue sur Voyage.com</p>
        </nav>
        <h1 class="VOYAGE">VOYAGES.COM</h1>
        <section class="inscription">
            <div class="wrapper2">
                <form class="register" action="logister.php" method="post">
                    <input type="hidden" name="csrf_token" value="jeton_logister_inscription" />
                    <h1>Créer un compte</h1>
                    <div class="input-box">
                        <label for="username" placeholder="Nom d'utilisateur" required>
                        <p class="nom">Pseudo:</p>
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
                        <p class="nom">Mot de passe:</p>
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
                        <p class="nom">Prénom:</p>
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
                        <p class="nom">Nom:</p>
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
                        <p class="nom">Téléphone:</p>
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
                        <p class="nom">Adresse:</p>
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
                        <p class="nom">Code postal:</p>
                        </label>
                        <input
                        type="text"
                        id="postalCode"
                        name="postalCode"
                        class="input-field"
                        required
                        />
                    </div>
                    <div class="input-box">
                        <p class="nom">Rôle:</p>
                        <div class="toggle-buttons">
                            <button type="button" id="role-admin" class="toggle-btn" onclick="selectRole('Admin')">
                                Admin
                            </button>
                            <button type="button" id="role-user" class="toggle-btn" onclick="selectRole('User')">
                                User
                            </button>
                        </div>
                        <input type="hidden" name="role" id="role" required />
                    </div>
                    <button type="submit" class="btn">Créer un compte</button>
                </form>
            </div>
        </section>
        <aside>
            <div class="wrapper">
                <form class="register" action="logister.php" method="post">
                    <input type="hidden" name="csrf_token" value="jeton_logister_register" />
                    <h1>Qui êtes-vous?</h1>
                    <div class="input-box">
                    <label for="loginUsername" placeholder="Nom" required>
                    <p class="nom">Nom d'utilisateur:</p></label>
                    <input
                        type="text"
                        id="loginUsername"
                        name="loginUsername"
                        class="input-field"
                        required
                    />
                    </div>
                    <div class="input-box">
                    <label for="loginPassword" placeholder="Mot de passe" required
                        ><p class="nom">Mot de passe:</p></label>
                    <input
                        type="password"
                        id="loginPassword"
                        name="loginPassword"
                        class="input-field"
                        required
                    />
                    </div>
                    <div class="souvenir">
                        <div class="input1-box">
                            <input type="checkbox" class="input-checkbox" id="souvenir" />
                            <label for="souvenir">Se souvenir de moi</label>
                        </div>
                    </div>
                    <button type="submit" class="btn">Valider</button>
                    </div>
                </form>
            </div>
        </aside>
    </body>
</html>