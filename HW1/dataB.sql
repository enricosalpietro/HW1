drop database if exists DB;
create database DB;
use DB;

CREATE TABLE utenti(
    id integer primary key auto_increment,
    username varchar(16) not null unique,
    password varchar(255) not null,
    email varchar(255) not null unique,
    name varchar(255) not null,
    surname varchar(255) not null
)Engine='InnoDB';

CREATE TABLE cookies(
    id integer auto_increment primary key,
    hash varchar(255) not null,
    user integer not null,
    expires bigint not null,
    foreign key(user) references utenti(id) on delete cascade on update cascade 
)Engine='InnoDB';

CREATE TABLE pilota(
	id_pilota integer primary key,
	nome varchar(255),
	descrizione nvarchar(4000),
	immagine nvarchar(4000)
)Engine='InnoDB';

CREATE TABLE preferiti(
	pilota integer,
    utente varchar(16),
    index idx_pilota(pilota),
    index idx_utente(utente),
    foreign key(pilota) references pilota(id_pilota) on delete cascade on update cascade,
    foreign key(utente) references utenti(username) on delete cascade on update cascade,
    primary key(pilota, utente)
)Engine='InnoDB';

insert into pilota (id_pilota, nome, descrizione, immagine) values ("000", "Lewis Hamilton", "Forte, deciso, uno dei più grande di tutti i tempi", "https://www.formula1.com/content/fom-website/en/drivers/lewis-hamilton/_jcr_content/image.img.1920.medium.jpg/1616676634721.jpg");
insert into pilota (id_pilota, nome, descrizione, immagine) values ("001", "Valtteri Bottas", "A volte un po' timido, ma molto solido", "https://www.formula1.com/content/fom-website/en/drivers/valtteri-bottas/_jcr_content/image.img.640.medium.jpg/1616676580165.jpg");
insert into pilota (id_pilota, nome, descrizione, immagine) values ("002", "Max Verstappen", "Talentuoso e veloce, destinato a grandi cose", "https://www.formula1.com/content/fom-website/en/drivers/max-verstappen/_jcr_content/image.img.640.medium.jpg/1616676511153.jpg");
insert into pilota (id_pilota, nome, descrizione, immagine) values ("003", "Sergio Perez", "Costante, veloce, bravo nelle rimonte", "https://www.formula1.com/content/fom-website/en/drivers/sergio-perez/_jcr_content/image.img.640.medium.jpg/1616669035981.jpg");
insert into pilota (id_pilota, nome, descrizione, immagine) values ("004", "Lando Norris", "Giovane di talento e molto simpatico","https://www.formula1.com/content/fom-website/en/drivers/lando-norris/_jcr_content/image.img.640.medium.jpg/1616675716914.jpg");
insert into pilota (id_pilota, nome, descrizione, immagine) values ("005", "Daniel Ricciardo", "Forte nel corpo a corpo, amato da tutti", "https://www.formula1.com/content/fom-website/en/drivers/daniel-ricciardo/_jcr_content/image.img.640.medium.jpg/1616669038845.jpg");
insert into pilota (id_pilota, nome, descrizione, immagine) values ("006", "Charles Leclerc", "Veloce e talentuoso, non si dà mai per vinto", "https://www.formula1.com/content/fom-website/en/drivers/charles-leclerc/_jcr_content/image.img.640.medium.jpg/1616675563921.jpg");
insert into pilota (id_pilota, nome, descrizione, immagine) values ("007", "Carlos Sainz", "Solido e veloce, bravo nello sviluppo tecnico", "https://www.formula1.com/content/fom-website/en/drivers/carlos-sainz/_jcr_content/image.img.640.medium.jpg/1616669041261.jpg");
insert into pilota (id_pilota, nome, descrizione, immagine) values ("008", "Kimi Raikkonen", "Il più anziano, ma ancora fa sfoggio del proprio talento", "https://www.formula1.com/content/fom-website/en/drivers/kimi-raikkonen/_jcr_content/image.img.640.medium.jpg/1616676450026.jpg");
select * from preferiti;





