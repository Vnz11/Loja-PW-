<?php
// As linhas 1-13 não aparecem no slide (o print da apresentação só
// começa a partir da linha 14, já dentro do <!DOCTYPE html>). Foram
// reconstruídas seguindo o mesmo padrão usado em produto.php:
// conectar, pegar o id pela URL e buscar os dados do produto e suas
// imagens (usando o método buscarImagens(), que também precisou ser
// criado - ver classe/Produto.class.php).
require "classe/Produto.class.php";
$p   = new Produto();
$con = $p->conecta();
if(!$con) {
    echo "<script>alert('Erro ao conectar com o banco de dados!');</script>";
    exit();
}

$id_produto       = $_GET['id'];
$dadosDoProduto   = $p->buscarProduto($id_produto);
$imagensDoProduto = $p->buscarImagens($id_produto);

?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/exibir.css">
    <title>Detalhes do Produto</title>
</head>
<body>
    <section>
        <h1><?php echo $dadosDoProduto['nome_produto']; ?></h1>
        <h2>R$ <?php echo $dadosDoProduto['valor']; ?></h2>
        <p><b>Descrição:</b> <?php echo $dadosDoProduto['descricao']; ?></p>
        <?php
        foreach($imagensDoProduto as $imagem){
        ?>

            <div class = "caixa_img">
                <img src="imagens/<?php echo $imagem['nome_imagem']; ?>">
            </div>

        <?php
        }
        // Fechamento (foreach, section, body, html) também não aparece
        // no slide - completado seguindo o padrão do arquivo.
        ?>
    </section>
</body>
</html>
