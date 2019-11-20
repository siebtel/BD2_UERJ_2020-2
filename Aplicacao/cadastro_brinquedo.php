<?php
include_once "crud.php";
    //var_dump($_POST);
    cadastrarBrinquedo($_POST['Cod'], $_POST['Preco'], $_POST['Nome']);
    header("Location: brinquedos.php")
?>