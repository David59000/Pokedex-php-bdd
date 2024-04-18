<!DOCTYPE html>
<?php
require 'database.php';
$yoan = Database::getPokemonAdmin();
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
                        <th>Image</th>
                        <th onClick="trierTableau(1)">Nom</th>
                        <th onClick="trierTableau(2)">Description</th>
                        <th onClick="trierTableau(4)">Taille</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($item = $yoan->fetch()) {
                        echo '<tr>';
                        echo '<td><a href= "../admin/view.php?id='. $item['num_poke'].'"<img src="../images/' . $item['img_poke'] . '"> /a></td>';
                        echo '<td>' . $item['nom'] . '</td>';
                        echo '<td>' . $item['type'] . '</td>';
                        echo '<td>' . $item['taille'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>