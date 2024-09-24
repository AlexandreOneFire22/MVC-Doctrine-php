<?php

//Récupérer l'EntityManager

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

$entityManager = require_once __DIR__.'/../config/bootstrap.php';


// Récupérer un PostRepository généré automatiquement par Doctrine

$livreRepository = $entityManager->getRepository(\App\Entity\Livre::class);


//Liste des livres

echo "Liste des livres : \n";

$livres = $livreRepository->findAll(); // SELECT * FROM posts

foreach ($livres as $livre) {
    echo $livre->getTitre()."\n";
}

// Lister un livre recherché via son id

echo "liste le livre id=2 \n ";

$livre = $livreRepository->find(2); // SELECT * FROM Livre WHERE id_livre=2

if ($livre){
    echo $livre->getTitre()."\n";
} else {
    echo "livre non trouvé \n";
}

//Lister un livre via son titre

echo "liste un livre via son titre \n";

$livre = $livreRepository->findOneBy(['titre' => 'Livre paranormal']); // SELECT * FROM posts WHERE titre_post = titre 2


if ($livre){
    echo $livre->getTitre()."\n";
} else {
    echo "livre non trouvé \n";
}







