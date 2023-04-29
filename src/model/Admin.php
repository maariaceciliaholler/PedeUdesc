<?php

class Admin extends Person{
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

    public function insertNewAdmin()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "INSERT INTO 
                    shsistema.tbadministrador (
                        id_administrador
                    ) 
                    VALUES (
                        ".$this->id."
                    );";
    }

    /*
        Update na tabela definida.
    */

    public function updateAdmin()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "UPDATE 
                    shsistema.tbadministrador (
                        id_administrador
                    ) 
                    VALUES (
                        ".$this->id."
                    );";
    }

    /*
        Delete na tabela definida.
    */

    public function deleteAdmin($property, $value)
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "DELETE FROM shsistema.tbadministrador WHERE $property = $value;";
    }

    /*
        Select na tabela definida.
    */
    
    public function selectAdmin($value)
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT $value FROM shsistema.tbadministrador;";
    }

    public function listAdmin()
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT * FROM shsistema.tbadministrador;";
    }
}

?>