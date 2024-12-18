<?php
namespace App;

class BaseDonnees {
    private static ?\PDO $connexion = null;
    
    public static function getConnexion(): \PDO {
        if (self::$connexion === null) {
            self::$connexion = new \PDO('sqlite:messages.db');
            self::$connexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            
            self::$connexion->exec('
                CREATE TABLE IF NOT EXISTS messages (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nom TEXT NOT NULL,
                    email TEXT NOT NULL,
                    message TEXT NOT NULL,
                    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
                )
            ');
        }
        
        return self::$connexion;
    }
}
