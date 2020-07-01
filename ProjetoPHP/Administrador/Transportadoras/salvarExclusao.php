<?php

    $valCPF = $_REQUEST["txtCPF"];

    include_once '../../Funcoes/BancoDeDados/bdConn.php';
    
    $conexao = conectar();
    
    try{
        $sql = "delete from transportadora where cpf_cnpj_transp = '$valCPF'"; 
        $conexao->query($sql);
        header("Location:listar.php");
    }

    catch (PDOException $e) {
        header("Location: ../Erros/vinculado.html");
    }

