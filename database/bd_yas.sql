drop database bd_yas;

create database bd_yas default character set utf8 collate utf8_general_ci;

use bd_yas;

create table user_yas(
    user_id int not null primary key auto_increment,
    user_email varchar(400) not null unique,
    user_senha varchar(70) not null,
    user_carreira varchar(20) null,
    user_whatsapp_cont  bigint(15) null,
    user_first_name varchar(30) not null,
    user_last_name varchar(30) not null,
    user_email_cont varchar(400)  null,
    user_telefone_cont bigint(15)  null,
    user_desc mediumtext null,
    social_url mediumtext null,
    social_insta varchar(20) null,
    social_twitter varchar(20) null,
    user_foto varchar(70) default null
)engine=InnoDB default charset=utf8;

-- select * from user;


create table tag_proj(
    tag_id int not null primary key auto_increment,
    tag_name varchar(45) not null,
    tag_img varchar(60) default null
)engine=InnoDB default charset=utf8;

-- select * from tag_proj;

create table projeto(
    proj_id int not null primary key auto_increment,
    user_id int not null,
    tag_id int not null,
    proj_name varchar(100) not null,
    proj_desc mediumtext not null,
    proj_back_img varchar(60) not null,
    proj_data datetime DEFAULT NULL,
    foreign key(user_id) references user_yas(user_id) on delete cascade,
    foreign key(tag_id) references tag_proj(tag_id)
)engine=InnoDB default charset=utf8;

-- select * from projeto;

create table img_proj(
    img_id int not null primary key auto_increment,
    proj_id int not null,
    proj_img varchar(45) not null,
    foreign key(proj_id) references projeto(proj_id) on delete cascade
)engine=InnoDB default charset=utf8;

-- select * from img_proj;

create table salvo_proj(
    salvos_id int not null primary key auto_increment,
    user_id int not null,
    proj_id int not null,
    foreign key(user_id) references user_yas(user_id),
    foreign key(proj_id) references projeto(proj_id)
)engine=InnoDB default charset=utf8;

-- select * from salvo_proj;

create table user_insp(
    insp_id int not null primary key auto_increment,
    user_id int not null,
    user_save_id varchar(45) not null,
    foreign key(user_id) references user_yas(user_id)
)engine=InnoDB default charset=utf8;

-- select * from user_insp;
insert into tag_proj (tag_name) values
('Arte em 3D'),
('Artesanato'),
('Arte digital'),
('Animação GIF'),
('Animação'),
('Arte urbana'),
('Arte conceitual'),
('Colagem'),
('Colorir'),
('Design de aplicativos'),
('Design automotivo'),
('Design de personagens'),
('Desenho'),
('Design editorial'),
('Design de moda'),
('Design de móveis'),
('Design de jogos'),
('Design gráfico'), 
('Design de ícones'),
('Design de interações'),
('Design de interiores'),
('Design de joias'),
('Design de paisagens'),
('Design de logotipo'),
('Design de pôster'),
('Design de produtos'),
('Design de adereços'),
('Design de camisetas'),
('Design de tecidos'),
('Design de brinquedos'),
('Design de fontes'),
('Embalagens'),
('Escultura'),
('Esboços'),
('Fotografia de publicidade'),
('Fotografia de arquitetura'),
('Fotografia de beleza'),
('Fotografia de moda'),
('Fotografia de comida'),
('Fotografia'),
('Fotojornalismo'),
('Fotografia de produto'),
('Grafite'),
('Histórias em quadrinhos'),
('Ilustração'),
('Interface e UX'),
('Moda'),
('Maquiagem'),
('Modelagem'),
('Publicidade'),
('Pintura digital'),
('Pintura'),
('Storyboarding'),
('Trabalho em madeira'),
('Web design');

-- -----------USER EXEMPLO 1-----------------

-- insert into user (user_email,user_senha) values ('marina_rosa@gmail.com', '1234');
-- insert into user_info (user_id, user_carreira, user_whatsapp_cont, user_first_name, user_last_name, user_email_cont, user_telefone_cont, user_desc, social_url, social_twitter, social_insta, user_foto) values ('1','fotografa', '998074560','Mariana','Rosa','marininha_foto@gmail.com','376543378','Fotografa desde de 2004, trabalhei par rede globo,netlix e trabalho como filancer','','marirosa','marirosinha','');

-- insert into projeto(user_id, tag_id, proj_name, proj_desc, proj_back_img) values('1', '15', 'Um nome qualquer', 'vamos falar a verdade nao seie oq esta rolando aquii', 'Um-nome-qualquer.png');
-- insert into img_proj(proj_id, proj_img) values ('1', 'Um-nome-qualquer1.png'), ('1', 'Um-nome-qualquer2.png'), ('1', 'Um-nome-qualquer3.png'), ('1', 'Um-nome-qualquer4.png'), ('1', 'Um-nome-qualquer5.png');

-- -----------USER EXEMPLO 2-----------------

-- insert into user (user_email,user_senha) values ('sergio_marone@gmail.com', '1234');
-- insert into user_info (user_id, user_carreira, user_whatsapp_cont, user_first_name, user_last_name, user_email_cont, user_telefone_cont, user_desc, social_url, social_twitter, social_insta, user_foto) values ('2','estilista', '998074560','sergio','marone','moda_marone@gmail.com','376543378','','','maronemm','sermoda','');

-- insert into projeto(user_id, tag_id, proj_name, proj_desc, proj_back_img) values('2', '22', 'exemploo', 'cara ainda isso é so um exemplo', 'exemplo.png');
-- insert into img_proj(proj_id, proj_img) values ('2', 'explo1.png'), ('2', 'explo2.png'), ('2', 'explo3.png'), ('2', 'explo4.png'), ('2', 'explo5.png');

-- -----------SAVE E INPS EXEMPLO -----------------

-- insert into user_insp(user_id, user_save_id) values ('1', '2');
-- insert into salvo_proj(user_id, proj_id) values ('1', '2');

-- select projeto.proj_id, user.user_first_name, user.user_last_name, projeto.proj_name, projeto.proj_desc from projeto projeto join user_info user on projeto.user_id=user.user_id;
-- select projeto.proj_id, user.user_first_name, user.user_last_name, projeto.proj_name, projeto.proj_desc from projeto projeto join user_info user on projeto.user_id=user.user_id where projeto.proj_id=2;
-- select projeto.proj_id, user.user_first_name, user.user_last_name, projeto.proj_name, projeto.proj_desc, tag.tag_name from projeto projeto join user_info user on projeto.user_id=user.user_id join tag_proj tag on projeto.tag_id=tag.tag_id;

delete from user_yas where user_id='1';