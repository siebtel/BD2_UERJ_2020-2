<?php
include_once "crud.php";
//var_dump($_GET);
removerTelefoneUser($_GET['cpf'], $_GET['tel']);
header("Location: update_user.php?cpf=".$_GET['cpf']);
?>