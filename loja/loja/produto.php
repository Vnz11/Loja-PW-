<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/produto.css">
    <title>Produtos</title>
</head>
<body>
    <section>
        <?php
        require "classe/Produto.class.php";
        $p   = new Produto();
        $con = $p->conecta();
        if(!$con) {
            echo "<script>alert('Erro ao conectar com o banco de dados!');</script>";
            exit();
        }else{
            $dadosProduto = $p->buscarProdutos();
            if(empty($dadosProduto)){
                echo "<script>alert('Não há produtos cadastrados!');</script>";
            }else{
                // O foreach abaixo não é mostrado nos slides (a apresentação
                // termina antes desse trecho). Foi reconstruído a partir do
                // print de tela em "telas_do_projeto.pptx" (slide 9): cada
                // produto vira um card clicável, com a foto de capa
                // (retornada por buscarProdutos() como 'foto_capa') e o
                // nome do produto, levando para exibir_produto.php?id=.
                foreach($dadosProduto as $produto){
                ?>
                    <div>
                        <a href="exibir_produto.php?id=<?php echo $produto['id_produto']; ?>">
                            <img src="imagens/<?php echo $produto['foto_capa']; ?>" alt="<?php echo $produto['nome_produto']; ?>">
                            <h2><?php echo $produto['nome_produto']; ?></h2>
                        </a>
                    </div>
                <?php
                }
            }
        }
        ?>
    </section>
</body>
</html>
