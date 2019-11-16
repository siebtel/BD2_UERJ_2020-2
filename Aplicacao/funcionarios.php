<?php
    require_once "header.php";
    $funcionarios = listar_funcionarios();
    
?>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">CPF</th>
            <th scope="col">Nome</th>
            <th scope="col">#</th>
        </tr>
    </thead>
    <tbody>
<?php
    foreach($funcionarios as $funcionario){
?>
    <tr>
      <th scope="row"><?=$funcionario['CPF']?></th>
      <td><?=$funcionario['Nome']?></td>
      <td><a class="btn btn-primary" href=<?="update_funcionario.php?cpf=".$funcionario['CPF']?> role="button">Edit</a></td>
    </tr>
<?php
    }
?>
    </tbody>


<?php
    require_once "footer.php";
?>