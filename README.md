# Trabalho da disciplina banco de dados I - UERJ 2019/2

## Integrantes

* Dennis Ribeiro Paiva - 201610050611
* Paulo Victor Coelho - 201610049711
* Vinicius Sathler - 201610051611
  
## Introdução

Neste trabalho serão apresentados todos os passos de modelagem de um projeto básico de banco de dados, da descrição do minimundo até sua implementação funcional.
O tema abordado será o gerenciamento do cartão de visita de um visitante em um parque de diversões.

## Minimundo

O parque de diversões 'OraOraLand' é um parque moderno mas muito ganancioso. Seus visitantes recebem na entrada um cartão digital que deve ser apresentado na entrada de cada brinquedo. Cada brinquedo possui um nome e código de identificação. Sendo a gerência do parque muito gananciosa, cada cartão de visitante deve registrar a cobrança de entrada nos brinquedos cada vez que for utilizado, ou seja, o visitante paga cada vez que for usar um brinquedo. Os funcionários deste parque também são muito ocupados, tendo muitas vezes que trabalhar em mais de um brinquedo, sendo que cada brinquedo pode precisar de um ou mais funcionários. Para evitar fraudes, tanto os clientes quanto os funcionários devem ser registrados de acordo com o seu nome completo, CPF, endereço e telefone(s) para contato. Para disfarçar sua ganância o parque permite que cada cartão sejá válido por um dia inteiro. Ao final do dia o visitante deve pagar o valor acumulado de todos os brinquedos que visitou.

## Modelo conceitual

<img src="ModeloConceitual.png"></img>

## Modelo Relacional

<img src="ModeloRelacional.png"></img>
