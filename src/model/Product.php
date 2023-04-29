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
    /*
        Insert na tabela definida conforme os atributos passados pelo construtor da classe.
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
        Delete na tabela definida
    */
    public function deleteProduct()
    {
        //Aqui será inserido o código referente a alterações
    }

    /*
        Select na tabela definida.
    */
    public function selectProduct()
    {
        //Aqui será inserido o código referente a seleção
    }
}

$product = new Product("Product 1", 10, 10, 'oi');
$product->insertNewProduct();
echo "foi";
