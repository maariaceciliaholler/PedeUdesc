<?php
try {
    $dbconn = pg_connect("host=database_service port=5432 dbname=my_db user=my_user password=12345");

    if (!$dbconn) {
        die("Conexão falhou com o Banco de Dados falhou!");
    }
    echo "Conexão efetuada com o Banco de Dados efetuada com sucesso!";
} catch (Exception $e) {
    echo $e->getCode();
}
