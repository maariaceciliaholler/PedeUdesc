<?php

class ShoppingBag
{
    private $id;

    function __construct($id)
    {
        $this->id = $id;
        //como colocar id cliente aqui?
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
    public function insertNewShoppingBag()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "INSERT INTO 
                    shsistema.tbsacola (
                        id_sacola
                    ) 
                    VALUES (
                        " . $this->id . "
                    );";
    }

    /*
        Delete na tabela definida.
    */
    public function deleteShoppingBag($property, $value)
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "DELETE FROM shsistema.tbsacola WHERE $property = $value;";
    }

    /*
        Select na tabela definida.
    */
    public function listProductsFromShoppingBag()
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT * FROM shsistema.tbsacola;";
    }
}
