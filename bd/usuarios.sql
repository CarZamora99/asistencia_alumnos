
create database pruebas2;

use pruebas2;

create table usuarios(
				id int auto_increment,
				nombre varchar(50),
				paterno varchar(50),
                materno varchar(50),
				usuario varchar(50),
				password text(50),
				primary key(id)
					);