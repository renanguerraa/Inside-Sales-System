<?php

$valID = $_REQUEST["txtID"];

include_once '../../Funcoes/BancoDeDados/bdConn.php';

$conexao = conectar();

    try{
        $sql = "delete from categoria where id = '$valID'"; 
        $conexao->query($sql);
        header("Location:listar.php");
    }

    catch (PDOException $e) {
        header("Location: ../Erros/vinculado.html");
    }

