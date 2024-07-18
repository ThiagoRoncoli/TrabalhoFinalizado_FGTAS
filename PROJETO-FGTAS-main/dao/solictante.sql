CREATE TABLE solicitante(
id INT PRIMARY KEY  AUTO_INCREMENT, 
id_usuario INT NOT NULL,
tipo_pessoa ENUM("pessoa_fisica", "pessoa_juridica") NOT NULL,
tipo_solicitante VARCHAR(255) NOT NULL,
identificador_unico VARCHAR(255) NOT NULL,
forma_atendimento VARCHAR(255) NOT NULL,
nome VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
telefone VARCHAR(255) NOT NULL,
tipo_informacao VARCHAR(255) NOT NULL DEFAULT '',
descricao VARCHAR(255) NOT NULL DEFAULT '',
ativo ENUM('Ativado', 'Desativado') NOT NULL DEFAULT 'Ativado',
data_registro DATETIME NOT NULL CURRENT_TIMESTAMP,
FOREIGN KEY (id_usuario) REFERENCES usuario(id)
);


INSERT INTO solicitante(id, tipo_pessoa, tipo_solicitante, identificador_unico, forma_atendimento, nome,
email, telefone, tipo_informacao, descricao, ativo, data_registro ) VALUES();