<?php
class categorie
{
    private $Nom;
    private $Slug;
    private $Nbr;

    public function __construct($n, $s, $nbr)
    {
        $this->Nom = $n;
        $this->Slug = $s;
        $this->Nbr = $nbr;
    }


    public function getNom()
    {
        return $this->Nom;
    }

    public function getSlug()
    {
        return $this->Slug;
    }

    public function getNbr()
    {
        return $this->Nbr;
    }


    public function setNom($n)
    {
        $this->Nom = $n;
    }

    public function setSlug($s)
    {
        $this->Slug = $s;
    }

    public function setNbr($nbr)
    {
        $this->Nbr = $nbr;
    }
}
