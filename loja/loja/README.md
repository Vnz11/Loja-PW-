# Projeto Loja - PHP + PDO + MySQL

Este projeto foi remontado a partir do conteúdo (código nos prints de tela)
dos três slides enviados:

- `Classe_Produto.pptx`
- `Continuacao_Loja.pptx`
- `telas_do_projeto.pptx`

## Como rodar

1. Copie a pasta `loja` para dentro do `htdocs` do XAMPP (ex:
   `C:\xampp\htdocs\loja`).
2. Abra o phpMyAdmin (ou o terminal do MySQL) e rode o script
   `sql/loja.sql` para criar o banco `loja_etim` e as tabelas
   `produtos` e `imagens`.
3. Inicie o Apache e o MySQL no XAMPP.
4. Acesse `http://localhost/loja/index.php` para cadastrar um
   produto (nome, descrição, valor e uma ou mais imagens JPG/PNG).
5. Clique em "Ver todos os produtos" (ou acesse
   `http://localhost/loja/produto.php`) para ver a listagem; clique
   em um produto para abrir `exibir_produto.php?id=...` com os
   detalhes e todas as fotos.
6. `produtoEstatico.php` é a página estática de demonstração
   (galeria fixa com as imagens de `banco_imagem/`), separada do
   fluxo principal — é o exercício do começo do slide
   `Classe_Produto.pptx`.

## Estrutura

```
loja/
├── banco_imagem/        fotos fixas usadas por produtoEstatico.php
├── classe/
│   └── Produto.class.php  conexão PDO + regras de negócio
├── css/
│   ├── estilo.css          index.php (formulário)
│   ├── produto.css         produto.php (listagem dinâmica)
│   ├── produtoEstatico.css produtoEstatico.php (galeria fixa)
│   └── exibir.css          exibir_produto.php (detalhes)
├── imagens/              destino das fotos enviadas pelo formulário
├── sql/
│   └── loja.sql           criação do banco e tabelas
├── index.php             formulário de cadastro + upload
├── produto.php           listagem de produtos cadastrados
├── produtoEstatico.php   galeria estática de demonstração
└── exibir_produto.php    detalhes de um produto (?id=)
```

## O que veio direto dos slides

A maior parte do código (toda a classe `Produto`, o HTML e o PHP do
`index.php`, os três CSS principais, o SQL das tabelas e o começo de
`produto.php`/`exibir_produto.php`) foi **transcrita diretamente dos
prints de tela** dos slides, incluindo comentários e nomes de
variáveis dos professores (Fabio Claret e Jonathas Cavalaro).

## O que **não** estava nos slides e precisei completar

A apresentação `Continuacao_Loja.pptx` para de mostrar código de
repente (a partir do slide 10 os slides ficam em branco), então
faltaram alguns pedaços. Foram completados seguindo o mesmo estilo e
padrão de nomes já usado no resto do código, mas vale conferir:

- **`Produto.class.php` → método `buscarImagens($id_produto)`**:
  não aparece em nenhum slide. Foi criado porque
  `exibir_produto.php` precisa dele para listar todas as fotos de um
  produto (usa `$imagensDoProduto`).
- **`produto.php` → corpo do `foreach`**: os slides mostram só a
  abertura do `require`/`buscarProdutos()`. O card de cada produto
  (link para `exibir_produto.php?id=`, imagem de capa e nome) foi
  reconstruído a partir do print de tela em
  `telas_do_projeto.pptx` (slide 9).
- **`exibir_produto.php` → linhas iniciais (conexão, `$_GET['id']`,
  `buscarProduto`/`buscarImagens`) e o fechamento do arquivo**: o
  slide 9 de `Continuacao_Loja.pptx` só mostra o meio do arquivo
  (linha 14 até 36).
- **`css/exibir.css`**: não aparece em nenhum slide. Foi criado do
  zero com base no visual da tela "Exibir Produto" (slides 10 e 11
  de `telas_do_projeto.pptx`).
- **`css/produto.css` → regra `h2`**: o slide corta o arquivo na
  linha 23, no meio dessa regra. O restante foi completado para
  bater com a faixa cinza sobre a foto vista no print de tela.
- **Imagens em `banco_imagem/`**: os slides mostram só os *nomes*
  dos arquivos usados (`calca.jpg`, `celular.jpg`, `fogao1.jpg`
  etc.), não as fotos reais. Foram geradas imagens-placeholder
  coloridas só para o projeto rodar; troque pelas fotos reais se
  quiser.
- **`imagens/`**: fica vazia (com um `.gitkeep`) até você cadastrar
  o primeiro produto pelo formulário.

## Pequenos bugs corrigidos em relação ao print original

- `Produto.class.php`: `$sql->bindValue(":n", nome_foto)` estava sem
  o `$` antes de `nome_foto` — corrigido para `$nome_foto`.
- `Produto.class.php`: `"SELECT *FROM produtos WHERE..."` sem espaço
  entre `*` e `FROM` — corrigido.
- `sql/loja.sql`: sintaxe invertida (`CREATE DATABASE loja_etim IF
  NOT EXISTS` e `CREATE TABLE produtos IF NOT EXISTS(`) — corrigida
  para `CREATE DATABASE IF NOT EXISTS loja_etim` /
  `CREATE TABLE IF NOT EXISTS produtos(`. Também unifiquei o nome do
  banco: o slide criava `loja_etim` mas dava `USE loja_db` (nome
  diferente do usado em `Produto.class.php`).
- `produtoEstatico.php`: faltava a tag `<html>` de abertura no
  slide (tinha `</html>` sem abertura) — adicionada.
