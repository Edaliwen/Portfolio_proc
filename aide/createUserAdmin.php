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
            <form action="" method = "post">
                <input type="text" class="form-control mt-3" name ="nom" placeholder="Votre nom">
                <input type="text" class="form-control mt-3" name ="prenom" placeholder="Votre prénom">
                <input type="text" class="form-control mt-3" name ="email" placeholder="Votre adresse email">
                <input type="text" class="form-control mt-3" name ="password" placeholder="Votre mot de passe">
                <button class="btn btn-outline-warning mt-3">Enregistrer</button>
            </form>
            <?php
                // on récupère le fichier de connexion
                require("../core/connexion.php");
                /* une condition pour recupérer les données transmises par le formulaire et formater correctement le texte
                addslashes() rajoute un \ pour échapper les caractères spéciaux dans la saisie
                */
                if (isset($_POST["soumettre"])){
                    $nom = addslashes(trim(ucfirst($_POST["nom"])));
                    $prenom = addslashes(trim(ucfirst($_POST["prenom"])));
                    // strtolower permet de tout mettre en minuscules
                    $email = trim(strtolower($_POST["email"]));
                    // encodage du mot de passe
                    $options = ['cost' => 12];
                    $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT, $options);
                    $role = 1;
                }
            ?>
        </div>
    </div>
</main>
<?php
    include("../assets/inc/footerFront.php");
?>