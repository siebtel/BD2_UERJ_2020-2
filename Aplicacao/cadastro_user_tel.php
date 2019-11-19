<?php
//var_dump($_POST);
include_once "crud.php";
cadastrarTelefoneUser($_POST['cpf'], $_POST['telefone']);
header("Location: update_user.php?cpf=".$_POST['cpf']);
?>
