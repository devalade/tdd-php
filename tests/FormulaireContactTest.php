<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\FormulaireContact;

class FormulaireContactTest extends TestCase {
    private \PDO $db;
    private FormulaireContact $formulaire;
    
    protected function setUp(): void {
        $this->db = new \PDO('sqlite::memory:');
        $this->db->exec('
            CREATE TABLE messages (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nom TEXT NOT NULL,
                email TEXT NOT NULL,
                message TEXT NOT NULL,
                date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ');
        $this->formulaire = new FormulaireContact($this->db);
    }
    
    /** @test */
    public function test_validation_longueur_nom(): void {
        $erreurs = $this->formulaire->validerDonnees('a', 'test@test.com', 'Message valide');
        $this->assertArrayHasKey('nom', $erreurs);
        
        $nomLong = str_repeat('a', 51);
        $erreurs = $this->formulaire->validerDonnees($nomLong, 'test@test.com', 'Message valide');
        $this->assertArrayHasKey('nom', $erreurs);
        
        $erreurs = $this->formulaire->validerDonnees('Jean Dupont', 'test@test.com', 'Message valide');
        $this->assertArrayNotHasKey('nom', $erreurs);
    }
    
    /** @test */
    public function test_validation_format_email(): void {
        $erreurs = $this->formulaire->validerDonnees('Jean', 'email-invalide', 'Message valide');
        $this->assertArrayHasKey('email', $erreurs);
        
        $erreurs = $this->formulaire->validerDonnees('Jean', "'); DROP TABLE messages; --", 'Message valide');
        $this->assertArrayHasKey('email', $erreurs);
        
        $erreurs = $this->formulaire->validerDonnees('Jean', 'test@example.com', 'Message valide');
        $this->assertArrayNotHasKey('email', $erreurs);
    }
    
    /** @test */
    public function test_prevention_xss_dans_messages(): void {
        $nom = '<script>alert("xss")</script>';
        $message = '<img src="x" onerror="alert(\'xss\')">';
        
        $this->formulaire->enregistrerMessage($nom, 'test@test.com', $message);
        
        $stmt = $this->db->query('SELECT * FROM messages ORDER BY id DESC LIMIT 1');
        $resultat = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        $this->assertStringContainsString('&lt;script&gt;', $resultat['nom']);
        $this->assertStringContainsString('&lt;img', $resultat['message']);
    }
}
