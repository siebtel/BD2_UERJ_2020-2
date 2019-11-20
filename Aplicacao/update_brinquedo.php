<?php
require_once "header.php";
$brq = selectBrinquedo($_GET['cod']);
?>
<div class="jumbotron text-center">
    <h1>Dados do brinquedo</br> <?=$brq[0]['Nome']?></h1>
</div>
<div class="h4" style="margin: 25px 0 25px 0;">
    Dados
</div>
<form method="post" action="update_brinquedo_intermediario.php">
    <div class="form-row">
        <div class="col">
            <label for="Nome">Nome</label>
            <input type="text" id="Nome" name="Nome" class="form-control" value=<?="\"".$brq[0]["Nome"]."\""?>>
        </div>
        <div class="col">
            <label for="cod">Codigo de identificação</label>
            <input type="number" readonly class="form-control-plaintext" id="Cod" name="Cod" class="form-control" value=<?="\"".$brq[0]["Cod_brinquedo"]."\""?>>
        </div>
    </div>
    <div class="form-group col-6" style="padding-left: 0px; padding-right: 5px;">
    <label for="endereco">Preco</label>
    <input type="number" class="form-control" id="Preco" name="Preco" value=<?="\"".$brq[0]["Preco"]."\""?>>
  </div>
  <button type="submit" class="btn btn-primary">Atualizar</button>
  <a class="btn btn-primary" href=<?="remover_brinquedos.php?cod=".$brq[0]['Cod_brinquedo']?> role="button">Remover</a>
</form>

<?php
require_once "footer.php";
?>