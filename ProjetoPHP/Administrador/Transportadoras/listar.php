<!DOCTYPE html>
<html>
    <head>
        <title>Listar - Transportadoras</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Css/style.css">
    </head>
    <body>
        <div class="container">
            <a href="../indexAdm.html">Voltar</a>
            <h1>Listar - <span class="badge badge-warning">Transportadoras</span></h1> <br>
            
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
                    $sql = "Select * from transportadora order by nome_tras";
                    $resultado = $conexao -> query($sql);
                    
                    foreach($resultado as $trans){
                        echo "<tr>";
                            echo "<td>" . $trans["nome_tras"] . "</td>";
                            echo "<td>" . $trans["cpf_cnpj_transp"] . "</td>";
                            echo "<td>" . $trans["numero_trans"] . "</td>";
                            echo "<td>" . $trans["endereco_trans"] . "</td>";
                            echo "<td>" . $trans["bairro_trans"] . "</td>";
                            echo "<td>" . $trans["cidade_trans"] . "</td>";
                            echo "<td>" . $trans["estado_trans"] . "</td>";
                            echo "<td>" . $trans["cep_trans"] . "</td>";
                            echo "<td>" . "<a href='editar.php?cpf_cnpj_transp=". $trans["cpf_cnpj_transp"]. "'>Editar</a>" . "</td>";
                            echo "<td>" . "<a href='excluir.php?cpf_cnpj_transp=" . $trans["cpf_cnpj_transp"] . "'>Excluir</a>" . "</td>";
                        echo "</tr>";    
                    }
                ?>
            </table>
        </div>
    </body>
</html>
