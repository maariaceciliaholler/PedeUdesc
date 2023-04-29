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

    //------------------------------------------------------//
    // Operações básicas de persistência de dados:
    //------------------------------------------------------//

    /*
        Insert na tabela definida.
    */
    public function insertNewEvaluation()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "INSERT INTO 
                    shsistema.tbavaliacao (
                        nota_avaliacao,
                        comentario_avaliacao
                    ) 
                    VALUES (
                        ".$this->score.",
                        ".$this->comment."
                    );";
    }

    /*
        Update na tabela definida.
    */
    public function updateEvaluation()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "UPDATE 
                    shsistema.tbavaliacao (
                        nota_avaliacao,
                        comentario_avaliacao
                    ) 
                    VALUES (
                        ".$this->score.",
                        ".$this->comment."
                    );";
    }

    /*
        Delete na tabela definida.
    */
    public function deleteEvaluation($property, $value)
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "DELETE FROM shsistema.tbavaliacao WHERE $property = $value;";
    }

    /*
        Select na tabela definida.
    */
    public function selectEvaluation($value)
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT $value FROM shsistema.tbavaliacao;";
    }

    public function listEvaluation()
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT * FROM shsistema.tbavaliacao;";
    }
}

?>