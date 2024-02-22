<?php
include'../migrations/users.php';
$new = new Users();
echo $new->TableCreate();
$new->Register($_POST);

?>