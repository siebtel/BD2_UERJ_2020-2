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

    ###CLIENTES###
    function selectUser($id){
        $link = abreConexao();
        $query = "select * from Cliente where CPF = $id";
        $result = mysqli_query($link, $query);
        $user = array();
        while($row = mysqli_fetch_array($result)) {
            array_push($user, $row);
        }
        return $user;
    }

    function selectTelsFromUser($id){
        $link = abreConexao();
        $query = "select Telefone from telefones_cliente where Cliente_CPF = $id";
        $result = mysqli_query($link, $query);
        $telefones = array();
        while($row = mysqli_fetch_array($result)) {
            array_push($telefones, $row);
        }
        return $telefones;
    }

    function updateUser($id, $nome, $end){
        $link = abreConexao();
        $query = "update Cliente set Nome='$nome', Endereco='$end' where CPF = $id ";
        if(mysqli_query($link, $query)) {
            return true;
        }
        return false;
    }

    function cadastrarTelefoneUser($id, $tel){
        $link = abreConexao();
        $query = "insert into telefones_cliente values ($tel, $id)";
        if(mysqli_query($link, $query)) {
            return true;
        }
        return false;
    }

    function removerTelefoneUser($id, $tel){
        $link = abreConexao();
        $query = "DELETE FROM telefones_cliente WHERE Telefone = $tel AND Cliente_CPF = $id";
        if(mysqli_query($link, $query)) {
            return true;
        }
        return false;
    }

    function cadastrarUser($cpf, $nome, $end){
        $link = abreConexao();
        $query = "INSERT INTO Cliente VALUES($cpf, '$nome', '$end')";
        if(mysqli_query($link, $query)) {
            return true;
        }
        return false;
    }

    function removerCliente($id){
        $link = abreConexao();
        $query = "DELETE FROM cartao_cobranca_brinquedos WHERE Cartao_cobranca_Cliente_CPF = $id;
                    DELETE FROM cartao_cobranca WHERE Cliente_CPF = $id;
                    DELETE FROM telefones_cliente WHERE Cliente_CPF = $id;
                    DELETE FROM cliente WHERE CPF = $id;";
        //var_dump($query);
        //die();
        if(mysqli_multi_query($link, $query)) {
            return true;
        }
        return false;

    }
    ###FUNCIONARIO###
    function selectFunc($id){
        $link = abreConexao();
        $query = "select * from Funcionario where CPF = $id";
        $result = mysqli_query($link, $query);
        $user = array();
        while($row = mysqli_fetch_array($result)) {
            array_push($user, $row);
        }
        return $user;
    }

    function selectTelsFromFunc($id){
        $link = abreConexao();
        $query = "select Telefone from telefones_funcionario where Funcionario_CPF = $id";
        $result = mysqli_query($link, $query);
        $telefones = array();
        while($row = mysqli_fetch_array($result)) {
            array_push($telefones, $row);
        }
        return $telefones;
    }

    function updateFunc($id, $nome, $end){
        $link = abreConexao();
        $query = "update Funcionario set Nome='$nome', Endereco='$end' where CPF = $id ";
        if(mysqli_query($link, $query)) {
            return true;
        }
        return false;
    }

    function cadastrarTelefoneFunc($id, $tel){
        $link = abreConexao();
        $query = "insert into telefones_funcionario values ($tel, $id)";
        if(mysqli_query($link, $query)) {
            return true;
        }
        return false;
    }

    function removerTelefoneFunc($id, $tel){
        $link = abreConexao();
        $query = "DELETE FROM telefones_funcionario WHERE Telefone = $tel AND Funcionario_CPF = $id";
        if(mysqli_query($link, $query)) {
            return true;
        }
        return false;
    }

    function brinquedosFuncionario($id){
        $link = abreConexao();
        $query = "select A.Brinquedos_Cod_brinquedo as Cod_brinquedo, B.nome as nome 
                    from funcionario_brinquedos A, brinquedos B where 
                    A.Funcionario_CPF=$id and A.Brinquedos_Cod_brinquedo = B.Cod_brinquedo";
        $result = mysqli_query($link, $query);
        $brinquedos = array();
        while($row = mysqli_fetch_array($result)) {
            array_push($brinquedos, $row);
        }
        return $brinquedos;
    }

    function cadastrarBrinquedoFunc($id, $cod){
        $link = abreConexao();
        $query = "insert into funcionario_brinquedos values ($id, $cod)";
        if(mysqli_query($link, $query)) {
            return true;
        }
        return false;
    }

    function removerBrinquedoFunc($id, $cod){
        $link = abreConexao();
        $query = "DELETE FROM funcionario_brinquedos WHERE Funcionario_CPF = $id AND Brinquedos_Cod_brinquedo = $cod";
        if(mysqli_query($link, $query)) {
            return true;
        }
        return false;
    }

    function cadastrarFuncionario($cpf, $nome, $end){
        $link = abreConexao();
        $query = "INSERT INTO Funcionario VALUES($cpf, '$nome', '$end')";
        if(mysqli_query($link, $query)) {
            return true;
        }
        return false;
    }

    function removerFuncionario($id){
        $link = abreConexao();
        $query = "DELETE FROM Funcionario_brinquedos WHERE Funcionario_CPF = $id;
                    DELETE FROM telefones_funcionario WHERE Funcionario_CPF = $id;
                    DELETE FROM Funcionario WHERE CPF = $id;";
        if(mysqli_multi_query($link, $query)) {
            return true;
        }
        return false;

    }

    ### Brinquedos ###

    function selectBrinquedo($id){
        $link = abreConexao();
        $query = "select * from Brinquedos where Cod_brinquedo = $id";
        $result = mysqli_query($link, $query);
        $brq = array();
        while($row = mysqli_fetch_array($result)) {
            array_push($brq, $row);
        }
        return $brq;
    }

    function updateBrinquedo($id, $nome, $preco){
        $link = abreConexao();
        $query = "update Brinquedos set Nome='$nome', Preco=$preco where Cod_brinquedo = $id ";
    
        if(mysqli_query($link, $query)) {
            return true;
        }
        return false;
    }

    function cadastrarBrinquedo($cod, $preco, $nome){
        $link = abreConexao();
        $query = "INSERT INTO Brinquedos VALUES($cod, $preco, '$nome')";
        if(mysqli_query($link, $query)) {
            return true;
        }
        return false;
    }

    function removerBrinquedo($id){
        $link = abreConexao();
        $query = "DELETE FROM Funcionario_brinquedos WHERE Brinquedos_Cod_brinquedo = $id;
                    DELETE FROM Brinquedos WHERE Cod_brinquedo = $id;";
        if(mysqli_multi_query($link, $query)) {
            return true;
        }
        return false;

    }

