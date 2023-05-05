<?php
    class DtbLink {

        private $host;
        private $port;
        private $db_name;
        private $user;
        private $password;
        private $connection;

        private $error_code;

        private $query;
        private $sql;

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
        // Métodos de Consulta
        //------------------------------------------------------//

        /*
         *
         */
        public function execQuery($strSql){

            $this->sql = $strSql;
            $this->query = @pg_query($this->lnkServer,$this->sql);
            return $this->query;

        }

        /*
         *
         */
        public function fetchArray(){
            return pg_fetch_array($this->query);
        }

        //------------------------------------------------------//
        // Métodos de Manutenção
        //------------------------------------------------------//

        /*
         *
         */
        public function execSql($strSql){

            $this->sql = $strSql;
            $this->query = pg_send_query($this->conn, $this->sql);
            $strStatus = pg_get_result($this->conn);

            $this->error_code = pg_result_error_field($strStatus, PGSQL_DIAG_SQLSTATE);

            return $this->error_code == '';

        }

        /*
         *
         */
        public function begin(){
            $this->qryServer = pg_query($this->lnkServer,"begin;");
        }

        /*
         *
         */
        public function commit(){
            $this->qryServer = pg_query($this->lnkServer,"commit;");
        }

        /*
         *
         */
        public function rollback(){
            $this->qryServer = pg_query($this->lnkServer,"rollback;");
        }
        //-----------------------------------------------------------------------------------------------------------------------//

        public function getMessage(){

            $arrMsg = array();
            switch($this->qryErrorCodeServer){
                case '23505':{
                    $arrMsg['flTipo'] = 'A';
                    $arrMsg['dsMsg'] = '&raquo; Já existe um registro cadastrado com os dados informados!<br>';
                    break;
                }
                case '23503':{
                    $arrMsg['flTipo'] = 'A';
                    $arrMsg['dsMsg'] = '&raquo; Não é possível excluir o registro selecionado pois o mesmos está sendo utilizando em outros cadastros!<br>'.pg_last_error().'<br>';
                    break;
                }
                case '3F000':{
                    $arrMsg['flTipo'] = 'E';
                    $arrMsg['dsMsg'] = 'Schema não encontrado no banco de dados!<br>Erro:'.pg_last_error().'<br>'.$this->strQueryServer.'<br>';
                    break;
                }
                case '42P01':{
                    $arrMsg['flTipo'] = 'E';
                    $arrMsg['dsMsg'] = 'Erro de Sistema nº '.$this->qryErrorCodeServer.' tabela não existe no banco de dados. <br>Erro:'.pg_last_error().'<br>'.$this->strQueryServer.'<br>';
                    break;
                }
                case '42703':{
                    $arrMsg['flTipo'] = 'E';
                    $arrMsg['dsMsg'] = 'Erro de Sistema nº '.$this->qryErrorCodeServer.' coluna não existe no banco de dados. <br>Erro:'.pg_last_error().'<br>'.$this->strQueryServer.'<br>';
                    break;
                }
                case '42601':{
                    $arrMsg['flTipo'] = 'E';
                    $arrMsg['dsMsg'] = 'Erro de Sql nº '.$this->qryErrorCodeServer.' sintaxe do comando incorreta. <br>'.pg_last_error().'<br>'.$this->strQueryServer.'<br>';
                    break;
                }
                default:{
                    $arrMsg['flTipo'] = 'E';
                    $arrMsg['dsMsg'] = 'Erro não catalogado: '.$this->qryErrorCodeServer.' <br>'.pg_last_error().'<br>Sql:'.$this->strQueryServer.'<br>';
                    break;
                }
            }
            return $arrMsg;
        }
    }
?>
