<?php
    require_once "header.php";
    $Users = listar_usuarios();
    
?>
    <div class="jumbotron text-center">
    <h1>Lista de clientes</h1>
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
    foreach($Users as $Usuario){
?>
    <tr>
      <th scope="row"><?=str_pad($Usuario['CPF'], 11, 0, STR_PAD_LEFT)?></th>
      <td><?=$Usuario['Nome']?></td>
      <td><a class="btn btn-primary" href=<?="update_user.php?cpf=".$Usuario['CPF']?> role="button">Edit</a></td>
    </tr>
<?php
    }
?>
    </tbody>
    </table>

<?php
    require_once "footer.php";
?>