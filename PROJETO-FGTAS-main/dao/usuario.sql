CREATE TABLE usuario(
id INT PRIMARY KEY,
nome VARCHAR(100) DEFAULT '',
email VARCHAR(100) NOT NULL,
senha VARCHAR(100) NOT NULL,
cargo ENUM('usuario', 'admin') NOT NULL DEFAULT 'usuario',
ativo ENUM('Ativado', 'Desativado') NOT NULL DEFAULT 'Ativado'
);

INSERT INTO usuario (id, nome, email, loginUsuario, senha, cargo, 
ativo) VALUES ();

