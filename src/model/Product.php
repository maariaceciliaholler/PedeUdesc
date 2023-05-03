<?php

class Product
{
    private $id;
    private $name;
    private $price;
    private $quantity;
    private $img;

    //Propriedades Abstratas
    private $dtbLink;

    function __construct($name, $price, $quantity, $img)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->img = $img;
    }

    function loadObject($arrProduct)
    {
        $objProduct = new Product();
        $objProduct->set("id", $arrProduct["id_produto"]);
        $objProduct->set("name", $arrProduct["nome_produto"]);
        $objProduct->set("price", $arrProduct["preco_produto"]);
        $objProduct->set("quantity", $arrProduct["qnt_produto"]);
        $objProduct->set("img", $arrProduct["imagem_produto"]);

        return $objProduct;
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

    public function setDtbLink($objDtbLink)
    {
        $this->dtbLink = $objDtbLink;
    }

    //------------------------------------------------------//
    // Operações básicas de persistência de dados
    //------------------------------------------------------//

    /*
        Insert na tabela definida.
     */
    public function insertProduct()
    {
        $dtbConn = $this->dtbLink;
        if($this->dtbLink == null)
            $dtbConn = new DtbLink();

        $strSql = " INSERT INTO 
                        shsistema.tbproduto (
                            nome_produto, 
                            preco_produto, 
                            qnt_produto, 
                            imagem_produto
                        ) 
                    VALUES (
                        ".$this->name.",
                        ".$this->price.",
                        ".$this->quantity.", 
                        ".$this->img."
                    );";

        $result = $dtbConn->exec($strSql);
        if (!$result) {
            return $dtbConn->getLastError();
        }
        return ["dsMsg" => "ok"];
    }

    /*
        Update na tabela definida.
    */
    public function updateProduct()
    {
        $dtbConn = $this->dtbLink;
        if($this->dtbLink == null)
            $dtbConn = new DtbLink();

        $strSql = " UPDATE 
                        shsistema.tbproduto(
                            nome_produto, 
                            preco_produto, 
                            qnt_produto, 
                            imagem_produto
                        ) 
                    VALUES (
                        ".$this->name.",
                        ".$this->price.",
                        ".$this->quantity.", 
                        ".$this->img."
                    );";

        $result = $dtbConn->exec($strSql);
        if (!$result) {
            return $dtbConn->getLastError();
        }
        return ["dsMsg" => "ok"];
    }

    /*
        Delete na tabela definida.
    */
    public function deleteProduct($strCondicao, $strOrdenacao)
    {
        $dtbConn = $this->dtbLink;
        if($this->dtbLink == null)
            $dtbConn = new DtbLink();

        $strSql = " DELETE FROM 
                        shsistema.tbproduto 
                    WHERE 
                        TRUE ";
    }

    //------------------------------------------------------//
    // Operações básicas de persistência de dados
    //------------------------------------------------------//

    /*
        Select na tabela definida.
    */
    public function selectProduct($id)
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT * FROM shsistema.tbproduto;";
    }

    public function listProducts()
    {
        //Aqui será inserido o código referente a seleção

        $strSql = "SELECT * FROM shsistema.tbproduto;";

        $rows = pg_fetch_all($result);
        return $rows;
    }
}
