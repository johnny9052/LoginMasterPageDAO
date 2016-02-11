
Create table Estudiante(
id SERIAL,
codigo integer,
nombre varchar(30),
apellido varchar(50),
cedula varchar(20),
edad integer,
semestre integer,
CONSTRAINT estudiante_pkey PRIMARY KEY (id)
);

CREATE TABLE usuario
(
  usuario character varying(15) NOT NULL,
  nombre character varying(50),
  password character varying(50),
  CONSTRAINT usuario_pkey PRIMARY KEY (usuario)
)


CREATE TABLE departamento(
    id serial primary key,
    nombre varchar(20)
);


create table municipio(
    id serial primary key,
    nombre varchar(20),
    id_depto integer,
    foreign key(id_depto) references departamento(id)
)