create database produtos;

CREATE TABLE produto(
    id serial not null PRIMARY KEY,
    sku text not null,
    nome text not null,
    descricao text,
    file_path text,
    preco numeric(10,3) not null,
    quantidade numeric(10,3) not null
);

CREATE TABLE categoria(
    id serial not null PRIMARY KEY,
    nome text not null
);

CREATE TABLE produto_categoria(
    id serial not null PRIMARY KEY,
    produto_id integer not null,
    categoria_id integer not null,
    CONSTRAINT fk_produto FOREIGN KEY (produto_id) REFERENCES produto(id),
    CONSTRAINT fk_categoria FOREIGN KEY (categoria_id) REFERENCES categoria(id) 
);

CREATE TABLE log(
    id serial not null PRIMARY KEY,
    logdate timestamp without time zone not null default now(),
    tablename text not null,
    old_record text not null,
    new_record text not null
);

create unique index idx_unique_sku on produto(sku);