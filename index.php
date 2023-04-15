
<?php
// o pg_connect tem um parametro só que é uma string. tavam sendo passados varios
$dbconn = pg_connect("host=database_service port=5432 dbname=my_db user=my_user password=12345")
or die('Could not connect');
echo "Conexão efetuada com sucesso!!";
?>