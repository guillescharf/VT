<?php
    class objeto{
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
            }else{
                echo "No existe la propiedad";
            }
        }

        public function __get($property){

        }

        public function create(){
            $this->sql = "INSERT INTO perfil_usuario(description, state) 
                          VALUES ('". $this->description ."', ". ESTADO_ACTIVO . ")";

        }

        public function update(){
            $this->sql = "UPDATE perfil_usuario SET description='". $this->description . "', 
                                state='" . $this->state ."' WHERE id=" . $this->id;
        }

        public function delete(){
            $this->sql = "UPDATE perfil_usuario SET state = " . ESTADO_INACTIVO . "' where id= " . $this->id;
        }

        public function search(){
            $this->sql = "SELECT * FROM perfil_usuario";
            $this->sql .= ($this->id === 0)? "": " WHERE id=". $this->id;
        }
    } 
?>