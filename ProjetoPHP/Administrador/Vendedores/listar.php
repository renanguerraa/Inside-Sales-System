<!DOCTYPE html>
<html>
    <head>
        <title>Listar - Vendedores</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="wcpf_cnpj_vendth=device-wcpf_cnpj_vendth, initial-scale=1.0">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Css/style.css">
    </head>
    <body>
        <div class="container">
            <a href="../indexAdm.html">Voltar</a>
            <h1>Listar - <span class="badge badge-warning">Vendedores</span></h1> <br>
            
            <table class="table table-hover table-bordered">
                <tr class="thead-dark">
                    <th>CPF/CNPJ</th>                    
                    <th>Nome</th>
                    <th colspan="2">Gerenciar</th>
                </tr>
                <?php
                    include_once '../../Funcoes/BancoDeDados/bdConn.php';
                    $conexao = conectar();
                    $sql = "Select * from vendedor order by cpf_cnpj_vend";
                    $resultado = $conexao -> query($sql);
                    
                    foreach($resultado as $vendedor){
                        echo "<tr>";
                            echo "<td>" . $vendedor["cpf_cnpj_vend"] . "</td>";
                            echo "<td>" . $vendedor["nome_vend"] . "</td>";
                            echo "<td>" . "<a href='editar.php?cpf_cnpj_vend=". $vendedor["cpf_cnpj_vend"]. "'>Editar</a>" . "</td>";
                            echo "<td>" . "<a href='excluir.php?cpf_cnpj_vend=" . $vendedor["cpf_cnpj_vend"] . "'>Excluir</a>" . "</td>";
                        echo "</tr>";    
                    }
                ?>
            </table>
        </div>
    </body>
</html>
