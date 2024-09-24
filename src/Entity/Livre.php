<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table(name: "livre")]
class Livre
{
    #[ORM\Id] // Clé primaire dans la table posts
    #[ORM\Column(name: "id_livre", type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(name: "titre_livre",type: "string",length: 100)]
    private string $titre;

    #[ORM\Column(name: "nombre_page_livre",type: "integer")]
    private int $nbPage;

    #[ORM\Column(name: "auteur_livre",type: "string",length: 100)]
    private string $auteur;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return int
     */
    public function getNbPage(): int
    {
        return $this->nbPage;
    }

    /**
     * @param int $nbPage
     */
    public function setNbPage(int $nbPage): void
    {
        $this->nbPage = $nbPage;
    }

    /**
     * @return string
     */
    public function getAuteur(): string
    {
        return $this->auteur;
    }

    /**
     * @param string $auteur
     */
    public function setAuteur(string $auteur): void
    {
        $this->auteur = $auteur;
    }


}