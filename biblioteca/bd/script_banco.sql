CREATE DATABASE basemodaslm;

USE basemodaslm;

CREATE TABLE cliente(
cod_cliente int(11) auto_increment not null,
nome varchar(60) not null,
email varchar(60) not null,
senha varchar(60) not null,
cpf varchar(11) not null,
dataNasc date not null,
sexo varchar(60) not null,
tipousuario varchar(5) not null,
PRIMARY KEY (cod_cliente)
);


CREATE TABLE endereco(
idEndereco int(11) auto_increment not null,
cod_cliente int(11) not null,
logradouro varchar(50) not null,
numero varchar(7) not null,
complemento varchar(60) not null,
bairro varchar(60) not null,
cidade varchar(60) not null,
cep varchar(10) not null,
PRIMARY KEY (idEndereco),
FOREIGN KEY (cod_cliente) REFERENCES cliente (cod_cliente)
ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE log_produto(
id_log int(11) auto_increment not null,
tabela varchar(45) not null,
usuario varchar(45) not null,
data_hora DATETIME not null,
acao varchar(45) not null,
dados varchar(1000) not null,
PRIMARY KEY (id_log)
);

CREATE TABLE cupom(
id_cupom int(11) auto_increment not null,
nomeCupom varchar(60) not null,
desconto int(11) not null,
PRIMARY KEY (id_cupom)
);

CREATE TABLE categoria(
cod_categoria INT not null auto_increment,
nome VARCHAR(50) NOT NULL,
primary key(cod_categoria)
);

CREATE TABLE forma_de_pagamento(
cod_formadepagamento INT not null auto_increment,
descricao VARCHAR(50) NOT NULL,
primary key(cod_formadepagamento)
);

CREATE TABLE produto(
cod_produto INT(11) unsigned auto_increment NOT NULL,
cod_categoria INT not null,
preco DOUBLE(10,2) NOT NULL,
nome VARCHAR(30) NOT NULL,
descricao VARCHAR(60) NOT NULL,
imagem VARCHAR(60) NOT NULL,
estoque_minimo INT(11),
estoque_maximo INT(11),
PRIMARY KEY(cod_produto),
FOREIGN KEY (cod_categoria) REFERENCES categoria (cod_categoria)
ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE estoque(
idestoque INT(11) unsigned auto_increment NOT NULL,
cod_produto INT(11) unsigned NOT NULL,
quantidade INT(11),
PRIMARY KEY(idestoque),
FOREIGN KEY (cod_produto) REFERENCES produto (cod_produto)
ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE pedido(
id_pedido INT(11) unsigned auto_increment NOT NULL,
cod_cliente INT(11) NOT NULL,
cod_formadepagamento INT NOT NULL,
logradouro varchar(50) not null,
datacompra DATE NOT NULL,
total DOUBLE,
PRIMARY KEY(id_pedido),
FOREIGN KEY (cod_cliente) REFERENCES cliente (cod_cliente)
ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (cod_formadepagamento) REFERENCES forma_de_pagamento (cod_formadepagamento)
ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (logradouro) REFERENCES endereco (logradouro)
ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE pedido_produto(
cod_produto INT(11) unsigned NOT NULL,
id_pedido INT(11) unsigned NOT NULL,
quantidade INT(11) NOT NULL,
FOREIGN KEY (cod_produto) REFERENCES produto (cod_produto)
ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (id_pedido) REFERENCES pedido (id_pedido)
ON DELETE CASCADE ON UPDATE CASCADE
);

-- admin

INSERT INTO cliente VALUES (24,"Modas LM","modaslm@gmail.com","123","50366664883",'2003-06-09',"F","admin");
INSERT INTO cliente VALUES (28,"Maria","maria@gmail.com","123","50388664883",'2002-07-05',"F","user");

-- TRIGGER

-- diminuir estoque 

DROP TRIGGER IF EXISTS tgr_diminuiestoque;
DELIMITER $$ 
CREATE TRIGGER tgr_diminuiestoque
AFTER INSERT ON itemvenda 
FOR EACH ROW 
BEGIN 
update produto set produto.Quantidade = produto.Quantidade- New.Quantidade 
where produto.codproduto = new.codproduto; 
END $$ 
DELIMITER ;

-- restaura estoque

DROP TRIGGER IF EXISTS tgr_restauraestoque;
DELIMITER $$ 
CREATE TRIGGER tgr_restauraestoque
AFTER DELETE ON itemvenda 
FOR EACH ROW 
BEGIN 
update produto set produto.Quantidade = produto.Quantidade+ Old.Quantidade 
where produto.codproduto = Old.codproduto; 
END $$ 
DELIMITER ;

-- cancela venda 

DROP TRIGGER IF EXISTS tr_cancelvenda;
DELIMITER $$ 
CREATE TRIGGER tgr_cancelvenda
BEFORE INSERT ON venda 
FOR EACH ROW 
BEGIN 
IF(New.DataVenda != CURDATE())THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Data de Venda inválida!";
END IF;
END $$ 
DELIMITER ;


-- remover itemVenda

DROP PROCEDURE IF EXISTS remover_itemvenda;
DELIMITER $$
CREATE PROCEDURE remover_itemvenda(IN codvenda INT(10), codproduto INT(10), quantidade INT(10))
BEGIN
IF(codvenda != 0)AND(codProduto != 0)AND(quantidade != 0)THEN
DELETE FROM itemvenda WHERE codVenda = codvenda AND codProduto = codproduto;
ELSE
SELECT "Deu erro" AS Msg;
END IF;
END $$ 
DELIMITER ;


-- ARRUMAR 

DROP PROCEDURE IF EXISTS cadastrar_pedido ;
DELIMETER $$

CREATE PROCEDURE cadastrar_pedido(IN idCliente INT(10), codPagamento INT(10), codEndereco)
BEGIN
IF(idCliente != 0)AND(codPagamento != 0)AND(quanti != 0)THEN
INSERT INTO pedido (cod_cliente, cod_formadepagamento, idEndereco, datacompra)
. VALUES(idCliente, codPagamento, codEndereco, CURDATE())
ELSE
SELECT "Estoque insuficiente" AS Msg;
END IF;
ELSE
SELECT "Informe valores válidos" AS Msg;
END IF;
END $$ 
DELIMITER ;

DROP TRIGGER IF EXISTS inserir_pedido_produto;

DELIMITER $$
CREATE TRIGGER inserir_pedido_produto
AFTER INSERT ON pedido
FOR EACH ROW
BEGIN
SET @RESUL = CONCAT(New.codProduto, ' # ',New.descricao, ' # ',New.quantidade);
INSERT INTO pedido_produto VALUES(NULL, NOW(), CURRENT_USER(), "insert", " ", @RESUL); --cod_produto, id_pedido, quantidade
END $$ 
DELIMITER;