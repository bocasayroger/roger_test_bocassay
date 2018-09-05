# roger_test_bocassay

depôt github
https://github.com/bocasayroger/roger_test_bocassay


on clone le projet
git clone https://github.com/bocasayroger/roger_test_bocassay.git

on entre dans le repertoire de l'application
cd challenge-sf

on installe les vendors
composer install

on demarre le serveur symfony
php bin/console server:run

on lançe la commande de création de la BDD
php bin/console doctrine:database:create

on lançe la commande de création des tables
doctrine:schema:update

on lancce l'application dans le navigateur
http://127.0.0.1:8000/