<?php
require_once "header.php";
?>
<div class="jumbotron text-center">
    <h1>Cadastro de funcionarios</h1>
</div>
<div class="h4" style="margin: 25px 0 25px 0;">
    Dados
</div>
<form method="post" action="cadastro_funcionario.php">
    <div class="form-row">
        <div class="col">
            <label for="Nome">Nome</label>
            <input type="text" id="Nome" name="Nome" class="form-control">
        </div>
        <div class="col">
            <label for="cpf">CPF</label>
            <input type="number" class="form-control" id="cpf" name="CPF" class="form-control">
        </div>
    </div>
    <div class="form-group">
    <label for="endereco">Endereco</label>
    <input type="text" class="form-control" id="endereco" name="Endereco">
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
<?php
require_once "footer.php";
?>