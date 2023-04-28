<?php
require_once 'db_connection.php';

class Product
{
    private $name;
    private $price;
    private $quantity;
    private $img;

    function __construct($name, $price, $quantity, $img)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->img = $img;
    }

    /*
        Operações básicas de persistência de dados 
    */
    public function insertNewProduct()
    {

        $strsql = "INSERT INTO 
                    shsistema.tbproduto (
                        name, 
                        price, 
                        quantity, 
                        img
                    ) 
                    VALUES (:nome_produto, :preco_produto, :qnt_produto, :imagem_produto)";
    }


}
