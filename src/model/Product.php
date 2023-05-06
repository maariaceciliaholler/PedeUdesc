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

    /*
     *
     */
    static function loadObject($arrProduct)
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
        if($this->dtbLink == null)
            $this->dtbLink = new DtbLink();

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

        if (!$this->dtbLink->execSql($strSql)) {
            return $this->dtbLink->getMessage();
        }
        return ["dsMsg" => "ok"];
    }

    /*
        Update na tabela definida.
    */
    public function updateProduct()
    {
        if($this->dtbLink == null)
            $this->dtbLink = new DtbLink();

        $strSql = " UPDATE 
                        shsistema.tbproduto
                    SET
                        nome_produto = ".$this->name.",
                        preco_produto = ".$this->price.",
                        qnt_produto = ".$this->quantity.", 
                        imagem_produto = ".$this->img."
                    WHERE
                        id_produto = ".$this->id.";";

        if (!$this->dtbLink->execSql($strSql)) {
            return $this->dtbLink->getMessage();
        }
        return ["dsMsg" => "ok"];
    }

    /*
        Delete na tabela definida.
    */
    public function deleteProduct()
    {

        if($this->dtbLink == null)
            $this->dtbLink = new DtbLink();

        $strSql = " DELETE FROM 
                        shsistema.tbproduto 
                    WHERE 
                        id_produto = ".$this->id;

        if (!$this->dtbLink->execSql($strSql)) {
            return $this->dtbLink->getMessage();
        }
        return ["dsMsg" => "ok"];
    }

    //------------------------------------------------------//
    // Operações básicas de persistência de dados
    //------------------------------------------------------//

    /*
        Select na tabela definida.
    */
    public static function selectProduct($idProduct)
    {

        $dtbConn = new DtbLink();

        $strSql = " SELECT
                        *
                    FROM
                        shsistema.tbproduto
                    WHERE
                        id_produto = ".$idProduct;

        if (!$dtbConn->execQuery($strSql)) {
            return $dtbConn->getMessage()['dsMsg'] . '<br> Sql: ' . $strSql;
        } else {
            $resSet = $dtbConn->fetchArray();
            return self::loadObject($resSet);
        }
    }

    public static function listProducts($strCondicao, $strOrdenacao)
    {
        $dtbConn = new DtbLink();

        $strSql = " SELECT
                        *
                    FROM
                        shsistema.tbproduto
                    WHERE
                        TRUE ";

        if ($strCondicao != "")
            $strSql .= $strCondicao;

        if ($strOrdenacao != "")
            $strSql .= " ORDER BY " . $strOrdenacao;

        if (!$dtbConn->execQuery($strSql)) {
            return $dtbConn->getMessage()['dsMsg'] . '<br> Sql: ' . $strSql;
        } else {
            while ($resSet = $dtbConn->fetchArray()) {
                $aroTbProduct[] = self::loadObject($resSet);
            }
            return $aroTbProduct;
        }
    }
}
?>