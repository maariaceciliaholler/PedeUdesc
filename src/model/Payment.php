<?php

abstract class Payment
{
    private $id;
    private $paymentType;

    function __construct($id)
    {
        $this->id = $id;
        //como colocar a propriedade do tipo aqui?
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
    public function insertNewPaymentForm()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "INSERT INTO 
                    shsistema.tbformapagto (
                        id_formapagto,
                        tipo_formapagto
                    ) 
                    VALUES (
                        " . $this->id . ",
                        " . $this->paymentType . "
                    );";
    }

    /*
        Update na tabela definida.
    */
    public function updatePaymentForm()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "UPDATE 
                    shsistema.tbformapagto (
                        id_formapagto,
                        tipo_formapagto
                    ) 
                    VALUES (
                        " . $this->id . ",
                        " . $this->paymentType . "
                    );";
    }

    /*
        Delete na tabela definida.
    */
    public function deletePaymentForm($property, $value)
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "DELETE FROM shsistema.tbformapagto WHERE $property = $value;";
    }

    /*
        Select na tabela definida.
    */
    public function selectPaymentForm($value)
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT $value FROM shsistema.tbformapagto;";
    }

    public function listPaymentForms()
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT * FROM shsistema.tbformapagto;";
    }
}
