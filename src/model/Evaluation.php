<?php

class Evaluation{
    private $score;
    private $comment;

    function __construct($score, $comment)
    {
        $this->score = $score;
        $this->comment = $comment;
    }

    //------------------------------------------------------//
    //Operações básicas de acesso ao objeto:
    //------------------------------------------------------//

    public function get($property)
    {
        return $this->$property;
    }

    public function set($property, $value)
    {
        $this->$property = $value;
    }
}

?>