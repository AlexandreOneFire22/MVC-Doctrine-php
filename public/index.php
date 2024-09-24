<?php

// Contrôleur FRONTAL => Router
// Toute les requêtes des utilisateurs passent par ce fichier

use App\Entity\Livre;

require_once __DIR__.'/../vendor/autoload.php';


/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

$entityManager = require_once __DIR__.'/../config/bootstrap.php';

$livreRepository = $entityManager->getRepository(Livre::class);

// Mise en place du routing

$route = $_GET['route'] ?? 'accueil' ;

switch ($route){

    case "accueil" :
        $accueilController = new \App\Controllers\AccueilController();
        $accueilController->Accueil();

        break;

    case "livre-list" :

        $livreControleur = new \App\Controllers\LivreController($livreRepository);

        $livreControleur->list();

        break;

    case "livre-details" :

        $id = $_GET['id'] ?? null ;

        if ($id){

            $livreControleur = new \App\Controllers\LivreController($livreRepository);

            $livreControleur->details($id);

        }else{
            echo "La requête n'est pas valide.";
        }

        break;

    case "livre-add" :

        $livreControleur = new \App\Controllers\LivreController($livreRepository);

        $livreControleur->addLivre();

        break;

    default :
        // Page erreur 404
        echo "Page non trouvée";

        break;

}




