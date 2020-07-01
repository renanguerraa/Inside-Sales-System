<!DOCTYPE html>
<html>
    <head>
        <title>Listar - Clientes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Css/style.css">
    </head>
    <body>
        <div class="container">
            <a href="../indexAdm.html">Voltar</a>
            <h1>Listar - <span class="badge badge-warning">Clientes</span></h1> <br>
            
            <table class="table table-hover table-bordered">
                <tr class="thead-dark">
                    <th>Nome</th>                    
                    <th>CPF/CNPJ</th>
                    <th>Telefone</th>
                    <th>Rua</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Cep</th>
                    <th colspan="2">Gerenciar</th>
                </tr>
                <?php
                    include_once '../../Funcoes/BancoDeDados/bdConn.php';
                    $conexao = conectar();
                    $sql = "Select * from cliente order by nome_cli";
                    $resultado = $conexao -> query($sql);
                    
                    foreach($resultado as $cli){
                        echo "<tr>";
                            echo "<td>" . $cli["nome_cli"] . "</td>";
                            echo "<td>" . $cli["cpf_cnpj_cli"] . "</td>";
                            echo "<td>" . $cli["numero_cli"] . "</td>";
                            echo "<td>" . $cli["endereco_cli"] . "</td>";
                            echo "<td>" . $cli["bairro_cli"] . "</td>";
                            echo "<td>" . $cli["cidade_cli"] . "</td>";
                            echo "<td>" . $cli["estado_cli"] . "</td>";
                            echo "<td>" . $cli["cep_cli"] . "</td>";
                            echo "<td>" . "<a href='editar.php?cpf_cnpj_cli=". $cli["cpf_cnpj_cli"]. "'>Editar</a>" . "</td>";
                            echo "<td>" . "<a href='excluir.php?cpf_cnpj_cli=" . $cli["cpf_cnpj_cli"] . "'>Excluir</a>" . "</td>";
                        echo "</tr>";    
                    }
                ?>
            </table>
        </div>
    </body>
</html>
