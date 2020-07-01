<?php
if (
    (   isset($_REQUEST["txtID"]) &&
        isset($_REQUEST["txtNome"]) &&
        isset($_REQUEST["txtDesc"]) 
    )
){
    include_once '../../Funcoes/BancoDeDados/bdConn.php';
    $conexao = conectar(); 

    $sql[0] = "delete from imagem where codigo_prod = :IdProd;";
    $sql[1] = "delete from produto where codigo_prod = :IdProd;";
    
    $comandoPreparado[0] = $conexao->prepare($sql[0]);
    $comandoPreparado[0]->bindParam(":IdProd", $_REQUEST["txtID"]);

    $comandoPreparado[1] = $conexao->prepare($sql[1]);
    $comandoPreparado[1]->bindParam(":IdProd", $_REQUEST["txtID"]);

    $conexao->beginTransaction();

    try{
        $comandoPreparado[0]->execute();
        $comandoPreparado[1]->execute();
        $conexao->commit();
        header("Location:listar.php");

    }catch (PDOException $e){
        header("Location: ../Erros/vinculado.html");
    }   
}
