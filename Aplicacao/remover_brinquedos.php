<?php
include_once "crud.php";
removerBrinquedo($_GET['cod']);
header('Location: brinquedos.php');

?>