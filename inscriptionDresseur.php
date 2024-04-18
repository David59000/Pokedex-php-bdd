<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form action=""method="POST">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" required>
        <br>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" required>
        <br>
        <label for="email">email</label>
        <input type="text" name="email" id="email" required>
        <br>
        <label for="motDePasse">Mot de passe</label>
        <input type="text" name="motDePasse" id="motDePasse" required>
        <br>
        <input type="submit" value="S'inscrire">

    </form>
</body>
</html>
<?php

if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['motDePasse'])) {
    // Connexion à la base de données
    $dsn = 'mysql:dbname=pokedex;host=127.0.0.1';
    $user = 'root';
    $password = '';

    try {
        $dbh = new PDO($dsn, $user, $password);
        // Préparation de la requête d'insertion
        $sql = "INSERT INTO dresseurs (nom, prenom, email, mdp) VALUES (?, ?, ?, ?)";
        $requete = $dbh->prepare($sql);

        // Hashage du mot de passe
        $mdpHash = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT);

        // Exécution de la requête avec les valeurs du formulaire
        $requete->execute(array($_POST['nom'], $_POST['prenom'], $_POST['email'], $mdpHash));

        // Fermeture de la connexion
        $dbh = null;

        echo "Inscription réussie.";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>