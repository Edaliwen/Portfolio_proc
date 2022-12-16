<?php
    // Dans ce fichier on va créer la page de connexion à notre back-office avec le login et le mot de passe
    include("../assets/inc/headFront.php");
?>
<title>Login administrateur</title>
<?php
    // Dans ce fichier on va créer la page de connexion à notre back-office avec le login et le mot de passe
    include("../assets/inc/headerFront.php");
?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <form class ="form-group" action="../core/userController.php" method="post">
                    <input type="hidden" class="form-control mt-3" name="execute" value="log-admin"></input>
                    <input class="form-control mt-3" type="email" name="login" placeholder="Votre email"></input>
                    <input class="form-control mt-3" type="password" name="password" placeholder="Votre mot de passe"></input>
                    <button class="btn btn-outline-warning mt-3" type="submit" name="submit"></button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
    // Dans ce fichier on va créer la page de connexion à notre back-office avec le login et le mot de passe
    include("../assets/inc/footerFront.php");
?>

