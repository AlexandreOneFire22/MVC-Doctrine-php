<?php

namespace App\Controllers;


use App\Entity\Livre;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

require_once __DIR__.'/../../vendor/autoload.php';


class LivreController
{

    private EntityRepository $livreRepository;

    public function __construct(EntityRepository $livreRepository)
    {
        $this->livreRepository = $livreRepository;
    }


    //Lister l'ensemble des livres

    public function list(){

        $livres = $this->livreRepository->findAll();

        //Fait appel à la Vue afin de renvoyer la page

        require __DIR__."/../../views/livre/list.php";

    }

    public function details($id){

        $livre = $this->livreRepository->find($id);

        if ($livre){

            //Fait appel à la Vue afin de renvoyer la page

            require __DIR__."/../../views/livre/details.php";

        }else{

            header("HTTP/1.0 404 Not Found");

        }




    }

    public function addLivre(){

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            $livres = $this->livreRepository;   // A FINIR !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            require __DIR__."/../../views/accueil/accueil.php";
        }else{
            require __DIR__."/../../views/livre/addLivre.php";
        }

    }


}