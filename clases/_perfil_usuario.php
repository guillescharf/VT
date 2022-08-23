<?php

    class perfil_usuario{
        private $nombre_clase = 'perfil_usuario';
        private $properties = array('description', 'state');
        private $id;
        private $description;
        private $state;
        private $sql;

        public function __construct(){

            $this->id = 0;

            $this->description = '';

            $this->state = ESTADO_ACTIVO;

            $this->sql = '';

        }

        public function __set($property, $value){

            if(property_exists($this, $property)){

                $this->$property = $value;

            }

        }

        public function __get($property){

            if(property_exists($this, $property)){

                return $this->$property;

            }

        }        

        private function makeParamsArray(){

            $ParamArray = array();

            foreach($this->properties as $property){

                $ParamArray[$property] = $this->$property;

            } 

            return $ParamArray;

        }        

        public function create(){

            $this->sql = "INSERT INTO $this->nombre_clase (description, state) VALUES (:description , :state)";

            $params = $this->makeParamsArray;

            $query = new query($this->sql, $params);

            if($query){

                $this->id = $query->newID();

                $log = new log("CREATE $this->nombre_clase" . json_encode($params));
            }

        }

        public function update(){

            $this->sql = "UPDATE $this->nombre_clase SET description= :description WHERE id = $this->id";
            
            $params = $this->makeParamsArray;

            $query = new query($this->sql, $params);

            if($query){

                $log = new log("UPDATE $this->nombre_clase" . json_encode($params));

            }     

        }

        public function delete(){

            $this->sql = "UPDATE $this->nombre_clase SET state = :state where id= :id";

            $params = array(':state'=> ESTADO_INACTIVO, ':id' => $this->id);

            $query = new query($this->sql, $params);     
            
            if($query){

                $log = new log("DELETE $this->nombre_clase" . json_encode($params));

            }                 

        }

        public function search(){

            $this->sql = "SELECT * FROM $this->nombre_clase WHERE state = :state";

            $params = array(':state' => ESTADO_ACTIVO);            

            if($this->id !== 0){

                $this->sql .= " AND id = :id";

                 $params[':id'] = $this->id;

            }

            $query = new query($this->sql, $params);

            if(count($query->data) == 1){
                foreach($this->properties as $property){
                    $this->$property = $query->data[0]->$property;
                }                
                
            }

            return $query->data;

        }
    } 
?>