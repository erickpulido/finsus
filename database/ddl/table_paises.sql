CREATE TABLE finsus.paises(
	id int primary key auto_increment not null,
    nombre varchar(50),
    createDate timestamp default current_timestamp not null,
    updateDate timestamp on update current_timestamp null
)Engine=InnoDb;