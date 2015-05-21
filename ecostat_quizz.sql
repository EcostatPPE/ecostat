CREATE TABLE quizz (
	codeQuizz INT NOT NULL AUTO_INCREMENT,
	libelleQuizz VARCHAR(45) NOT NULL,
	PRIMARY KEY (codeQuizz)
);
CREATE TABLE q_quizz (
	codeQ_quizz INT NOT NULL AUTO_INCREMENT,
	codeQuizz INT NOT NULL,
	libelleQuestion VARCHAR(50) NOT NULL,
	PRIMARY KEY (codeQ_quizz),
	CONSTRAINT `codequizz_fk1` FOREIGN KEY (`codeQuizz`) REFERENCES `quizz` (`codeQuizz`) ON DELETE NO ACTION ON UPDATE NO ACTION

);

CREATE TABLE tb_quizz (
	idReponse INT NOT NULL AUTO_INCREMENT,
	libelle VARCHAR(50) NOT NULL,
	codeQ_quizz INT NOT NULL,
	PRIMARY KEY (idReponse),
	CONSTRAINT codeQ_quizz_fk1 FOREIGN KEY (codeQ_quizz) REFERENCES q_quizz (codeQ_quizz)
);
CREATE TABLE tb_rep_quizz (
	codeQ_quizz INT NOT NULL,
	libelleReponse VARCHAR(50) NOT NULL,
	PRIMARY KEY (codeQ_quizz,libelleReponse),
	CONSTRAINT codeQ_quizz_fk2 FOREIGN KEY (codeQ_quizz) REFERENCES q_quizz (codeQ_quizz)
);
