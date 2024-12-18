<?php
namespace App;

class FormulaireContact {
    private \PDO $db;
    
    public function __construct(\PDO $db = null) {
        $this->db = $db ?? BaseDonnees::getConnexion();
    }
    
    public function validerDonnees(string $nom, string $email, string $message): array {
        $erreurs = [];
        
        if (strlen($nom) < 2 || strlen($nom) > 50) {
            $erreurs['nom'] = 'Le nom doit contenir entre 2 et 50 caractères';
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erreurs['email'] = 'Format d\'email invalide';
        }
        
        if (strlen($message) < 10 || strlen($message) > 1000) {
            $erreurs['message'] = 'Le message doit contenir entre 10 et 1000 caractères';
        }
        
        return $erreurs;
    }
    
    public function enregistrerMessage(string $nom, string $email, string $message): bool {
        $stmt = $this->db->prepare('
            INSERT INTO messages (nom, email, message) 
            VALUES (:nom, :email, :message)
        ');
        
        return $stmt->execute([
            'nom' => htmlspecialchars($nom),
            'email' => $email,
            'message' => htmlspecialchars($message)
        ]);
    }
}
