<?php

abstract class Person{ //ver se é assim ou é interface
    private $name;
    private $phone;
    private $mail;
    private $password;

    function __construct($name, $phone, $mail, $password)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->mail = $mail;
        $this->password = $password;
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

    public function insertNewPerson()
    {
        //

        $strsql = "INSERT INTO
                    shsistema.tbpessoa (
                        nome_pessoa,
                        telefone_pessoa,
                        email,
                        senha
                    )
                    VALUES (
                        ".$this->name.",
                        ".$this->phone.",
                        ".$this->mail.",
                        ".$this->password."
                    );";
    }

    /*
        Update na tabela definida.
    */
    
    public function updatePerson()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "UPDATE 
                    shsistema.tbpessoa (
                        nome_pessoa,
                        telefone_pessoa,
                        email,
                        senha
                    )
                    VALUES (
                        ".$this->name.",
                        ".$this->phone.",
                        ".$this->mail.",
                        ".$this->password."
                    );";
    }

    /*
        Delete na tabela definida.
    */

    public function deletePerson()
    {
        //Aqui será inserido o código referente a alterações
        $strsql = "DELETE 
                    shsistema.tbpessoa (
                        nome_pessoa,
                        telefone_pessoa,
                        email,
                        senha
                    )
                    VALUES (
                        ".$this->name.",
                        ".$this->phone.",
                        ".$this->mail.",
                        ".$this->password."
                    );";
    }

    /*
        Select na tabela definida.
    */

    public function selectPerson($value)
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT $value FROM shsistema.tbpessoa";
    }

    public function listPerson()
    {
        //Aqui será inserido o código referente a seleção
        $strgsql = "SELECT * FROM shsistema.tbpessoa";
    }
}

?>