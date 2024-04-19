<!DOCTYPE html>
<?php
require 'database.php';
$yoan = Database::getPokemonEquipe();

  

if (isset($_POST['delete_poke'])){
    // Connexion à la base de données
    $dsn = 'mysql:dbname=pokedex;host=127.0.0.1';
    $user = 'root';
    $password = '';
  
    try {
        $dbh = new PDO($dsn, $user, $password);
        // Préparation de la requête d'insertion
        $sql = "DELETE FROM equipes WHERE poke_id = ?";
        $requete = $dbh->prepare($sql);
  
        // Exécution de la requête avec les valeurs du formulaire
        $requete->execute(array($_POST['delete_poke']));
  
        // Fermeture de la connexion
        $dbh = null;
  
        echo "Ce pokemon a bien été supprimé dans la table EQUIPE de la base de données";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
  }


?>
<html>
<head>
    <title>Pokedex</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="../css/styles.css"> -->
    <script src="script.js"></script>
</head>
<body>
    <h1 class="text-logo"><span class="bi-shop"></span> Pokedex <span class="bi-shop"></span></h1>
    <div class="container admin">
        <div class="row">
            <h1><strong>Equipe</strong></h1>
            <table id="tableauPokemons" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th onClick="trierTableau(1)">Nom pokemon</th>
                        <th onClick="trierTableau(2)">N° pokemon</th>
                        <th onClick="trierTableau(4)">Nom dresseur</th>
                        <th onClick="trierTableau(4)">Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($item = $yoan->fetch()) {
                        echo '<tr>';
                        echo '<td>' . $item['nom_pokemon'] . '</td>';
                        echo '<td>' . $item['num_poke'] . '</td>';
                        echo '<td>' . $item['dresseur'] . '</td>';
                        echo '<td>' . $item['type'] . '</td>';
                        echo '<td> 
                        <form method="post">
                        <input type="hidden" name="delete_poke" value="'.$item['num_poke'].'">
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                    </td>';
                        
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>