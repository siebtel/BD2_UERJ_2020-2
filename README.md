# Trabalho da disciplina banco de dados I - UERJ 2019/2

## Integrantes

* Dennis Ribeiro Paiva - 201610050611
* Paulo Victor Coelho - 201610049711
* Vinicius Sathler - 201610051611
  
## Introdução

Neste trabalho serão apresentados todos os passos de modelagem de um projeto básico de banco de dados, da descrição do minimundo até sua implementação funcional.
O tema abordado será o gerenciamento do cartão de visita de um visitante em um parque de diversões.

## Minimundo

O parque de diversões 'SmashLand' é um parque moderno mas muito ganancioso. Seus visitantes recebem na entrada um cartão digital que deve ser apresentado na entrada de cada brinquedo. Cada brinquedo possui um nome e código de identificação. Sendo a gerência do parque muito gananciosa, cada cartão de visitante deve registrar a cobrança de entrada nos brinquedos cada vez que for utilizado, ou seja, o visitante paga cada vez que for usar um brinquedo. Os funcionários deste parque também são muito ocupados, tendo muitas vezes que trabalhar em mais de um brinquedo, sendo que cada brinquedo pode precisar de um ou mais funcionários. Para estimular uma concorrência saudável entre seus funcionários, a gerência do parque paga um adicional de dois por cento do dinheiro arrecadado em cada brinquedo para cada funcionario responsável por ele. A fim de evitar fraudes, tanto os clientes quanto os funcionários devem ser registrados de acordo com o seu nome completo, CPF, endereço e telefone(s) para contato. Para disfarçar sua ganância o parque permite que cada cartão sejá válido por um dia inteiro. Ao final do dia o visitante deve pagar o valor acumulado de todos os brinquedos que visitou.
</br>
## Modelo conceitual

### Diagrama entidade-relacionamento

<img src="ModeloConceitual.png"></img>

### Restrições de Domínio

<ul>
    <li>Visitante:<ul><li>CPF: Número inteiro de onze dígitos.</li><li>Nome: String de no máximo 45 caracteres.</li><li>Endereço: String de no máximo 100 caracteres.</li><li>Telefone: Numero inteiro formado por oito ou nove dígitos.</li>
    </ul>
    </li>
    <li>Cartão:<ul><li>Data: Data no formato aaaa-mm-dd de acordo com o tipo DATE da linguagem mySQL.</li></ul></li>
    <li>Brinquedo:<ul><li>Cod_brinquedo: Numero inteiro de cinco dígitos.</li><li>Nome: String de no máximo 45 caracteres.</li><li>Preço: Número real positivo com duas casas decimais de precisão.</li></ul></li>
    <li>Registra (Cartão-Brinquedo):<ul><li> Hora: registro de hora no formato hh-mm-ss de acordo com o tipo TIME da linguagem mySQL.</li></ul></li>
    <li>Funcionário:<ul><li>CPF: Número inteiro de onze dígitos.</li><li>Nome: String de no máximo 45 caracteres.</li><li>Endereço: String de no máximo 100 caracteres.</li><li>Telefone: Numero inteiro formado por oito ou nove dígitos.</li>
</ul></ul>

</br>
## Modelo Relacional

### Descrição

* **Chave primária**<br/>
* _Chave estrangeira_
<br><br><br>
* Cliente (**CPF**, Nome, Endereço)
* Telefones_cliente (**Telefone**, **_Cliente_CPF_**)
* Cartao_Cobrança (**Data**, _**Cliente_CPF**_)
* Brinquedo (**Cod_brinquedo**, Nome, Preço)
* Cartao_cobranca_brinquedo (**Hora**, _**Cartao_Cobrança_Data**_, _**Cartao_Cobranca_Cliente_CPF**_, _**Brinquedo_Cod_brinquedo**_)
* Funcionario (**CPF**, Nome, Endereço)
* Telefones_funcionario (**Telefone**, **_Funcionario_CPF_**)
* Funcionario_brinquedo (_**Funcionario_CPF**_, _**Brinquedo_Cod_brinquedo**_)
  
<p>
    Sabendo-se que cada Cliente possui nenhum ou vários cartões, mas que cada cartão está vinculado a obrigatoriamente um e apenas um cliente, foi adicionada uma coluna extra na tabela cartão para referenciar o cliente ao qual ele está asssociado
</p>
<p>
    Como cada cartão de cobrança pode registrar nenhum ou vários brinquedos, e cada brinquedo pode estar registrado em nenhum ou vários cartões, criou-se uma nova tabela para relação
</p>
<p>
    Cada funcionário pode trabalhar em nenhum ou mais de um brinquedo, e cada brinquedo possui entre um e varios funcionários. De maneira análoga a relação brinquedo-cartão foi criada uma nova tabela
</p>

### Diagrama

<img src="ModeloRelacional.png"></img>

### Restrições Semânticas
<ol>
    <li>
        Cada funcionário não pode receber menos do que o salário minímo, estipulado em $sc 500,00 
    </li>
    <li>
        O visitante paga por cada brinquedo visitado, mas não pode pagar menos de $sc 100,00
    </li>
</ol>

</br>

## Visões

### Visão 1

Criada com o objetivo de dispor a tabela de preços dos brinquedos do parque, enquanto suprime do usuário o código do brinquedo.

```sql
CREATE OR REPLACE VIEW preco_brinquedo
AS
    SELECT Nome, Preco
    FROM Brinquedos
    ORDER BY Nome;
```

### Visão 2

Lista meios de contato com os funcionários do parque, suprimindo informações pessoais como o CPF.

```sql
CREATE OR REPLACE VIEW contatos_funcionario
AS 
    SELECT nome, endereco, telefone
    FROM funcionario INNER JOIN Telefones_funcionario
    ON cpf = Funcionario_CPF;
```

### Visão 3

Lista funcionários e seus respectivos brinquedos, ocultando informações relevantes apenas ao banco de dados (CPF e Código do Brinquedo)

```sql
CREATE OR REPLACE VIEW funcionarios_brinquedo
AS 
    SELECT b.nome AS nome_do_brinquedo, f.nome AS nome_funcionario
    FROM funcionario f, funcionario_brinquedos, brinquedos b
    WHERE cpf = Funcionario_CPF AND cod_brinquedos = brinquedos_cod_brinquedo;
```

## Funções



## Triggers (Gatilho)

## Índice

### Exemplo


