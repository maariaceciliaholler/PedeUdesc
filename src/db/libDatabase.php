<?php
    class DtbLink {

        private $host;
        private $port;
        private $db_name;
        private $user;
        private $password;

        public function __construct(){
            $this->host = "database_service";
            $this->port = "5432";
            $this->db_name = "my_db";
            $this->user = "my_user";
            $this->password = "12345";
        }

        //------------------------------------------------------//
        // Métodos de Conexão
        //------------------------------------------------------//

        /*
         *   Cria e retorna uma nova conexão com o banco de acordo com as informações definidas no arquivo do Docker;
         */
        public function open(){
            try {
                $dbConn = pg_connect("host=".$this->host." port=".$this->host." dbname=".$this->host." user=".$this->host." password=".$this->host."");
                if (!$dbConn) {
                    throw new Exception();
                }
                return $dbConn;
            } catch (Exception $e) {
                return $e->getCode();
            }
        }

        //------------------------------------------------------//
        // Métodos de Persistência e Controle
        //------------------------------------------------------//

        public function exec($dtbLink, $strSql){
            try {
                $result = pg_exec($dtbLink, $strSql);
                if (!$dbConn) {
                    throw new Exception();
                }
                return $dbConn;
            } catch (Exception $e) {
                return $e->getCode();
            }
        }

    }


?>