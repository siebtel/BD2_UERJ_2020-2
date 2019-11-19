<?php
//var_dump($_POST);
include_once "crud.php";
cadastrarTelefoneFunc($_POST['cpf'], $_POST['telefone']);
header("Location: update_funcionario.php?cpf=".$_POST['cpf']);
?>
