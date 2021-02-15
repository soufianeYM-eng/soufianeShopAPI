<?php
class commande
{
    private $commande;
    private $date;
    private $status;
    private $total;
    private $paiement;


    public function __construct($c, $d, $sta, $total, $paie)
    {
        $this->commande = $c;
        $this->date = $d;
        $this->status = $sta;
        $this->total = $total;
        $this->paiement = $paie;
    }

    public function getCommande()
    {
        return $this->commande;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getStatus()
    {
        return $this->status;
    }


    public function getTotal()
    {
        return $this->total;
    }

    public function getPaiement()
    {
        return $this->paiement;
    }


    public function setCommande($c)
    {
        $this->commande = $c;
    }

    public function setDate($d)
    {
        $this->date = $d;
    }

    public function setStatus($stat)
    {
        $this->status = $stat;
    }

    public function setPaiement($paie)
    {
        $this->paiement = $paie;
    }

    public function setImage($img)
    {
        $this->image = $img;
    }
}
