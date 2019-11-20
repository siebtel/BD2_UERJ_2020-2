<?php
include_once "crud.php";
removerCliente($_GET['cpf']);

header('Location: users.php');

?>