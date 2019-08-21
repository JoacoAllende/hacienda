CREATE SEQUENCE cliente_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE cliente (
    id INTEGER DEFAULT nextval('cliente_id_seq') PRIMARY KEY NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    saldo NUMERIC NULL,
    tipo VARCHAR(15) NOT NULL,
    cuit VARCHAR(15)
);

CREATE SEQUENCE compra_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE compra (
    id_compra INTEGER DEFAULT nextval('compra_id_seq') PRIMARY KEY NOT NULL,
    id_cliente INTEGER NOT NULL,
    fecha DATE NOT NULL,
    tropa VARCHAR(15),
    cantAnimales INTEGER,
    kgVivos NUMERIC,
    kgCarne NUMERIC,
    costo NUMERIC,
    total NUMERIC,
    adelanto NUMERIC,
    FOREIGN KEY (id_cliente) REFERENCES cliente (id)
);

CREATE SEQUENCE venta_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE venta (
    id_venta INTEGER DEFAULT nextval('venta_id_seq') PRIMARY KEY NOT NULL,
    id_cliente INTEGER NOT NULL,
    fecha DATE NOT NULL,
    categoria BOOLEAN,
    tropa VARCHAR(15),
    cantAnimales INTEGER,
    diferenciaKilos NUMERIC,
    kgTotales NUMERIC,
    precioKilo NUMERIC,
    precioTotal NUMERIC,
    entrega NUMERIC,
    saldoActualCliente NUMERIC,
    tipo VARCHAR(10),
    FOREIGN KEY (id_cliente) REFERENCES cliente (id)
);