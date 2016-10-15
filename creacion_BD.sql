-- create database visitas;
use visitas;

create table usuario(
	id_usuario varchar(30) not null primary key,
    nombre varchar(80) not null,
    contrasena varchar(100) not null,
    departamento varchar(100) not null,
    cargo varchar(80) not null
);

insert into usuario values ("Esteban", "Jorge Esteban González Valladares", "esteban123", "Gestión Tecnológica y Vinculación", "Vinculacion");

create table solicitud(
	id int not null auto_increment primary key,
    fecha_elaboracion date not null,
    periodo_escolar varchar(50) not null,
    empresa varchar(100) not null,
    ciudad varchar(50) not null,
    area_observar varchar(100) not null,
    objetivo text not null,
    fecha_visita date not null,
    turno varchar(20) not null,
    carrera varchar(50) not null,
    semestre varchar(20) not null,
    no_alumnos int not null,
    docente varchar(80) not null,
    correo varchar(100) not null,
    materia varchar(80) not null,
    aceptado tinyint(1) not null default 0,
    status_visita varchar(20) default "no enviado" not null,
    calendario int not null default 0
    -- id_usuario varchar(30) not null,
    
    -- foreign key (id_usuario) references usuario (id_usuario)
);

create table empresa(
	id_empresa varchar(30) not null primary key,
    nombre varchar(100) not null,
    tel_1 varchar(30) not null,
    tel_2 varchar(30),
    correo varchar(100) not null,
    direccion varchar(100) not null
);

create table visita(
	id int not null,
    fecha_programada varchar(4), -- se cumplio la visita en la fecha programada? só o no
    objetivo varchar (4), -- se cumplio el objetivo de la visita? sí o no
    cant_hombres int,
    cant_mujeres int,
    total_alumnos int,
    
    foreign key (id) references solicitud (id)
);

create table vehiculo(
	id int not null auto_increment primary key,
    nombre varchar(50),
    ocupado int not null default 0
);

create table events(
	id int(10) not null primary key,
    title varchar(150) not null, -- nombre de la empresa
    body text not null, -- nombre del maestro
    url varchar(150) not null,
    class varchar(45) not null default "event-warning",
    start varchar(15) not null, -- fecha de inicio de la visita
    end varchar(15) not null, -- fecha de fin de la visita
    carrera varchar (50) not null, -- carrera
    no_alumnos int not null, -- total de alumnos
    ciudad varchar(50) not null, -- ciudad
    hora varchar(20) not null, -- hora de la visita
    vehiculo varchar(50),
    chofer varchar(50),
    hora_salida varchar(20), -- hora de salida del tec
    hora_llegada varchar(20), -- hora de llegada al tec
    motivo varchar(100) -- motivo de cancelación de la visita
);

insert into vehiculo (nombre) values ("Camión Volvo");
insert into vehiculo (nombre) values ("Camión Mercedes Benz");
insert into vehiculo (nombre) values ("Camioneta Express");
insert into vehiculo (nombre) values ("Camioneta Toyota");

select * from usuario;
select * from empresa;
select * from solicitud;
select * from events;
select * from vehiculo;

-- Disparador para aceptar el evento AFTER INSERT vehiculo
-- DROP TRIGGER update_class;
-- DELIMITER $$
-- create trigger update_class before update on events
	-- for each row
--     begin
--		if OLD.vehiculo is null THEN
			-- set NEW.class="event-success";
--		end if;
--    end; $$