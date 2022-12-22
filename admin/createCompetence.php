<?php
/* Il faut créer un utilisateur avec le rôle admin dans la bdd pour avoir un administrateur du back-office.
Pour cela on créé un formulaire pour renseigner la bdd.
Au niveau du CRUD nous allons faire un create avec l'instruction ** SQL INSERT INTO **
*/
include("../assets/inc/headBack.php");

if ($_SESSION["role"] == null || $_SESSION["role"] != 1) {
    // on envoie un message d'alerte
    $_SESSION["message"] = "Vous n'avez pas l'autorisation pour accéder à cette partie du site.";
    header('Location: http://localhost/la_manu/sitePhpProcedural/index.php');
    exit;
}
?>
<title>Ajout competence</title>
<?php
include("../assets/inc/headerBack.php");
?>
<main class="container">
    <div class="row my-3">
        <h3 class="text-warning">Créer une compétence</h3>
        <div class="col-4 form-group">
            <form action="" method="post">
            <input type="hidden" name="faire" value="create-competence"> 
            <select class="form-select" name="type">
                <option value="1" selected>Front-end</option>
                <option value="2" selected>Back-end</option>
            </select>
                <input type="text" class="form-control mt-3" name="titre" placeholder="Nom de la compétence">
                <input type="text" class="form-control mt-3" name="texte" placeholder="Description de la compétence">
                <label class="form-label text-white mt-3" for="image">Ajoutez une image</label>
                <input type="file" class="form-control mt-1" name="image">
                <input type="text" class="form-control mt-3" name="lien" placeholder="Ajoutez un lien">
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" value="1" name="active"></input>
                    <label class="form-check-label text-light" for="active">Afficher en front</label>
                </div>
                <button type="submit" name="submit" class="btn btn-outline-warning mt-3">Enregistrer</button>
            </form>
            <?php
            // on récupère le fichier de connexion
            // require("../core/connexion.php");
            // 1 - Récupération des données et formatage
            /* une condition pour recupérer les données transmises par le formulaire et formater correctement le texte
            addslashes() rajoute un \ pour échapper les caractères spéciaux dans la saisie
           

            if (isset($_POST["submit"])) {
                $nom = addslashes(trim(ucfirst($_POST["nom"])));
                $prenom = addslashes(trim(ucfirst($_POST["prenom"])));
                // strtolower permet de tout mettre en minuscules
                $email = trim(strtolower($_POST["email"]));
                // encodage du mot de passe
                $options = ['cost' => 12];
                $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT, $options);
                if (isset($_POST["role"])) {
                    $role = true;
                } else {
                    $role = false;
                }


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
                if ($role == true) {
                    $_SESSION["message"] = "L'administrateur $prenom $nom est bien enregistré dans la base de données.";

                } else {

                    $_SESSION["message"] = "L'utilisateur $prenom $nom est bien enregistré dans la base de données.";
                }

                // 5 - Redirection vers la page d'accueil
                header('Location: http://localhost/la_manu/sitePhpProcedural/admin/accueilAdmin.php');
            }
            */
            ?>
        </div>
    </div>
</main>
<?php
include("../assets/inc/footerFront.php");
?>