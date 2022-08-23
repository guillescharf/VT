<?php

    class connection{

        protected $db_connection;

        public function __construct(){

            try{

                $this->db_connection = new PDO('mysql:host='.DB_HOST.'; dbname=' . DB_NAME , DB_USER, DB_PASS);

                //PDO::ATTR_ERRMODE: Reporte de errores. --- PDO::ERRMODE_EXCEPTION: Lanza exceptions.

                $this->db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $this->db_connection->exec("SET CHARACTER SET utf8");

                //eturn $this->db_connection;

            }catch(Exception $e){
                
                echo "el error es: " . $e->getLine();

                //show_data($e);
            }
        }

    }

?>