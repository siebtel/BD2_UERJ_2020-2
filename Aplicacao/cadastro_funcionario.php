<?php
include_once "crud.php";
    //var_dump($_POST);
    cadastrarFuncionario($_POST['CPF'], $_POST['Nome'], $_POST['Endereco']);
    header("Location: funcionarios.php")
?>