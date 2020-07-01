<?php
include_once '../../Funcoes/BancoDeDados/bdConn.php';
if (
        (   isset($_REQUEST["txtNome"]) &&
            isset($_REQUEST["txtCPF"]) 
        )
    )
{   
    $conexao = conectar(); 
    $sql = "insert into vendedor(cpf_cnpj_vend, nome_vend) "
           . "values (:valCPF, :valNome)";
   
    $comandoPreparado = $conexao -> prepare($sql);
    $comandoPreparado -> bindParam(":valNome", $_REQUEST["txtNome"]);
    $comandoPreparado -> bindParam(":valCPF", $_REQUEST["txtCPF"]);
   
    $conexao -> beginTransaction();
   
    try{
        $comandoPreparado -> execute();
        $conexao -> commit();
        header("Location:listar.php");
    }
        catch (PDOException $e){
        header("Location: ../Erros/repetido.html");
    }
}
