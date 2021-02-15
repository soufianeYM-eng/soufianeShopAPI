<?php

class product
{
    private $nom;
    private $prix;
    private $description;
    private $shortDescription;
    private $image;

    public function __construct($n, $p, $desc, $sdesc, $img)
    {
        $this->nom = $n;
        $this->prix = $p;
        $this->description = $desc;
        $this->shortDescription = $sdesc;
        $this->image = $img;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function getDescirption()
    {
        return $this->description;
    }


    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    public function getImage()
    {
        return $this->image;
    }


    public function setNom($n)
    {
        $this->nom = $n;
    }

    public function setPrix($p)
    {
        $this->prix = $p;
    }

    public function setDescription($desc)
    {
        $this->description = $desc;
    }

    public function setShortDescription($sdesc)
    {
        $this->shortDescription = $sdesc;
    }

    public function setImage($img)
    {
        $this->image = $img;
    }
}
