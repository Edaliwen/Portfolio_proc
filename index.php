<?php
    // on initialise la superGlobale comme un tableau vide
    session_start();
    include("assets/inc/headFront.php");
?>

    <title>Mon Portfolio</title>

<?php
    include("assets/inc/headerFront.php");
?>

    <main class="container">
    <?php
        echo $_SESSION["message"];
    ?> 
    </main>

<?php
    include("assets/inc/footerFront.php");
?>
