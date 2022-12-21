<?php
include("../assets/inc/headBack.php");
?>
<title>Liste des utilisateurs inscrits</title>
<?php
include("../assets/inc/headerBack.php");
if ($_SESSION["role"] == null || $_SESSION["role"] != 1) {
    // on envoie un message d'alerte
    $_SESSION["message"] = "Vous n'avez pas l'autorisation pour accéder à cette partie du site.";
    header('Location: http://localhost/la_manu/sitePhpProcedural/index.php');
    exit;
}

require("../core/connexion.php");

$sql = "SELECT `id_user`, `nom`, `prenom`, `email`, `role`
            FROM `table_user`
            ";

$query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));

$users = mysqli_fetch_all($query, MYSQLI_ASSOC);
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
        <div class="row text-white text-center my-3">
            <h1>Liste des utilisateurs</h1>
        </div>
        <table class="table table-dark table-striped text-center">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Email</th>
                <th scope="col">Rôle</th>
                <th scope="col">Action</th>
            </tr>
            <?php
            foreach ($users as $user) {
                echo '<tr>';
                echo '<th scope="row">' . $user["id_user"] . '</th>';
                echo '<td>' . $user["nom"] . '</td>';
                echo '<td>' . $user["prenom"] . '</td>';
                echo '<td>' . $user["email"] . '</td>';
                if ($user["role"] == true) {
                    echo '<td>Administrateur</td>';
                } else {
                    echo '<td>Utilisateur</td>';
                }
                echo '<td>
                        <a class= "btn btn-outline-primary" type="button"  href="../admin/updateUser.php?id_user=' . $user["id_user"] . '"><i class="bi bi-pencil"></i></a>

                        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h5 class="modal-title text-black" id="exampleModalToggleLabel">ATTENTION !!!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-black">
                                L\'utilisateur ' . $user["prenom"] . ' ' . $user["nom"] . ' ainsi que ses données vont être définitivement supprimées !
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-warning" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Vous êtes sûr ??</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title" id="exampleModalToggleLabel2">Sûr sûr ??</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-black">
                                Sûr sûr sûr ???
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-warning" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">On y réfléchit encore un peu ?</button>
                                <a class="btn btn-danger" type="button" href="../admin/deleteUser.php?id_user=' . $user["id_user"] . '"><i class="bi bi-trash3"></i>Allez on supprime !</a>
                            </div>
                            </div>
                        </div>
                        </div>

                        <a class="btn btn-outline-danger" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><i class="bi bi-trash3"></i></a>
                    </td>';
                echo '</tr>';
            }
            ?>
        </table>
        <a class="btn btn-outline-light" href="http://localhost/la_manu/sitePhpProcedural/admin/createUser.php">Ajouter
            un utilisateur</a>
    </div>
</main>

<?php
include("../assets/inc/footerBack.php");
?>