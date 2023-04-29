<?php

class Client extends Person{
    private $id;

    function __construct($id)
    {
        $this->id = $id;
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

    public function insertNewClient()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "INSERT INTO 
                    shsistema.tbcliente (
                        id_cliente
                    ) 
                    VALUES (
                        ".$this->id."
                    );";
    }

    /*
        Update na tabela definida.
    */

    public function updateClient()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "UPDATE 
                    shsistema.tbcliente (
                        id_cliente
                    ) 
                    VALUES (
                        ".$this->id."
                    );";
    }

    /*
        Delete na tabela definida.
    */

    public function deleteClient($property, $value)
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "DELETE FROM shsistema.tbclient WHERE $property = $value;";
    }

    /*
        Select na tabela definida.
    */
    
    public function selectClient($value)
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT $value FROM shsistema.tbcliente;";
    }

    public function listClient()
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT * FROM shsistema.tbcliente;";
    }
}

?>