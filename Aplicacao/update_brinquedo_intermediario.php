<?php
include_once "crud.php";
    //var_dump($_POST);
    updateBrinquedo($_POST['Cod'], $_POST['Nome'], $_POST['Preco']);
    header("Location: brinquedos.php")
?>