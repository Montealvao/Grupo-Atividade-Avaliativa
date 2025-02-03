create database sistema_de_reserva;

use sistema_de_reserva;

create table usuarios(
id int auto_increment primary key,
nome varchar(100) not null,
email varchar(100) unique not null,
senha varchar(16),
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
(default,"Admin","admin@gmail.com","123","67999999999"),
(default,"João","joao@gmail.com","321","67988888888");

insert into espacos values
(default, "La mance", 12, "Um restaurante chique é um local sofisticado, onde a experiência gastronômica vai além da simples refeição. Ao entrar, a ambientação refinada chama atenção, com decoração elegante, iluminação suave e uma atmosfera aconchegante, mas ao mesmo tempo imponente. O atendimento é impecável, com garçons bem treinados, discretos e atenciosos, prontos para garantir que cada detalhe da refeição seja perfeito."),
(default, "Dan buje", 20, "valoriza o conforto e a exclusividade, com mesas espaçadas para garantir privacidade, música ambiente suave e uma atenção constante aos mínimos detalhes. Frequentado por pessoas que buscam não apenas uma refeição, mas uma verdadeira imersão sensorial, um restaurante chique é o lugar ideal para celebrações especiais ou para quem deseja um momento de puro prazer gastronômico." );



