<?php
    require_once('./clases/_DBC.php');

    class query extends connection{

        public $data = array();
        

        public function __construct($sql, $params = array()){

            parent::__construct();

            $stmt = $this->db_connection->prepare($sql);   

            if($stmt->execute($params)){

                $this->data = $stmt->fetchAll(PDO::FETCH_OBJ);

                return true;

            }else{
                
                return false;
                
            }

        }

        public function newID(){

            return $this->db_connection->lastInsertId();

        }

    }

?>