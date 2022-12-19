<?php
/* Il faut créer un utilisateur avec le rôle admin dans la bdd pour avoir un administrateur du back-office.
    Pour cela on créé un formulaire pour renseigner la bdd.
    Au niveau du CRUD nous allons faire un create avec l'instruction ** SQL INSERT INTO **
    */
include("../assets/inc/headFront.php");
?>
<title>Création de l'utilisateur Admin</title>
<?php
include("../assets/inc/headerFront.php");
?>
<main class="container">
    <div class="row">
        <h3 class="text-warning">Admin</h3>
        <div class="col-4 form-group">
            <form action="" method="post">
                <input type="text" class="form-control mt-3" name="nom" placeholder="Votre nom">
                <input type="text" class="form-control mt-3" name="prenom" placeholder="Votre prénom">
                <input type="text" class="form-control mt-3" name="email" placeholder="Votre adresse email">
                <input type="text" class="form-control mt-3" name="password" placeholder="Votre mot de passe">
                <button type="submit" name="submit" class="btn btn-outline-warning mt-3">Enregistrer</button>
            </form>
            <?php
            // on récupère le fichier de connexion
            require("../core/connexion.php");
            // 1 - Récupération des données et formatage
            /* une condition pour recupérer les données transmises par le formulaire et formater correctement le texte
                addslashes() rajoute un \ pour échapper les caractères spéciaux dans la saisie
                */

            var_dump($_POST);
            if (isset($_POST["submit"])) {
                $nom = addslashes(trim(ucfirst($_POST["nom"])));
                $prenom = addslashes(trim(ucfirst($_POST["prenom"])));
                // strtolower permet de tout mettre en minuscules
                $email = trim(strtolower($_POST["email"]));
                // encodage du mot de passe
                $options = ['cost' => 12];
                $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT, $options);
                $role = 1;

                // 2 - Préparation de l'instruction SQL
                $sql = " INSERT INTO table_user (
                                                    nom,
                                                    prenom, 
                                                    email,
                                                    password,
                                                    role
                                                )
                            VALUE (
                                        '$nom',
                                        '$prenom',
                                        '$email',
                                        '$password',
                                        '$role'
                                    )";

                // 3 - Exécution de la requête avec les paramètres de connexion
                mysqli_query($connexion, $sql) or die(mysqli_error($connexion));

                // 4 - Message
                $_SESSION["message"] = "Administrateur $prenom $nom bien enregistré dans la base de données.";

                // 5 - Redirection vers la page d'accueil
                header('Location: http://localhost/la_manu/sitePhpProcedural/index.php');
            }
            ?>
        </div>
    </div>
</main>
<?php
include("../assets/inc/footerFront.php");
?>