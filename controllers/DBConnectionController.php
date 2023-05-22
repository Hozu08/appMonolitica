<?php 
    namespace dBConnectionController;

    use mysqli;

    class DBConnectionController{
        private $db_server = '127.0.0.1';
        private $db_user = 'root';
        private $db_password = '';
        private $db_name = 'estudiantes_db';
        private $conex;

        function __construct(){
            $this->conex = new mysqli($this->db_server, $this->db_user, $this->db_password, $this->db_name);
        }
        
        function execSQL($sql){
            return $this->conex->query($sql);
        }

        function close(){
            $this->conex->close();
        }

        function connectionCheck(){
            return $this->conex->connect_error;
        }
    }
?>