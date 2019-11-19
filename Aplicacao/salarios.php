<?php
    require_once "header.php";
    $salarios = salarios();
    
    ?>
    <div class="jumbotron text-center">
    <h1>Salarios</h1>
    </div>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Mes</th>
                <th scope="col">Salario</th>
            </tr>
        </thead>
        <tbody>
    <?php
        foreach($salarios as $row){
    ?>
        <tr>
          <td><?=$row['nome']?></td>
          <td><?=$row['mes']?></td>
          <td><?=$row['salario']?></td>
        </tr>
    <?php
        }
    ?>
        </tbody>

<?php
    require_once "footer.php";
?>