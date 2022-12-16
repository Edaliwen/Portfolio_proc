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
        if (isset($_SESSION["message"])){
            echo $_SESSION["message"];
            echo "<pre>";
            echo var_dump($_SESSION);
            echo "</pre>";
        }
        echo "<pre>";
        echo var_dump($_SESSION);
        echo "</pre>";
    ?> 
    </main>

<?php
    include("assets/inc/footerFront.php");
?>
