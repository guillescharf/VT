<?php
    include_once('./clases/_log.php');
    require_once('./clases/_query.php');
    
    date_default_timezone_set('America/Argentina/Mendoza');
    define('ESTADO_ACTIVO',1);
    define('ESTADO_INACTIVO', 0);
    
    //Configuraciones de la BBDD
    define('DB_HOST', 'localhost');
    define('DB_USER','VT_admin');
    define('DB_PASS','juu]](L5bkBt9!z*');
    define('DB_NAME','VerticalTraining');
 
    function show_data($data){
        if(is_array($data)){
            foreach($data as $key=>$value){
                if(is_array($data)){                    
                    echo "<h3>". $key . " =>> " . $value . "</h3>";
                }
            }
        }else{            
            var_dump($data);
        }
    }
?>