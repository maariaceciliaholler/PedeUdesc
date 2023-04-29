<?php

class Order{
    private $id;
    private $date_order_closure;

    function __construct($id, $date_order_closure)
    {
        $this->id = $id;
        $this->date_order_closure = $date_order_closure;
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

    public function insertNewOrder()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "INSERT INTO 
                    shsistema.tbpedido (
                        id_pedido,
                        data_fechamento_pedido  /*preciso por também id_sacola, id_formapagto?*/
                    ) 
                    VALUES (
                        ".$this->id.",
                        ".$this->date_order_closure."
                    );";
    }

    /*
        Update na tabela definida.
    */
    
    public function updateOrder()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "UPDATE 
                    shsistema.tbpedido (
                        id_pedido,
                        data_fechamento_pedido  /*preciso por também id_sacola, id_formapagto?*/
                    ) 
                    VALUES (
                        ".$this->id.",
                        ".$this->date_order_closure."
                    );";
    }

    /*
        Delete na tabela definida.
    */

    public function deletePOrder($property, $value)
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "DELETE FROM shsistema.tbpedido WHERE $property = $value";
    }

    /*
        Select na tabela definida.
    */

    public function selectOrder($value)
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT $value FROM shsistema.tbpedido";
    }

    public function listOrder()
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT * FROM shsistema.tbpedido";
    }

}



?>