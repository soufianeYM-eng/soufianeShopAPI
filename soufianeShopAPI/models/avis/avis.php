<?php
class avis
{
    private $rating;
    private $prod;
    private $review;
    private $mail;
    private $status;

    public function __construct($rat, $prod, $rev, $m, $stat)
    {
        $this->rating = $rat;
        $this->prod = $prod;
        $this->review = $rev;
        $this->mail = $m;
        $this->status = $stat;
    }


    public function getRating()
    {
        return $this->rating;
    }

    public function getProd()
    {
        return $this->prod;
    }

    public function getReview()
    {
        return $this->review;
    }


    public function getMail()
    {
        return $this->mail;
    }

    public function getStatus()
    {
        return $this->status;
    }


    public function setRating($r)
    {
        $this->rating = $r;
    }

    public function setProd($p)
    {
        $this->prod = $p;
    }

    public function setReview($rev)
    {
        $this->review = $rev;
    }

    public function setMail($m)
    {
        $this->mail = $m;
    }

    public function setStatus($stat)
    {
        $this->status = $stat;
    }
}
