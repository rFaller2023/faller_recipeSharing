<?php
include '../dbconnect/database.php';

$new = new Db();

$new->db_connect();
echo $new->db_connect();
?>