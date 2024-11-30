<?php declare(strict_types=1);
require "./FirstSecction.php";
use PHPUnit\Framework\TestCase;

class FirstSectionTest extends TestCase
{
    public function test_si_la_function_retourne_bonjour_le_monde(): void
    {
          $estVrai = direBonjour() === "Bonjour, le monde.";
          $this->assertTrue($estVrai);
    }

    public function test_deux_nombre_positifs(): void
    {
      $this->assertSame(addition(1, 2), 3);
    }

    public function test_un_nombre_positif_et_nombre_negatif(): void
    {
      $this->assertSame(addition(4, -1),3);
    }

    public function test_deux_nombre_null(): void
    {
      $this->assertSame(addition(0,0),0);
    }

    public function test_quel_est_le_plus_grand_nombre(): void
    {
        $this->assertSame(trouverMax(1,2),2);
    }

    public function test_si_les_deux_nombres_sont_egaux_retourner_n_importe_lequel(): void
    {
        $resultat = trouverMax(8,8);
        $this->assertSame($resultat,8);
    }

    public function test_avec_un_mot_simple(): void
    {

        $this->assertTrue(comptercaractere("Pierrick")  === 8);
    }

    public function test_avec_une_chaine_vide(): void
    {

        $this->assertTrue(comptercaractere("")  === 0);
    }

    public function test_avec_une_chaine_avec_espace(): void
    {

        $this->assertTrue(comptercaractere("krist est le meilleur ")  === 22);
    }

    public function test_si_le_nombre_est_pair(): void
    {

        $this->assertTrue(estPair(2));
    }

    public function test_si_le_nombre_est_impair(): void
    {

        $this->assertSame(estPair(3), false);
    }

    public function test_avec_la_zero(): void
    {

        $this->assertSame(estPair(0), true);
    }

    public function test_la_function_qui_retour_bonjour_nom(): void
    {

        $this->assertSame(saluer("Hanan"), "Bonjour, Hanan.");
    }
}
