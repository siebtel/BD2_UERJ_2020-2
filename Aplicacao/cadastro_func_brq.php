<?php
//var_dump($_POST);
include_once "crud.php";
cadastrarBrinquedoFunc($_POST['cpf'], $_POST['cod']);
header("Location: update_funcionario.php?cpf=".$_POST['cpf']);
?>
