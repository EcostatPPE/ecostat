USE ecostat;

drop table if exists enquete;
DROP table if exists q_enquete;
drop table if exists tb_enquete;

CREATE TABLE enquete (
	CodeEnquete INT NOT NULL,
	libelleEnquete varchar(50) not null,
	primary key (CodeEnquete)
);
create table q_enquete (
	codeQ_enquete int not null,
	codeEnquete int not null,
	libelleEnquete varchar(40) not null,
	primary key (codeQ_enquete),
	constraint fefe_fk1 foreign key (codeEnquete) REFERENCES enquete(CodeEnquete)
);
create table tb_enquete (
	codeReponse int not null,
	libelle varchar(50) not null,
	codeQ_enquete int not null,
	primary key (codeReponse),
	constraint fefrgr_fk1 foreign key (codeQ_enquete) references q_enquete(codeQ_enquete)
);

CREATE TABLE ip_enq (
	ip VARCHAR(30) not null,
	codeEnquete int not null,
	PRIMARY KEY (ip,codeEnquete),
	CONSTRAINT freg_fk1 FOREIGN KEY (codeEnquete) REFERENCES enquete(codeEnquete)
);
