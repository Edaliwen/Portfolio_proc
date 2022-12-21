# sitePhpProcedural

 Création d'un Portfolio :
- partie front
- partie back-office (admin) qui permettra au webmaster de configurer le site ou récupérer des informations

- au niveau de la BDD
    - une table user (avec plusieurs champs) :
        - nom
        - prenom
        - email
        - password
        - role
    - une table infos_message :
        - nom
        - prenom
        - societe
        - email
        - telephone
        - message
    - une table front_end
        - titre
        - description
        - image
        - lien
        - active
    - une table competence
        - type
        - titre
        - description
        - image
        - lien
        - active

## Création de l'architecture

- [x] Création de l'arborescence des dossiers et fichiers
- [x] Création de la table user dans la bdd portfolion
- [x] Création du dossier et fichier createUserAdmin.php
    - ce fichier va nous permettre de créer un formulaire pour enregistrer un administrateur qui aura accès au back-office (console d'administration) de notre site
- [x] Création d'une barre de navigation dans le fichier assets/inc/headerFront.php
- [x] Gestion de la connexion de l'administrateur
- [x] Sécurisation du back-office
- [x] Gestion de l'ajout d'utilisateurs 
- [x] Gestion de la modification d'utilisateurs 
- [x] Gestion de la suppression d'utilisateurs 
