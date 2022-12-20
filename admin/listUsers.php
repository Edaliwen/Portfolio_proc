<?php
    include("../assets/inc/headBack.php");
?>
<title>Liste des utilisateurs inscrits</title>
<?php
    include("../assets/inc/headerBack.php");
    if($_SESSION["role"] == null || $_SESSION["role"] !=  1){
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
        <div class="row text-white text-center my-3">
            <h1>Liste des utilisateurs</h1>
        </div>
        <table class="table table-dark table-striped">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Email</th>
                <th scope="col">Rôle</th>
            </tr>
            <?php
        foreach($users as $user){
            echo '<tr>';
            echo '<th scope="row">' . $user["id_user"] . '</th>';
            echo '<td>' . $user["nom"] . '</td>';
            echo '<td>' . $user["prenom"] . '</td>';
            echo '<td>' . $user["email"] . '</td>';
            if($user["role"] == true){
                echo '<td>Administrateur</td>';
            }else{
                echo '<td>Utilisateur</td>';
            }
            echo '</tr>';
        }
        ?>
        </table>
    </div>
</main>

<?php
    include("../assets/inc/footerBack.php");
?>