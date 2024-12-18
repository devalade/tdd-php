<?php

require_once 'vendor/autoload.php';

use App\FormulaireContact;

$formulaire = new FormulaireContact();
$erreurs = [];
$succes = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';
    
    $erreurs = $formulaire->validerDonnees($nom, $email, $message);
    
    if (empty($erreurs)) {
        $succes = $formulaire->enregistrerMessage($nom, $email, $message);
    }
}
?>

<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact Sécurisé</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <style>
        .erreur {
            color: #b71c1c;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .succes {
            background: #dcedc8;
            color: #33691e;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <main class="container">
        <article>
            <header>
                <h1>Contactez-nous</h1>
                <p>Remplissez le formulaire ci-dessous pour nous envoyer un message.</p>
            </header>

            <?php if ($succes): ?>
                <div class="succes">
                    Votre message a été envoyé avec succès !
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div>
                    <label for="nom">Nom :</label>
                    <input 
                        type="text" 
                        id="nom" 
                        name="nom" 
                        required 
                        value="<?= isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '' ?>"
                        aria-invalid="<?= isset($erreurs['nom']) ? 'true' : 'false' ?>"
                    >
                    <?php if (isset($erreurs['nom'])): ?>
                        <small class="erreur"><?= $erreurs['nom'] ?></small>
                    <?php endif; ?>
                </div>

                <div>
                    <label for="email">Email :</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        required
                        value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"
                        aria-invalid="<?= isset($erreurs['email']) ? 'true' : 'false' ?>"
                    >
                    <?php if (isset($erreurs['email'])): ?>
                        <small class="erreur"><?= $erreurs['email'] ?></small>
                    <?php endif; ?>
                </div>

                <div>
                    <label for="message">Message :</label>
                    <textarea 
                        id="message" 
                        name="message" 
                        required
                        aria-invalid="<?= isset($erreurs['message']) ? 'true' : 'false' ?>"
                    ><?= isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '' ?></textarea>
                    <?php if (isset($erreurs['message'])): ?>
                        <small class="erreur"><?= $erreurs['message'] ?></small>
                    <?php endif; ?>
                </div>

                <button type="submit">Envoyer le message</button>
            </form>
        </article>
    </main>
</body>
</html>
