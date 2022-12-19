<?php
    // on initialise la superGlobale comme un tableau vide
    include("assets/inc/headFront.php");
?>

    <title>Mon Portfolio</title>

<?php
    include("assets/inc/headerFront.php");
?>

    <main class="container">
    <?php 
        if(!$_SESSION) {
            unset($_SESSION["message"]);
        }
        if(isset($_SESSION["message"])){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $_SESSION["message"] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            // on efface la clé message une fois qu'elle a été affichée
            unset($_SESSION["message"]);
        }
    ?>
    </main>

<?php
    include("assets/inc/footerFront.php");
?>
