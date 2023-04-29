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

    public function insertNewProduct()
    {
        global $dbconn;
        $stmtName = 'insert_product';
        $query = "INSERT INTO shsistema.tbproduto (name, price, quantity, img) VALUES (:nome_produto, :preco_produto, :qnt_produto, :imagem_produto)";
        $result = pg_prepare($dbconn, $stmtName, $query);
        if (!$result) {
            die("Erro ao preparar declaração");
        }

        $result = pg_execute($dbconn, $stmtName, array($this->name, $this->quantity, $this->price));
        if (!$result) {
            die("Erro ao executar declaração");
        }

        return true;
    }
}

$product = new Product("Product 1", 10, 10, 'oi');
$product->insertNewProduct();
echo "foi";
