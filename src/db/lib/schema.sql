CREATE SCHEMA shsistema;

CREATE SEQUENCE shsistema.sqidpessoa START WITH 1 INCREMENT 1;

CREATE TABLE shsistema.tbpessoa (
	id_pessoa INTEGER NOT NULL,
	nome_pessoa VARCHAR NOT NULL,
	telefone_pessoa VARCHAR NOT NULL,
	email VARCHAR NOT NULL,
	senha VARCHAR NOT NULL
);

ALTER TABLE shsistema.tbpessoa ADD CONSTRAINT pk_tbpessoa PRIMARY KEY (id_pessoa);

--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==

CREATE SEQUENCE shsistema.sqidadministrador START WITH 1 INCREMENT 1;

CREATE TABLE shsistema.tbadministrador (
	id_administrador INTEGER NOT NULL,
	id_pessoa INTEGER NOT NULL
);

ALTER TABLE shsistema.tbadministrador ADD CONSTRAINT pk_tbadministrador PRIMARY KEY (id_administrador);

ALTER TABLE shsistema.tbadministrador
ADD CONSTRAINT fk_id_pessoa FOREIGN KEY (id_pessoa) REFERENCES shsistema.tbpessoa(id_pessoa);

--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==

CREATE SEQUENCE shsistema.sqidcliente START WITH 1 INCREMENT 1;

CREATE TABLE shsistema.tbcliente (
	id_cliente INTEGER NOT NULL,
	id_pessoa INTEGER NOT NULL
);

ALTER TABLE shsistema.tbcliente ADD CONSTRAINT pk_tbcliente PRIMARY KEY (id_cliente);

ALTER TABLE shsistema.tbcliente
ADD CONSTRAINT fk_id_pessoa FOREIGN KEY (id_pessoa) REFERENCES shsistema.tbpessoa(id_pessoa);

--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==

CREATE SEQUENCE shsistema.sqidsacola START WITH 1 INCREMENT 1;

CREATE TABLE shsistema.tbsacola (
	id_sacola INTEGER NOT NULL,
	id_cliente INTEGER NOT NULL
);

ALTER TABLE shsistema.tbsacola ADD CONSTRAINT pk_tbsacola PRIMARY KEY (id_sacola);

ALTER TABLE shsistema.tbsacola
ADD CONSTRAINT fk_id_cliente FOREIGN KEY (id_cliente) REFERENCES shsistema.tbcliente(id_cliente);

--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==

CREATE SEQUENCE shsistema.sqidproduto START WITH 1 INCREMENT 1;

CREATE TABLE shsistema.tbproduto (
	id_produto INTEGER NOT NULL,
	nome_produto VARCHAR NOT NULL,
	preco_produto NUMERIC(19,2),
	qnt_produto INTEGER NOT NULL,
	imagem_produto TEXT NOT NULL
);

ALTER TABLE shsistema.tbproduto ADD CONSTRAINT pk_tbproduto PRIMARY KEY (id_produto);

--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==

CREATE SEQUENCE shsistema.sqiditemestoque START WITH 1 INCREMENT 1;

CREATE TABLE shsistema.tbitemestoque (
	id_itemestoque INTEGER NOT NULL,
	id_produto INTEGER NULL
);

ALTER TABLE shsistema.tbitemestoque ADD CONSTRAINT pk_tbitemestoque PRIMARY KEY (id_itemestoque);

ALTER TABLE shsistema.tbitemestoque
ADD CONSTRAINT fk_id_produto FOREIGN KEY (id_produto) REFERENCES shsistema.tbproduto(id_produto);

--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==

CREATE SEQUENCE shsistema.sqidcartao START WITH 1 INCREMENT 1;

CREATE TABLE shsistema.tbcartao (
	id_cartao INTEGER NOT NULL,
	numero_cartao VARCHAR(16) NOT NULL,
	id_pessoa INTEGER NOT NULL,
	cpf_pessoa VARCHAR(11) NOT NULL,
	data_validade_cartao DATE NOT NULL,
	cvv_cartao NUMERIC(3) NOT NULL
);

ALTER TABLE shsistema.tbcartao ADD CONSTRAINT pk_tbcartao PRIMARY KEY (id_cartao);

--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==

CREATE SEQUENCE shsistema.sqidformapagto START WITH 1 INCREMENT 1;

CREATE TABLE shsistema.tbformapagto (
	id_formapagto INTEGER NOT NULL,
	tipo_formapagto CHAR(1)
);

ALTER TABLE shsistema.tbformapagto ADD CONSTRAINT pk_tbformapagto PRIMARY KEY (id_formapagto);

--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==

CREATE SEQUENCE shsistema.sqidpedido START WITH 1 INCREMENT 1;

CREATE TABLE shsistema.tbpedido (
	id_pedido INTEGER NOT NULL,
	id_sacola INTEGER NOT NULL,
	data_fechamento_pedido DATE,
	id_formapagto INTEGER
);

ALTER TABLE shsistema.tbpedido ADD CONSTRAINT pk_tbpedido PRIMARY KEY (id_pedido);

ALTER TABLE shsistema.tbpedido
ADD CONSTRAINT fk_id_sacola FOREIGN KEY (id_sacola) REFERENCES shsistema.tbsacola(id_sacola);

ALTER TABLE shsistema.tbpedido
ADD CONSTRAINT fk_id_formapagto FOREIGN KEY (id_formapagto) REFERENCES shsistema.tbformapagto(id_formapagto);

--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==--==

CREATE SEQUENCE shsistema.sqidavaliacao START WITH 1 INCREMENT 1;

CREATE TABLE shsistema.tbavaliacao (
	id_avaliacao INTEGER NOT NULL,
	id_pedido INTEGER NOT NULL,
	nota_avaliacao INTEGER NOT NULL,
	comentario_avaliacao TEXT
);

ALTER TABLE shsistema.tbavaliacao ADD CONSTRAINT pk_tbavaliacao PRIMARY KEY (id_avaliacao);

ALTER TABLE shsistema.tbavaliacao
ADD CONSTRAINT fk_id_pedido FOREIGN KEY (id_pedido) REFERENCES shsistema.tbpedido(id_pedido);