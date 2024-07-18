CREATE TABLE atendimento(
id INT PRIMARY KEY AUTO_INCREMENT,
id_solicitante INT NULL,
tipo VARCHAR(255) NOT NULL ,
informacao VARCHAR(255) DEFAULT '',
data_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   
);

INSERT INTO atendimento(tipo, informacao, data_registro) VALUES();

