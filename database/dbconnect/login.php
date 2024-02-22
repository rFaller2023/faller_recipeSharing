<?php
include'../migrations/users.php';
$new = new Users();
$new->TableCreate();
echo $new->login($_POST);
?>