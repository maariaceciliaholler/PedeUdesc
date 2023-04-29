<?php
require_once 'db_connection.php';

class Person{
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

    /*
        Operações básicas de persistência de dados 
    */
    /*
        Insert na tabela definida conforme os atributos passados pelo construtor da classe.
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
        Delete na tabela definida
    */

    public function deletePerson()
    {
        //Aqui será inserido o código referente a alterações
    }

    /*
        Select na tabela definida.
    */
    public function selectPerson()
    {
        //Aqui será inserido o código referente a seleção
    }
}

?>