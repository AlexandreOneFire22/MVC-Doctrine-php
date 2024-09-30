<?php

namespace App\Controllers;


use App\Entity\Livre;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

require_once __DIR__.'/../../vendor/autoload.php';



class LivreController
{

    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    //Lister l'ensemble des livres

    public function list(){

        $repository = $this->entityManager->getRepository(Livre::class);

        $livres = $repository->findAll();

        //Fait appel à la Vue afin de renvoyer la page

        require __DIR__."/../../views/livre/list.php";

    }

    public function details($id){

        $repository = $this->entityManager->getRepository(Livre::class);

        $livre = $repository->find($id);

        if ($livre){

            //Fait appel à la Vue afin de renvoyer la page

            require __DIR__."/../../views/livre/details.php";

        }else{

            header("HTTP/1.0 404 Not Found");

        }




    }

    public function addLivre(){

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            $livre = new Livre();

            $livre->setTitre($_POST["titre"]);
            $livre->setNbPage($_POST["nbPages"]);
            $livre->setAuteur($_POST["auteur"]);



            $this->entityManager->persist($livre); //persist n'exécute pas directement le insert

//Valider le Insert

            $this->entityManager->flush(); // flush Réalise le Insert

            require __DIR__."/../../views/accueil/accueil.php";
        }else{
            require __DIR__."/../../views/livre/addLivre.php";
        }

    }


}