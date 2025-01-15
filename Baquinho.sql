create table usuarios(
id int auto_increment primary key,
nome varchar(100) not null,
email varchar(100) unique not null,
telefone varchar(20) unique not null
);

create table espacos(
id int auto_increment primary key,
nome varchar(100) not null,
capacidade int not null,
descricao varchar(200) not null
);

create table reservas(
id int auto_increment primary key,
id_usuario int,
id_espaco int,
data datetime not null,
foreign key (id_usuario) references usuarios(id),
foreign key (id_espaco) references espacos(id)
);

insert into usuarios values
(default,"Samuca","samuca@gmail.com","67999999999"),
(default,"joao","joao@gmail.com","67988888888");

insert into espacos values
(default, "Quadra de futsal", 12, "uma quadra bem limpa e com gols com rede 12x8"),
(default, "Salãozinho de festa", 20, "pequeno porem bem emocionante" );



