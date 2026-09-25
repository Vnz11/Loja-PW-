-- No slide original a sintaxe estava invertida
-- ("CREATE DATABASE loja_etim IF NOT EXISTS") e o nome do banco era
-- inconsistente (CREATE DATABASE loja_etim, mas USE loja_db).
-- Aqui ficou unificado como "loja_etim", que é o mesmo nome usado em
-- Produto.class.php (método conecta()).

CREATE DATABASE IF NOT EXISTS loja_etim;
USE loja_etim;

CREATE TABLE IF NOT EXISTS produtos(
    id_produto int AUTO_INCREMENT PRIMARY KEY,
    nome_produto varchar(100),
    descricao text,
    valor double
);

CREATE TABLE IF NOT EXISTS imagens(
    id_imagem int AUTO_INCREMENT PRIMARY KEY,
    nome_imagem varchar(100),
    fk_id_produto int,
    FOREIGN KEY(fk_id_produto) REFERENCES produtos(id_produto)
);
