<?php

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
    public function insertNewProduct()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "INSERT INTO 
                    shsistema.tbproduto (
                        nome_produto, 
                        preco_produto, 
                        qnt_produto, 
                        imagem_produto
                    ) 
                    VALUES (
                        " . $this->name . ",
                        " . $this->price . ",
                        " . $this->quantity . ", 
                        " . $this->img . "
                    );";
    }

    /*
        Update na tabela definida.
    */
    public function updateProduct()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "UPDATE 
                    shsistema.tbproduto(
                        nome_produto, 
                        preco_produto, 
                        qnt_produto, 
                        imagem_produto
                    ) VALUES (
                        " . $this->name . ",
                        " . $this->price . ",
                        " . $this->quantity . ", 
                        " . $this->img . "
                );";
    }

    /*
        Delete na tabela definida.
    */
    public function deleteProduct()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "DELETE 
                    shsistema.tbproduto(
                        nome_produto, 
                        preco_produto, 
                        qnt_produto, 
                        imagem_produto
                 ) VALUES (
                         " . $this->name . ",
                         " . $this->price . ",
                         " . $this->quantity . ", 
                         " . $this->img . "
                );";
    }

    /*
        Select na tabela definida.
    */
    public function selectProduct($value)
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT $value FROM shsistema.tbproduto";
    }

    public function listProducts()
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT * FROM shsistema.tbproduto";
    }
}
