<?php

class Database {

    private static $dbHost = "localhost";
    private static $dbName = "pokedex";
    private static $dbUsername = "root";
    private static $dbUserpassword = "";
    private static $connection = null;
    
    public static function connect() {
        if(self::$connection == null) {
            try {
              self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUsername, self::$dbUserpassword);
            }
            catch(PDOException $e) {
                die($e->getMessage());
            }
        }

        return self::$connection;
    }


    public static function getPokemonById($num_poke){
        $db = Database::connect();
        $rida = $db->prepare ("SELECT * FROM pokemon AS p WHERE num_poke = :id");
        $rida->execute(array('id'=> $num_poke));
        $clavier = $rida->fetch();
        return $clavier;
    }

 

    



    // public static function RechercheCategory(){

    //     $db = Database::connect();
    //     $statement = $db->query("SELECT * FROM categories");
    //     $categories = $statement->fetchAll();

    //     return $categories;

    // }

public Static function getPokemonAdmin(){
    $db = Database::connect();
    $rechercheType = $db->query("SELECT p.img_poke, p.nom, p.competence, p.taille, p.masse, p.attack, p.defence, p.num_poke, type.nom AS type
    FROM pokemon AS p 
    JOIN pokemon_type ON p.num_poke = pokemon_type.poke_id
    JOIN type ON pokemon_type.type_id = type.id_type");
    

    return $rechercheType;
}






    // public static function RechercheItemByCategory($id){

    //     $db = Database::connect();
    //     $toto = $db->prepare("SELECT* FROM items WHERE category = ?");
    //     $toto->execute(array($id));

    //     return $toto;

    // }


    public static function disconnect() {
        self::$connection = null;
    }
}
?>


