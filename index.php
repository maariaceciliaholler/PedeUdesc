
<?php
$conexao = pg_connect($servidor, $usuario, $senha) or
die ("Não foi possível conectar ao servidor PostGreSQL");
//caso a conexão seja efetuada com sucesso, exibe uma mensagem ao usuário
echo "Conexão efetuada com sucesso!!";
?>