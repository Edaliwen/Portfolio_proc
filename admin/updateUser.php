<?php
include("../assets/inc/headBack.php");
if ($_SESSION["role"] == null || $_SESSION["role"] != 1) {
    // on envoie un message d'alerte
    $_SESSION["message"] = "Vous n'avez pas l'autorisation pour accéder à cette partie du site.";
    header('Location: http://localhost/la_manu/sitePhpProcedural/index.php');
    exit;
}

// Choix de l'id utilisateur à afficher
$id = $_GET["id_user"];
require("../core/connexion.php");

$sql = "SELECT `id_user`, `nom`, `prenom`, `email`, `password`, `role`
            FROM `table_user`
            WHERE `id_user` = $id
            ";

$query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
$user = mysqli_fetch_assoc($query);
?>
<title>Modification de l'utilisateur</title>
<?php
include("../assets/inc/headerBack.php");
?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <?php
            if (isset($_SESSION["message"])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $_SESSION["message"] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                // on efface la clé message une fois qu'elle a été affichée
                unset($_SESSION["message"]);
            }
            ?>
        </div>
        <div class="card text-center mt-5">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="true"
                            href="http://localhost/la_manu/sitePhpProcedural/admin/listUsers.php"><i
                                class="bi bi-chevron-double-left"> Retour à la liste</i></a>
                    </li>
                </ul>
            </div>
            <div class="card-header fs-3">
                <?= $user["prenom"] . " " . $user["nom"] ?>
            </div>
            <div class="card-body">
                <p class="card-text"><?= $user["email"] ?></p>
                <?php
                if ($user["role"] == true) {
                    echo '<p class="card-text">Administrateur</p>';
                } else {
                    echo '<p class="card-text">Utilisateur</p>';
                }
                ?>
                <p class="card-text"></p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="text-white mt-5">
            <h2>Modifier l'utilisateur</h2>
            <div class="form-group">
                <form method="POST" action="../core/userController.php">
                    <input type="hidden" name="id_user" id="id_user" value="<?= $user["id_user"] ?>">
                    <label for="nom">Nom :</label>
                    <input type="text" class="form-control mt-2" name="nom" id="nom" value="<?= $user["nom"] ?>">
                    <label for="prenom">Prénom :</label>
                    <input type="text" class="form-control mt-2" name="prenom" id="prenom"
                        value="<?= $user["prenom"] ?>">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control mt-2" name="email" id="email" value="<?= $user["email"] ?>">
                    <label for="password">Mot de passe :</label>
                    <input type="password" class="form-control mt-2" name="password" id="password">
                    <label for="role">Rôle :</label>
                    <select name="role" id="role" class="form-control mt-2">
                        <option value="0" <?php if ($user["role"] == 0) {
                            echo "selected";
                        } ?>>Utilisateur</option>
                        <option value="1" <?php if ($user["role"] == 1) {
                            echo "selected";
                        } ?>>Administrateur</option>
                    </select>
                    <button class="btn btn-outline-warning mt-3" type="submit" name="execute"
                        value="update-user">Modifier</button>
                </form>
            </div>
        </div>
        <?php
        echo '<pre>';
        var_dump($user);
        echo '</pre>';
        ?>
    </div>
</main>

<?php
include("../assets/inc/footerBack.php");
?>