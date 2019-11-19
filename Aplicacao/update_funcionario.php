<?php
require_once "header.php";
$user = selectFunc($_GET['cpf']);
$telefones = selectTelsFromFunc($_GET['cpf']);
$brinquedos = brinquedosFuncionario($_GET['cpf']);
?>
<div class="jumbotron text-center">
    <h1>Dados do funcionario</br> <?=$user[0]['Nome']?></h1>
</div>
<div class="h4" style="margin: 25px 0 25px 0;">
    Dados
</div>
<form method="post" action="update_funcionario_intermediario.php">
    <div class="form-row">
        <div class="col">
            <label for="Nome">Nome</label>
            <input type="text" id="Nome" name="Nome" class="form-control" value=<?="\"".$user[0]["Nome"]."\""?>>
        </div>
        <div class="col">
            <label for="cpf">CPF</label>
            <input type="number" readonly class="form-control-plaintext" id="cpf" name="CPF" class="form-control" value=<?="\"".$user[0]["CPF"]."\""?>>
        </div>
    </div>
    <div class="form-group">
    <label for="endereco">Endereco</label>
    <input type="text" class="form-control" id="endereco" name="Endereco" value=<?="\"".$user[0]["Endereco"]."\""?>>
  </div>
  <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
<table class="table" style="margin-top:50px;">
    <thead>
        <tr>
            <th scope="col"><h4>Telefones</h4></th>
            <th scope="col">#</th>
        </tr>
    </thead>
    <tbody>
<?php
    foreach($telefones as $tel){
?>
    <tr>
      <td><?= $tel['Telefone']?></th>
      <td><a class="btn btn-primary" href=<?="remove_func_tel.php?tel=".$tel['Telefone']."&cpf=".$_GET['cpf']?> role="button">Delete</a></td>
    </tr>
<?php
    }
?>
</tbody>
</table>
<div class="h4" style="margin: 50px 0 25px 0;">
    Cadastro de telefones
</div>
<form method="post" action="cadastro_func_tel.php">
<div class="form-row">
        <div class="col">
            <label for="telefone">Telefone</label>
            <input type="number" id="telefone" name="telefone" class="form-control">
        </div>
        <div class="col" style="padding-top:32px;">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
        <div class="form-group d-none">
            <label for="cpf">Endereco</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value=<?=$_GET['cpf']?>>
        </div>
    </div>
</form>
<table class="table" style="margin-top:50px;">
    <thead>
        <tr>
            <th scope="col"><h4>Brinquedos</h4></th>
            <th scope="col">#</th>
        </tr>
    </thead>
    <tbody>
<?php
    foreach($brinquedos as $brq){
?>
    <tr>
      <td><?= $brq['nome']?></th>
      <td><a class="btn btn-primary" href=<?="remove_func_brq.php?tel=".$brq['Cod_brinquedo']."&cpf=".$_GET['cpf']?> role="button">Delete</a></td>
    </tr>
<?php
    }
?>
</tbody>
</table>
<div class="h4" style="margin: 50px 0 25px 0;">
    Cadastro de brinquedos
</div>
<form method="post" action="cadastro_func_brq.php">
<div class="form-row">
        <div class="col">
            <label for="cod">Codigo do brinquedo</label>
            <input type="number" id="cod" name="cod" class="form-control">
        </div>
        <div class="col" style="padding-top:32px;">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
        <div class="form-group d-none">
            <label for="cpf">Endereco</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value=<?=$_GET['cpf']?>>
        </div>
    </div>
</form>
<?php
require_once "footer.php";
?>