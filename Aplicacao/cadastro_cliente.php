<?php
include_once "crud.php";
    //var_dump($_POST);
    cadastrarUser($_POST['CPF'], $_POST['Nome'], $_POST['Endereco']);
    header("Location: users.php")
?>