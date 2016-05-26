
Create table Estudiante(
id SERIAL,
codigo varchar(20),
nombre varchar(30),
apellido varchar(50),
cedula varchar(20),
edad integer,
semestre integer,
CONSTRAINT estudiante_pkey PRIMARY KEY (id)
);


CREATE TABLE usuario
(
  nickname varchar(15),
  nombre varchar(50),
  password varchar(50),
  primary key(nickname) 
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