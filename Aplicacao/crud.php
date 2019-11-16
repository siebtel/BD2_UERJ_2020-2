<?php
    require_once 'conexao.php';
    function listar_usuarios(){
        $link = abreConexao();
        $query = "select * from cliente";
        $result = mysqli_query($link, $query);
        $arrayUsers = array();
        while($Users = mysqli_fetch_array($result)) {
            array_push($arrayUsers, $Users);
        }
        return $arrayUsers;
    }
    function cobranca_usuarios(){
        $link = abreConexao();
        $query = "SELECT CASE MONTH(A.Cartao_cobranca_data)
        WHEN 1 THEN 'Janeiro'
        WHEN 2 THEN 'Fevereiro'
        WHEN 3 THEN 'Março'
        WHEN 4 THEN 'Abril'
        WHEN 5 THEN 'Maio'
        WHEN 6 THEN 'Junho'
        WHEN 7 THEN 'Julho'
        WHEN 8 THEN 'Agosto'
        WHEN 9 THEN 'Setembro'
        WHEN 10 THEN 'Outubro'
        WHEN 11 THEN 'Novembro'
        WHEN 12 THEN 'Dezembro'
        END
        as Mes,
        C.nome as Nome, sum(B.preco) as Valor 
        FROM Cartao_cobranca_brinquedos A, Brinquedos B, Cliente C 
        WHERE A.Brinquedos_Cod_brinquedo = B.cod_brinquedo 
        AND A.Cartao_cobranca_Cliente_CPF = C.CPF 
        GROUP BY mes ,A.Cartao_cobranca_Cliente_CPF
        ORDER BY C.nome, A.Cartao_cobranca_data";
        $result = mysqli_query($link, $query);
        $arrayUsers = array();
        while($Users = mysqli_fetch_array($result)) {
            array_push($arrayUsers, $Users);
        }
        return $arrayUsers;
    }

    function listar_brinquedos(){
        $link = abreConexao();
        $query = "select * from brinquedos";
        $result = mysqli_query($link, $query);
        $arrayBrinquedos = array();
        while($Brinquedos = mysqli_fetch_array($result)) {
            array_push($arrayBrinquedos, $Brinquedos);
        }
        return $arrayBrinquedos;
    }

    function listar_funcionarios(){
        $link = abreConexao();
        $query = "select * from funcionario";
        $result = mysqli_query($link, $query);
        $arrayFuncionarios = array();
        while($Funcionarios = mysqli_fetch_array($result)) {
            array_push($arrayFuncionarios, $Funcionarios);
        }
        return $arrayFuncionarios;
    }

    function salarios(){
        $link = abreConexao();
        $query = "SELECT D.nome,
        CASE C.mes
        WHEN 1 THEN 'Janeiro'
        WHEN 2 THEN 'Fevereiro'
        WHEN 3 THEN 'Março'
        WHEN 4 THEN 'Abril'
        WHEN 5 THEN 'Maio'
        WHEN 6 THEN 'Junho'
        WHEN 7 THEN 'Julho'
        WHEN 8 THEN 'Agosto'
        WHEN 9 THEN 'Setembro'
        WHEN 10 THEN 'Outubro'
        WHEN 11 THEN 'Novembro'
        WHEN 12 THEN 'Dezembro'
        END AS mes, 
        500+sum(C.rendimento)*0.02 AS salario 
        FROM
            (SELECT A.brinquedo, A.mes, A.frequencia*B.preco AS rendimento 
            FROM
                (SELECT MONTH(Cartao_cobranca_Data) AS mes,
                Brinquedos_Cod_brinquedo AS brinquedo, 
                COUNT(Cartao_cobranca_Cliente_CPF) AS frequencia
                FROM Cartao_cobranca_brinquedos
                GROUP BY Brinquedos_Cod_brinquedo, MONTH(Cartao_cobranca_Data)) A, 
            brinquedos B
            WHERE A.brinquedo = B.cod_brinquedo) C, 
        funcionario D, funcionario_brinquedos E
        WHERE D.cpf = E.Funcionario_CPF AND E.Brinquedos_Cod_brinquedo = C.brinquedo
        GROUP BY  D.cpf, C.mes
        ORDER BY nome, C.mes";
        $result = mysqli_query($link, $query);
        $salarios = array();
        while($row = mysqli_fetch_array($result)) {
            array_push($salarios, $row);
        }
        return $salarios;
    }
    /*function salvar($prod, $foto, $quant, $price, $custo, $desc, $rev) {
        $link = abreConexao();
        $query = "insert into tb_produtos(produto, foto, quantidade, preco, custo, descricao, review) values ('$prod', '$foto', '$quant', '$price', '$custo', '$desc', '$rev')";
        if(mysqli_query($link, $query)) {
            return true;
        }
        return false;
    }
     function buscar($prod) {
        $link = abreConexao();
        $query = "select * from tb_produtos where produto like '%$prod%'";
        $result = mysqli_query($link, $query);
        $arrayProduto = array();
        while($produto = mysqli_fetch_row($result)) {
            array_push($arrayProduto, $produto);
        }
        return $arrayProduto;
    }
    function buscarId($id) {
        $link = abreConexao();
        $query = "select * from tb_produtos where id = $id";
        $result = mysqli_query($link, $query);
        if(mysqli_error($link)) {
            $_SESSION['error'] = 'falha ao gravar';
        }
        return mysqli_fetch_assoc($result);
    }
    function atualizar($prod, $foto, $quant, $price, $custo, $desc, $rev, $id) {
        $link = abreConexao();
        $query = "update tb_produtos
                    set produto = '$prod', foto = '$foto', quantidade = '$quant', preco = '$price', custo = '$custo', descricao = '$desc', review = '$rev'"
                . " where id='$id'";
                if(mysqli_query($link, $query)) {
                    return true;
                }
                return false;
    }
    function efetuarLogin($login, $senha){
        $link = abreConexao();
        $query = "select nome from tb_admins where login = '$login' and senha = '$senha'";
        $result = mysqli_query($link, $query);
        $result = mysqli_fetch_assoc($result);
        return $result;
    }*/