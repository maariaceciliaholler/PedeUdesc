<?php

class StockItem{
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

    public function insertNewStockItem()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "INSERT INTO 
                    shsistema.tbitemestoque (
                        id_itemestoque
                    ) 
                    VALUES (
                        ".$this->id."
                    );";
    }

    /*
        Update na tabela definida.
    */

    public function updateStockItem()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "UPDATE 
                    shsistema.tbitemestoque (
                        id_itemestoque
                    ) 
                    VALUES (
                        ".$this->id."
                    );";
    }

    /*
        Delete na tabela definida.
    */

    public function deleteStockItem($property, $value)
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "DELETE FROM shsistema.tbitemestoque WHERE $property = $value;";
    }

    /*
        Select na tabela definida.
    */
    
    public function selectStockItem($value)
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT $value FROM shsistema.tbitemestoque;";
    }

    public function listStockItem()
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT * FROM shsistema.tbitemestoque;";
    }
}

?>