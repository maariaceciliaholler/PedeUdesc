<?php
try {
    /* PG_CONNECT
        - Faz a conexão com o banco de acordo com as informações definidas no arquivo do Docker;
        - Nesse caso as informações de senha e usuário precisam ser passadas diretamente na função.
    */
    $dbconn = pg_connect("host=database_service port=5432 dbname=my_db user=my_user password=12345");
    if (!$dbconn) {
        die("Conexão falhou com o Banco de Dados falhou!");
    }

    echo "Conexão efetuada com o Banco de Dados efetuada com sucesso!";

    /* FUNCTION TABLEEXISTS
        - Primeiro verificará se já não foi feita uma busca pelo nome da tabela,
        se não, então cria e executa a procura da tabela;
        - No final confirmará se será necessário executar o script de criação da tabela ou não.
    */
    function tableExists($pdo, $tableName)
    {
        $stmtName = 'table_exists_query' . md5($tableName);;
        $query = "SELECT EXISTS (SELECT 1 FROM information_schema.tables WHERE table_name = $1)";

        // Verificar se a declaração preparada já existe antes de criá-la;
        $existingStmt = pg_prepare($pdo, $stmtName, $query);
        if (!$existingStmt) {
            // A declaração preparada não existe, então a criamos;
            $result = pg_prepare($pdo, $stmtName, $query);
            if (!$result) {
                die("Erro ao preparar declaração: " . pg_last_error($pdo));
            }
        }

        // Executar a declaração preparada;
        $result = pg_execute($pdo, $stmtName, array($tableName));
        if (!$result) {
            die("Erro ao executar declaração: " . pg_last_error($pdo));
        }

        // Extrair o valor booleano; 
        $row = pg_fetch_array($result);
        return $row[0];
    }

    /* FUNCTION CREATETABLES
        - Verifica se alguma tabela já existe, se sim, então é retornado que elas já foram enseridas anteriormente;
        - Caso passe pela validação, sistema executará o schema contido na pasta lib.
    */
    function createTables($dbconn, $tables)
    {
        foreach ($tables as $tableName) {
            if (tableExists($dbconn, $tableName)) {
                die("Tabelas já foram criadas anteriormente!");
            }
            $sql = file_get_contents("src/db/lib/schema.sql");
            $result = pg_query($dbconn, $sql);
            if (!$result) {
                die("Erro ao executar consulta no schema: " . pg_last_error($dbconn));
            }
        }
    }

    $tables = ['shsistema.tbpessoa', 'shsistema.tbadministrador', 'shsistema.tbcliente', 'shsistema.tbsacola', 'shsistema.tbproduto', 'shsistema.tbitemestoque', 'shsistema.tbcartao', 'shsistema.tbformapagto', 'shsistematbpedido', 'shsistema.tbavaliacao'];
    createTables($dbconn, $tables);
    echo "Tabelas criadas com sucesso!";
} catch (Exception $e) {
    echo $e->getCode();
}
