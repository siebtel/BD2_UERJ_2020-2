<?php
    require_once "header.php";
    $Users = cobranca_usuarios();
    
    ?>
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