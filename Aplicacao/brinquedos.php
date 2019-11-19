<?php
    require_once "header.php";
    $brinquedos = listar_brinquedos();
    
?>
    <div class="jumbotron text-center">
    <h1>Lista de brinquedos</h1>
    </div>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nome</th>
            <th scope="col">Preco</th>
            <th scope="col">#</th>
        </tr>
    </thead>
    <tbody>
<?php
    foreach($brinquedos as $brinquedo){
?>
    <tr>
      <th scope="row"><?=$brinquedo['Cod_brinquedo']?></th>
      <td><?=$brinquedo['Nome']?></td>
      <td><?=$brinquedo['Preco']?></td>
      <td><a class="btn btn-primary" href=<?="update_brinquedo.php?cod=".$brinquedo['Cod_brinquedo']?> role="button">Edit</a></td>
    </tr>
<?php
    }
?>
    </tbody>


<?php
    require_once "footer.php";
?>