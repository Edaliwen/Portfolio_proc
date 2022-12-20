</head>

<body>
    <header>
        <!--barre de navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://localhost/la_manu/sitePhpProcedural/">Accueil du site</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="http://localhost/la_manu/sitePhpProcedural/admin/accueilAdmin.php">Accueil administrateur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/la_manu/sitePhpProcedural/admin/listUsers.php">Gestion des utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Gestion des compétences</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Gestion de la messagerie</a>
                        </li>
                    </ul>
                <form class ="form-group" action="../core/userController.php" method="post">
                <button class="btn btn-outline-danger mt-3" type="submit" name="execute" value="log-out">Se déconnecter</button>
                </form>
                </div>
            </div>
        </nav>
    </header>