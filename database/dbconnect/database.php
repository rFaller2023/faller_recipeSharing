<?php

class Db{
    protected $conn;
    public $dbname = 'recipe'
;
    public function db_connect() {
        $this->conn =new mysqli('localhost', 'root', '', $this->dbname);
       if($this->conn) {
            return  json_encode(
                [
                'message'=> 'Database is Succesfully created!'
                ]
                );
       }
    }
}
