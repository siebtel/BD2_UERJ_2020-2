<?php
require_once "header.php";
?>
<div class="jumbotron text-center">
    <h1>Cadastro de brinquedos</br></h1>
</div>
<div class="h4" style="margin: 25px 0 25px 0;">
    Dados
</div>
<form method="post" action="cadastro_brinquedo.php">
    <div class="form-row">
        <div class="col">
            <label for="Nome">Nome</label>
            <input type="text" id="Nome" name="Nome" class="form-control">
        </div>
        <div class="col">
            <label for="cod">Codigo de identificação</label>
            <input type="number" class="form-control" id="Cod" name="Cod" class="form-control">
        </div>
    </div>
    <div class="form-group col-6" style="padding-left: 0px; padding-right: 5px;">
    <label for="endereco">Preco</label>
    <input type="number" class="form-control" id="Preco" name="Preco">
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<?php
require_once "footer.php";
?>