<?php
    require_once "header.php";
    $funcionarios = listar_funcionarios();
    
?>
    <div class="jumbotron text-center">
    <h1>Lista de funcionarios</h1>
    </div>
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
      <th scope="row"><?=str_pad($funcionario['CPF'], 11, 0, STR_PAD_LEFT)?></th>
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