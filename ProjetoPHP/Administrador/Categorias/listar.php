<!DOCTYPE html>
<html>
    <head>
        <title>Listar - Categoria</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Css/style.css">
    </head>
    <body>
        <div class="container">
            <a href="../indexAdm.html">Voltar</a>
            <h1>Listar - <span class="badge badge-warning">Categorias</span></h1> <br>
            
            <table class="table table-hover table-bordered">
                <tr class="thead-dark">
                    <th>Código</th>                    
                    <th>Nome</th>
                    <th colspan="2">Gerenciar</th>
                </tr>
                <?php
                    include_once '../../Funcoes/BancoDeDados/bdConn.php';
                    $conexao = conectar();
                    $sql = "Select * from categoria order by id";
                    $resultado = $conexao -> query($sql);
                    
                    foreach($resultado as $cat){
                        echo "<tr>";
                            echo "<td>" . $cat["id"] . "</td>";
                            echo "<td>" . $cat["nome"] . "</td>";
                            echo "<td>" . "<a href='editar.php?id=". $cat["id"]. "'>Editar</a>" . "</td>";
                            echo "<td>" . "<a href='excluir.php?id=" . $cat["id"] . "'>Excluir</a>" . "</td>";
                        echo "</tr>";    
                    }
                ?>
            </table>
        </div>
    </body>
</html>
