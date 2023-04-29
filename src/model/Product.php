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

<<<<<<< HEAD
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
=======
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
        Delete na tabela definida.
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
>>>>>>> df5db5e7fbce9aa4a97b9cf886bf5328e455b2d1
    }
}

$product = new Product("Product 1", 10, 10, 'oi');
$product->insertNewProduct();
echo "foi";
