CREATE SCHEMA IF NOT EXISTS gimnasio;
USE gimnasio;
CREATE TABLE socio(
    dni varchar(9) primary key,
    apellido varchar (50),
    telefono varchar (9),
    cuota int, 
    tipo_usuario tinyint
);
CREATE TABLE actividad(
    identificador int primary key auto_increment,
    nombre varchar(30) unique
);

CREATE TABLE agenda(
    cliente varchar(9),
    actividad int,
    monitor varchar(25),
    CONSTRAINT pk_agenda PRIMARY KEY (cliente, actividad),
    CONSTRAINT fk_cli FOREIGN KEY (cliente) REFERENCES socio(dni) ON DELETE CASCADE,
    CONSTRAINT fk_act FOREIGN KEY (actividad) REFERENCES actividad(identificador) ON DELETE CASCADE
);

insert into socio values ("admin", "admin","654321234",0,0);
insert into socio values ("11111111", "Usuario1","614321234",50,1);
insert into socio values ("22222222", "Usuario2","624321234",50,1);
insert into actividad values (1,"Pilates");
insert into actividad values (2,"Step");
