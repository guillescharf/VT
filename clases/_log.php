<?php

class log{
    private $description;
    private $origin_ip;
    private $date;
    private $time;

    public function __construct($description = ''){
        $this->description = $description;
        $this->date = date('Ymd');
        $this->time = date("H:i:s");
        $this->origin_ip = $_SERVER['REMOTE_ADDR'];
        //var_dump($this);
    }
}
?>