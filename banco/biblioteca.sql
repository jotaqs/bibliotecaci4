
CREATE TABLE aluno 
( 
 id INT PRIMARY KEY AUTO_INCREMENT,
 cpf VARCHAR(20) NOT NULL,  
 nome VARCHAR(50) NOT NULL,  
 email VARCHAR(30) NOT NULL,  
 telefone VARCHAR(20),  
 turma VARCHAR(2) NOT NULL  
); 

CREATE TABLE autor 
( 
 id INT PRIMARY KEY AUTO_INCREMENT,  
 nome VARCHAR(50) NOT NULL
); 

CREATE TABLE editora 
( 
 id INT PRIMARY KEY AUTO_INCREMENT,  
 nome VARCHAR(50) NOT NULL,  
 email VARCHAR(30),  
 telefone VARCHAR(20)
); 

CREATE TABLE obra 
( 
 id INT PRIMARY KEY AUTO_INCREMENT,  
 titulo VARCHAR(500) NOT NULL,
 isbn VARCHAR(25) NOT NULL,  
 categoria VARCHAR(15) NOT NULL,  
 ano_publicacao INT NOT NULL,  
 id_editora INT,
 FOREIGN KEY(id_editora) REFERENCES editora(id)
); 

CREATE TABLE livro 
( 
 id INT PRIMARY KEY AUTO_INCREMENT,  
 disponivel INT NOT NULL,  
 status VARCHAR(20) NOT NULL DEFAULT 'Ìntegro',  
 id_obra INT,
 FOREIGN KEY(id_obra) REFERENCES obra(id)
); 

CREATE TABLE usuario 
( 
 id INT PRIMARY KEY AUTO_INCREMENT,  
 nome VARCHAR(50) NOT NULL,  
 email VARCHAR(30) NOT NULL,  
 senha VARCHAR(15) NOT NULL,  
 telefone VARCHAR(20)
); 

CREATE TABLE emprestimo 
( 
 id INT PRIMARY KEY AUTO_INCREMENT,  
 data_inicio INT NOT NULL,  
 data_fim INT NOT NULL,  
 data_prazo INT NOT NULL,  
 id_livro INT,  
 id_aluno INT,  
 id_usuario INT,
 FOREIGN KEY(id_livro) REFERENCES livro(id),
 FOREIGN KEY(id_aluno) REFERENCES aluno(id),
 FOREIGN KEY(id_usuario) REFERENCES usuario(id)
); 

CREATE TABLE autor_obra 
( 
 id INT PRIMARY KEY AUTO_INCREMENT,  
 id_obra INT,  
 id_autor INT,
 FOREIGN KEY(id_obra) REFERENCES obra(id),
 FOREIGN KEY(id_autor) REFERENCES autor(id)
); 
