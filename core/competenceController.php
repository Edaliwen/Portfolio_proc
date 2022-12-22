<?php
session_start();
// On analyse ce qu'il y a à faire
$action = "empty";
// si la clé "execute" est détectée dans $_POST (avec la balise input type hidden)
if (isset($_POST["execute"])) {
    // notre variable action est égale à la valeur de la clé "execute"
    $action = $_POST["execute"];
}

// on utilise un switch pour vérifier l'action
switch ($action):
    // log-admin correspond à value="log-admin" dans l'input hidden du fichier admin/index.php
    case "log-admin":
        logAdmin();
        break;
    case "log-out":
        logOut();
        break;
    case "update-user":
        updateUser();
        break;
endswitch;

// les différentes fonctions de notre controller 

function logAdmin()
{
    // on a besoin de notre page connexion
    require("connexion.php");
    // vérification de l'email de l'admin qui est une valeur unique, préparation des données et formatage
    $login = trim(strtolower($_POST["login"]));
    // écriture SQL (Read du CRUD)
    $sql = "SELECT * FROM table_user WHERE email = '$login'";
    // exécution de la requête
    $query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
    // traitement des données
    // on vérifie que l'email existe avec la fonction mysqli_num_rows() qui compte le nombre de lignes retournées
    if (mysqli_num_rows($query) > 0) {
        // on met sous forme de tableau associatif les données de l'admin récupéré
        $user = mysqli_fetch_assoc($query);

        // ensuite il faut vérifier si le mot de passe saisi est égal à l'encodage stocké en bdd avec la fonction password_verify() qui nous renvoie true ou false
        if (password_verify(trim($_POST["password"]), $user["password"])) {
            // On vérifie le rôle dans la bdd
            if ($user["role"] != 1) {
                // on envoie un message d'alerte
                $_SESSION["message"] = "Vous n'êtes pas l'administrateur";
                header('Location: http://localhost/la_manu/sitePhpProcedural/admin/');
                exit;
            } else {
                // on créé plusieurs variables de session qui permettent un affichage personne et de sécuriser l'accès au back-office
                $_SESSION["prenom"] = $user["prenom"];
                $_SESSION["isLogged"] = true;
                $_SESSION["role"] = $user["role"];
                header('Location: http://localhost/la_manu/sitePhpProcedural/admin/accueilAdmin.php');
                exit;
            }
        } else {
            $_SESSION["message"] = "Erreur de mot de passe !!!";
            header('Location: http://localhost/la_manu/sitePhpProcedural/admin/');
            exit;
        }
    } else {
        $_SESSION["message"] = "Désolé, pas d'administrateur identifié";
        header('Location: http://localhost/la_manu/sitePhpProcedural/admin/');
        exit;
    }
}
function logOut()
{
    // pour déconnecter l'admin, il faut supprimer les variables de session
    // on détruit la session avec session_destroy()
    session_destroy();
    session_start();
    // message flash
    $_SESSION["message"] = "Vous êtes déconnecté !";
    // redirection vers page d'accueil du site
    header('Location: http://localhost/la_manu/sitePhpProcedural/admin/index.php');
    exit;
}
function updateUser()
{
    // Vérifier si les informations ont bien été envoyées
    if (!isset($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["password"], $_POST["role"], $_POST["id_user"])) {
        $_SESSION["message"] = "Merci de bien vouloir remplir tous les champs.";
        header('Location:../admin/updateUser.php?id=' . $_POST["id_user"]);
        exit;
    }

    // Récupération des infos envoyées par le formulaire
    $nom = ucfirst(trim($_POST["nom"]));
    $prenom = ucfirst(trim($_POST["prenom"]));
    $email = strtolower(trim($_POST["email"]));
    $pass = trim($_POST["password"]);
    $role = $_POST["role"];
    $id = $_POST["id_user"];

    // Validation des informations 
    if (strlen($nom) < 1 || strlen($nom) > 255) {
        $_SESSION["message"] = "Le nom doit avoir entre 1 et 255 caractères";
        header("Location:../admin/updateUser.php?id_user=" . $_POST["id_user"]);
        exit;
    }
    if (strlen($prenom) < 1 || strlen($prenom) > 255) {
        $_SESSION["message"] = "Le prénom doit avoir entre 1 et 255 caractères";
        header("Location:../admin/updateUser.php?id_user=" . $_POST["id_user"]);
        exit;
    }
    if (strlen($email) < 1 || strlen($email) > 255 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["message"] = "L'email est invalide";
        header("Location:../admin/updateUser.php?id_user=" . $_POST["id_user"]);
        exit;
    }
    if (strlen($pass) < 1) {
        $_SESSION["message"] = "Le mot de passe doit avoir au moins 1 caractère";
        header("Location:../admin/updateUser.php?id_user=" . $_POST["id_user"]);
        exit;
    }
    if ($role != 1 && $role != 0) {
        $_SESSION["message"] = "Le rôle est invalide";
        header("Location:../admin/updateUser.php?id_user=" . $_POST["id_user"]);
        exit;
    }
    // Encodage du mot de passe
    $options = ['cost' => 12];
    $pass = password_hash($pass, PASSWORD_DEFAULT, $options);

    // Les données sont validées, préparons-nous à les envoyer en base de données
    require("connexion.php");

    $sql = "UPDATE table_user
            SET 
                `nom`       = '$nom', 
                `prenom`    = '$prenom', 
                `email`     = '$email', 
                `role`      = $role, 
                `password`  = '$pass'
            WHERE `id_user` = $id
        ";
    echo '<pre>';
    var_dump($sql);
    echo '</pre>';
    // execution de la requète
    mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
    // message d'info
    $_SESSION["message"] = "Les données ont bien été mises à jour";
    // redirection vers la liste des utilisateur
    header('Location:../admin/listUsers.php');
    exit;
}
?>