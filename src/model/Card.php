<?php

class Card extends Payment
{
    private $id;
    private $cardNumber;
    private $idPerson;
    private $card_expire_date;
    private $cvv_card;

    function __construct($id, $cardNumber, $idPerson, $card_expire_date, $cvv_card)
    {
        $this->id = $id;
        $this->cardNumber = $cardNumber;
        $this->idPerson = $idPerson;
        $this->card_expire_date = $card_expire_date;
        $this->cvv_card = $cvv_card;
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
    public function insertNewCard()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "INSERT INTO 
                    shsistema.tbcartao (
                        numero_cartao, 
                        id_pessoa, 
                        cpf_pessoa, 
                        data_validade_cartao,
                        cvv_cartao
                    ) 
                    VALUES (
                        " . $this->cardNumber . ",
                        " . $this->idPerson . ",
                        " . $this->card_expire_date . ", 
                        " . $this->cvv_card . "
                    );";
    }

    /*
        Update na tabela definida.
    */
    public function updateCard()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "UPDATE 
                    shsistema.tbcartao (
                        numero_cartao, 
                        id_pessoa, 
                        cpf_pessoa, 
                        data_validade_cartao,
                        cvv_cartao
                    ) 
                    VALUES (
                        " . $this->cardNumber . ",
                        " . $this->idPerson . ",
                        " . $this->card_expire_date . ", 
                        " . $this->cvv_card . "
                    );";
    }

    /*
        Delete na tabela definida.
    */
    public function deleteCard($property, $value)
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "DELETE FROM shsistema.tbcartao WHERE $property = $value;";
    }

    /*
        Select na tabela definida.
    */
    public function selectCard($value)
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT $value FROM shsistema.tbcartao;";
    }

    public function listCard()
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT * FROM shsistema.tbcartao;";
    }
}
