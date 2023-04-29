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

    public function insertNewPerson()
    {
        //

        $strsql = "INSERT INTO
                    shsistema.tbpessoa ()

        "
    }
}

?>