create database bd1;

use bd1;

CREATE TABLE Cliente (
  CPF INT NOT NULL PRIMARY KEY,
  Nome VARCHAR(45) NOT NULL,
  Endereco VARCHAR(100) NOT NULL
);

CREATE TABLE Brinquedos (
  Cod_brinquedo INT NOT NULL PRIMARY KEY,
  Preco INT(10) NOT NULL,
  Nome VARCHAR(45) NOT NULL
);

CREATE TABLE Funcionario (
  CPF INT NOT NULL PRIMARY KEY,
  Nome VARCHAR(45) NOT NULL,
  Endereco VARCHAR(45) NOT NULL
);

CREATE TABLE Funcionario_Brinquedos (
  Funcionario_CPF INT NOT NULL,
  Brinquedos_Cod_brinquedo INT NOT NULL,
  CONSTRAINT pk_Funcionario_Brinquedos PRIMARY KEY (Funcionario_CPF, Brinquedos_Cod_brinquedo),
  CONSTRAINT fk_Funcionario_CPF FOREIGN KEY (Funcionario_CPF) REFERENCES Funcionario(CPF),
  CONSTRAINT fk_Brinquedos_Cod_brinquedo_funcionarios  FOREIGN KEY (Brinquedos_Cod_brinquedo) REFERENCES Brinquedos(Cod_brinquedo)
);

CREATE TABLE Cartao_cobranca (
  Data DATE NOT NULL,
  Cliente_CPF INT NOT NULL,
  CONSTRAINT pk_Cartao_cobranca PRIMARY KEY (Data, Cliente_CPF),
  CONSTRAINT fk_Cliente_CPF FOREIGN KEY (Cliente_CPF) REFERENCES Cliente(CPF)
);

CREATE TABLE Cartao_cobranca_brinquedos (
  Cartao_cobranca_Data DATE NOT NULL,
  Cartao_cobranca_Cliente_CPF INT NOT NULL,
  Brinquedos_Cod_brinquedo INT NOT NULL,
  Hora TIME NOT NULL,
  CONSTRAINT pk_Cartao_cobranca_brinquedos PRIMARY KEY (Cartao_cobranca_Data, Cartao_cobranca_Cliente_CPF, Brinquedos_Cod_brinquedo, Hora),
  CONSTRAINT fk_Cartao_cobranca_Data FOREIGN KEY (Cartao_cobranca_Data)  REFERENCES Cartao_cobranca(Data),
  CONSTRAINT fk_Cartao_cobranca_Cliente_CPF FOREIGN KEY (Cartao_cobranca_Cliente_CPF) REFERENCES Cartao_cobranca(Cliente_CPF),
  CONSTRAINT fk_Brinquedos_Cod_brinquedo_cartao_cobranca FOREIGN KEY (Brinquedos_Cod_brinquedo) REFERENCES Brinquedos(Cod_brinquedo)
);

CREATE TABLE Telefones_funcionario (
  Telefone INT NOT NULL,
  Funcionario_CPF INT NOT NULL,
  CONSTRAINT pk_Telefones_funcionario PRIMARY KEY (Telefone, Funcionario_CPF),
  CONSTRAINT fk_Funcionario_CPF_tel FOREIGN KEY (Funcionario_CPF) REFERENCES Funcionario(CPF)
);

CREATE TABLE Telefones_cliente (
  Telefone INT NOT NULL,
  Cliente_CPF INT NOT NULL,
  CONSTRAINT pk_Telefones_cliente PRIMARY KEY (Telefone, Cliente_CPF),
  CONSTRAINT fk_cliente_cpf_tel FOREIGN KEY (Cliente_CPF) REFERENCES Cliente(CPF)
);