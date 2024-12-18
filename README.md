# Formulaire de Contact Sécurisé - Projet de Formation

Ce projet est un exemple de formulaire de contact sécurisé en PHP, conçu pour l'apprentissage des bonnes pratiques de sécurité et du TDD (Test-Driven Development).

## 🚀 Prérequis

### Pour Windows :
1. Installez XAMPP (inclut PHP, SQLite et Apache)
   - Téléchargez XAMPP depuis [le site officiel](https://www.apachefriends.org/fr/index.html)
   - Choisissez la version avec PHP 8.1 ou supérieur
   - Pendant l'installation, sélectionnez au minimum (Apache, Nginx), PHP et SQLite. Les systèmes linux viennent avec un serveur web. 


2. Installez Composer
   - Téléchargez l'installateur Windows sur [getcomposer.org](https://getcomposer.org/download/)
   - Exécutez l'installateur (Composer-Setup.exe)
   - Assurez-vous de sélectionner votre PHP lors de l'installation (généralement dans C:\xampp\php\php.exe)

3. Vérifiez vos installations dans le terminal (CMD ou PowerShell) :
```bash
php -v
composer -v
```

### Pour Linux/MacOS :
- PHP 8.2 ou supérieur : `php -v`
- Composer : `composer -v`
- SQLite3 : `sqlite3 -version`

## 📥 Installation

### Windows :
1. Clonez ou téléchargez le projet
   - Option 1 : Téléchargez le ZIP et extrayez-le dans `C:\xampp\htdocs\tdd-php`
   - Option 2 : Utilisez Git Bash :
   ```bash
   cd C:\xampp\htdocs
   git clone https://github.com/devalade/tdd-php.git
   ```

2. Ouvrez le terminal (CMD) en tant qu'administrateur :
```bash
cd C:\xampp\htdocs\tdd-php
composer install
composer dump-autoload -o
```

3. Créez la base de données :
   - Créez un fichier `messages.db` dans le dossier du projet
   - Assurez-vous qu'il est accessible en écriture

### Linux/MacOS :
```bash
git clone https://github.com/devalade/tdd-php.git
cd tdd-php
composer install
touch messages.db
```

## 🚦 Lancer les tests

### Windows :
```bash
cd C:\xampp\htdocs\tdd-php
.\vendor\bin\phpunit
```

Pour un test spécifique :
```bash
.\vendor\bin\phpunit tests\FormulaireContactTest.php
```

### Linux/MacOS :
```bash
./vendor/bin/phpunit
```

## 📝 Structure du Projet

```
tdd-php/
├── composer.json
├── index.php                # Point d'entrée
├── messages.db             # Base de données SQLite
├── src/
│   ├── BaseDonnees.php     # Connexion BDD
│   └── FormulaireContact.php # Logique formulaire
└── tests/
    └── FormulaireContactTest.php
```

## 🌐 Lancement du Projet

### Avec XAMPP (Windows) :
1. Démarrez XAMPP Control Panel
2. Activez Apache
3. Ouvrez votre navigateur et accédez à :
```
http://localhost/tdd-php
```

### Avec le serveur PHP intégré :
```bash
# Windows (CMD)
cd C:\xampp\htdocs\tdd-php
php -S localhost:8000

# Linux/MacOS
php -S localhost:8000
```

## ⚠️ Résolution des Problèmes Courants

### Windows :
1. "php n'est pas reconnu comme commande interne"
   - Ajoutez PHP aux variables d'environnement :
     1. Recherchez "variables d'environnement" dans Windows
     2. Cliquez sur "Variables d'environnement"
     3. Dans "Variables système", trouvez "Path"
     4. Ajoutez `C:\xampp\php`

2. Erreur de permissions SQLite :
   - Clic droit sur messages.db
   - Propriétés → Sécurité
   - Donnez les permissions complètes

3. Erreur PDO SQLite :
   - Ouvrez `C:\xampp\php\php.ini`
   - Décommentez la ligne `;extension=pdo_sqlite`
   - Redémarrez Apache
4. Erreur zip
   Installez un logiciel de compression qui supporte zip (unzip, winrar)  

### Linux/MacOS :
```bash
chmod 777 messages.db
chmod 777 .
```

## 📚 Documentation Utile

- [XAMPP Documentation](https://www.apachefriends.org/docs/)
- [PHPUnit Documentation](https://phpunit.de/documentation.html)
- [Composer Windows Documentation](https://getcomposer.org/doc/00-intro.md#installation-windows)

## 📫 Support

En cas de problème :
1. Vérifiez la section "Résolution des Problèmes"
2. Ecrivez à Florian
3. Créez une issue sur GitHub avec une capture d'écran des erreurs svp

---
Projet réalisé dans le cadre de la formation sécurité et tests en PHP.
