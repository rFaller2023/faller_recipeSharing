<?php
include '../dbconnect/database.php';

class Users extends Db{
    public $tableName ='users';

    public function TableCreate() {
        $this->db_connect();

        $created = $this->conn->query("CREATE TABLE IF NOT EXISTS $this->tableName
        (
            id int auto_increment primary key,
            first_name varchar(255) not null,
            last_name varchar(255) not null,
            email varchar(255)not null UNIQUE,
            password varchar(255) not null
            )engine=InnoDB
        
        ");
        if ($created) {
            return json_encode(['message' => 'table Created']);
    }
}  
    public function Register($data) {
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $email = $data['email'];
        $password = $data['password'];

        $inserted = $this->conn->query("INSERT INTO $this->tableName(first_name, last_name, email, password)
        VALUES('$first_name', '$last_name', '$email', '$password') ");
       if($inserted){
        header('Location:http://localhost/faller_recipeSharing/public/css/dashboard.html');
       }

    }
    public function Login($data) {
        $email = $data['email'];
        $password = $data['password'];

        $int = $this->conn->query("SELECT * FROM $this->tableName WHERE email = '$email' AND password = '$password' ");

        if($int->num_rows > 0){
            header('Location:http://localhost/faller_recipeSharing/public/css/dashboard.html');
        }else{
            return json_encode([
                'message'=> 'Email is invalid'
            ]);
        }
    }
}

?>