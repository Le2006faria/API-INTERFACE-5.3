CREATE TABLE pessoas (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    idade INT(3) NOT NULL,
    sexo VARCHAR(10) NOT NULL,
    email VARCHAR(50) NOT NULL
);

INSERT INTO pessoas (nome, idade, sexo, email) VALUES
    ('Carlos Silva', 40, 'Masculino', 'carlos.silva@gmail.com'),
    ('Fernanda Souza', 35, 'Feminino', 'fernanda.souza@gmail.com'),
    ('Ricardo Pereira', 29, 'Masculino', 'ricardo.pereira@gmail.com'),
    ('Juliana Costa', 25, 'Feminino', 'juliana.costa@gmail.com'),
    ('Lucas Alves', 31, 'Masculino', 'lucas.alves@gmail.com'),
    ('Patrícia Lima', 28, 'Feminino', 'patricia.lima@gmail.com'),
    ('Roberto Nunes', 33, 'Masculino', 'roberto.nunes@gmail.com'),
    ('Mariana Teixeira', 27, 'Feminino', 'mariana.teixeira@gmail.com'),
    ('Tiago Ferreira', 38, 'Masculino', 'tiago.ferreira@gmail.com'),
    ('Ana Carvalho', 30, 'Feminino', 'ana.carvalho@gmail.com');

SELECT * FROM pessoas;