# UE-3DW22

## Lancement de Docker
Commande : docker-compose up -d  
Aucun volume n'est défini dans le fichier de configuration

## Utilisation des commandes Symfony
Remplacer php bin/console par symfony console

## Connexion avec MySQL
utilisateur : root  
mot de passe : password

## Connexion avec PHPMyAdmin
Login et mot de passe identiques à ceux de MySQL

## Les ports utilisés
Serveur Symfony : 8000 par défaut
Base de données MySQL : 3306
PHPMyAdmin : 8080

## Connaitre la version et l'exécutable PHP
Commande : symfony local:php:list  
Le fichier .php-version à la racine contrôle la version utilisée par Symfony

## Pour récupérer le numéro de port de la base de données, si besoin
Commande : docker-compose ps

## Debug
Décommentez la ligne dd($_SERVER); dans index.php



