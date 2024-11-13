create database Tarefa;

use Tarefa;

create table usuarios(
       usu_codigo int primary key auto_increment,
       usu_nome varchar(45) not null,
       usu_email varchar(100) not null
);

create table tarefas(
       tar_codigo int primary key auto_increment,
       tar_setor varchar(45) not null,
       tar_prioridade varchar(45) not null,
       tar_descricao varchar(45) not null,
       tar_status varchar(45) not null,
       usu_codigo int not null,
       constraint fk_usu_codigo foreign key(usu_codigo) references usuarios(usu_codigo)
);

insert into usuarios values (1,'Leonardo','leozim@email.com');

insert into tarefas values (1,'materiais','baixa','É utilizado em construção','a fazer',1);

select * from tarefas;