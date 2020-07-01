<!DOCTYPE html>
<html>
    <head>
        <title>Listar - Produtos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Css/style.css">   
    </head>
    <body>
        <div class="container">
            <a href="../indexAdm.html">Voltar</a>
            <h1>Listar - <span class="badge badge-warning">Produtos</span></h1> <br>
            
            <table class="table table-hover table-bordered">
                <tr class="thead-dark">
                    <th>Código</th>                    
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Valor unitário</th>
                    <th>Qtd. em estoque</th>
                    <th>Unidade</th>
                    <th>Peso</th>
                    <th>Dimensões</th>
                    <th colspan="2">Gerenciar</th>
                </tr>
                <?php
                    include_once '../../Funcoes/BancoDeDados/bdConn.php';
                    $conexao = conectar();
                    $sql = "Select *, categoria.nome from produto 
                    INNER JOIN categoria
                    ON produto.id = categoria.id
                    order by codigo_prod";
                    $resultado = $conexao -> query($sql);
                    
                    foreach($resultado as $prod){
                        echo "<tr>";
                            echo "<td>" . $prod["codigo_prod"] . "</td>";
                            echo "<td>" . $prod["nome_pro"] . "</td>";
                            echo "<td>" . $prod["nome"] . "</td>";
                            echo "<td>" . $prod["valor_unitario"] . "</td>";
        
                            if($prod["quantidade"] > 0){
                                echo "<td>" . $prod["quantidade"] . "</td>";
                            } else {
                                echo "<td class='bg-danger'>" . $prod["quantidade"] . "</td>";
                            }

                            echo "<td>" . $prod["unidade_Venda"] . "</td>";
                            echo "<td>" . $prod["peso"] . "kg</td>";
                            echo "<td>" . $prod["dimensoes"] . "m³</td>";
                            echo "<td>" . "<a href='editar.php?cod=". $prod["codigo_prod"]. "'>Editar</a>" . "</td>";
                            echo "<td>" . "<a href='excluir.php?cod=" . $prod["codigo_prod"] . "'>Excluir</a>" . "</td>";
                        echo "</tr>";    
                    }
                ?>
            </table>
                   <!-- const CAMINHO = "Imagens/";
                   $diretorio = opendir(CAMINHO);

                   while (($arquivo = readdir($diretorio)) !== false ){
                       if (filetype(CAMINHO.$arquivo) === "file"){
                           $tamanho = filesize(CAMINHO.$arquivo);

                           echo "<div style='display: inline-block;'>";
                           echo "<img src='" . CAMINHO . "/$arquivo' height='100'/>";
                           echo "<input type='checkbox' name='imagem[]' value = '$arquivo'/>";
                           echo "</div>";
                           echo "<div style='display: inline-block;margin-left:20px;'>";
                           echo "<p>Nome do arquivo: $arquivo</p>";
                           echo "<p>Tamanho do arquivo: $tamanho bytes</p>";
                           echo "</div>";
                           echo "<br>";
                       }
                   }
                   closedir($diretorio); -->
        </div>
    </body>
</html>
