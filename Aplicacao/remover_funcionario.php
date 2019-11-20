<?php
include_once "crud.php";
removerFuncionario($_GET['cpf']);

header('Location: funcionarios.php');

?>