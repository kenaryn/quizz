use quizz_db;
create table Quizz (id int primary key auto_increment, title tinytext not null);
create table Question (id int primary key auto_increment, `text` varchar(512) not null);
create table Response (id int primary key auto_increment, `text` varchar(512) not null, isValid bool not null);

alter table Question add(numQuizz int, foreign key(numQuizz) references Quizz(id));
alter table Response add (numQuestion int, foreign key(numQuestion) references Question(id));

alter table Question alter column text varchar(511);

insert into Quizz (title) values ('Programming languages survey');
insert into Question (numQuizz, text) values (1, 'What is your favorite programming language?');
insert into Response (text, isValid, numQuestion) values ('Rust', true, 1);
insert into Response (text, isValid, numQuestion) values ('Python', false, 1);

insert into Question (text, numQuizz) values ('What is your favorite DBMS?', 1);
insert into Response (text, isValid, numQuestion) values ('PostgreSQL', false, 2);
insert into Response (text, isValid, numQuestion) values ('MySQL', false, 2);

select * from Question, Response where numQuizz = 1 and numQuestion = Question.id;