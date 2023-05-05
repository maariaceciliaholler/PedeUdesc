<?php
    class DtbLink {

        private $host;
        private $port;
        private $db_name;
        private $user;
        private $password;
        private $connection;

        public function __construct(){
            $this->host = "database_service";
            $this->port = "5432";
            $this->db_name = "my_db";
            $this->user = "my_user";
            $this->password = "12345";

            $this->connection = $this->open();
        }

        //------------------------------------------------------//
        // Métodos de Conexão
        //------------------------------------------------------//

        /*
         *   Cria e retorna uma nova conexão com o banco de acordo com as informações definidas no arquivo do Docker;
         */
        public function open(){
            try {
                $this->connection = pg_connect("host=".$this->host." port=".$this->host." dbname=".$this->host." user=".$this->host." password=".$this->host."");
                if (!$this->connection) {
                    throw new Exception();
                }
            } catch (Exception $e) {
                echo $e->getCode();
            }
        }

        //------------------------------------------------------//
        // Métodos de Persistência
        //------------------------------------------------------//

        /*
         *
         */
        public function exec($strSql){

            $result = pg_query($this->conn, $strSql);
            if (!$result) {
                return [ "Erro na consulta: " . pg_last_error($this->conn)];
            }
        }

        //------------------------------------------------------//
        // Métodos de Controle
        //------------------------------------------------------//

        /*
         *
         */
        public function getLastError($strSql){
            return pg_last_error($this->conn);
        }

    }


?>