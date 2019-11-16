<?php
    require_once "header.php";
    $Users = listar_usuarios();
    
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
    foreach($Users as $Usuario){
?>
    <tr>
      <th scope="row"><?=$Usuario['CPF']?></th>
      <td><?=$Usuario['Nome']?></td>
      <td><a class="btn btn-primary" href=<?="update_user.php?cpf=".$Usuario['CPF']?> role="button">Edit</a></td>
    </tr>
<?php
    }
?>
    </tbody>


<?php
    require_once "footer.php";
?>