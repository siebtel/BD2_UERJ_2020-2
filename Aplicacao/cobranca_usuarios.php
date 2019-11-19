<?php
    require_once "header.php";
    $Users = cobranca_usuarios();
    
    ?>
    <div class="jumbotron text-center">
    <h1>Gastos por cliente</h1>
    </div>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Mes</th>
                <th scope="col">Valor</th>
            </tr>
        </thead>
        <tbody>
    <?php
        foreach($Users as $Usuario){
    ?>
        <tr>
          <td><?=$Usuario['Nome']?></td>
          <td><?=$Usuario['Mes']?></td>
          <td><?=$Usuario['Valor']?></td>
        </tr>
    <?php
        }
    ?>
        </tbody>

<?php
    require_once "footer.php";
?>