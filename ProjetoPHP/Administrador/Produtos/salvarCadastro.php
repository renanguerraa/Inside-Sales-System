<?php
include_once '../../Funcoes/BancoDeDados/bdConn.php';
const MBYTE = 2**20;
if (
        (   isset($_FILES["arquivo"]) &&
            isset($_REQUEST["txtCod"]) &&
            isset($_REQUEST["txtNome"]) &&
            isset($_REQUEST["txtDesc"]) &&
            isset($_REQUEST["selCategoria"]) &&
            isset($_REQUEST["txtVal"]) &&
            isset($_REQUEST["txtQtd"]) &&
            isset($_REQUEST["txtUnVenda"]) &&
            isset($_REQUEST["txtPeso"]) &&
            isset($_REQUEST["txtDim"]) 
        )
    )
{   
   $conexao = conectar(); 
   $total = count($_FILES['arquivo']['name']);
   $sql = array();

   //Prepara o insert de cada arquivo
   for($i=1 ; $i <= $total ; $i++ ){
       // Variáveis para arquivos
       $diretorioImagem = "Imagens/";
       $nomeTemporario = $_FILES["arquivo"]["tmp_name"][$i-1];
       $nomeOriginal = $_FILES["arquivo"]["name"][$i-1];
       $tamanho = $_FILES["arquivo"]["size"][$i-1];
       $tipo = $_FILES["arquivo"]["type"][$i-1];
       $erro = $_FILES["arquivo"]["error"][$i-1];
       $tamanhomaximo = 10 * MBYTE;

       //Tratamento de erro
       switch ($erro) {
        case 0:
            $mensagem = "OK";
            break;
        case 1:
            $mensagem = "O arquivo enviado excede o limite definido para upload." ;
            break;
        case 2:
            $mensagem = "O arquivo enviado excede o limite definido para upload no formuilário HTML.";
            break;
        case 3:
            $mensagem = "Arquivo carregado parcialmente";
            break;
        case 4:
            $mensagem = "Nenhum arquivo foi enviado";
            break;
        case 6:
            $mensagem = "Pasta temporária ausente no servidor";
            break;
        case 7:
            $mensagem = "Falha ao escrever no disco";
            break;
        case 8:
            $mensagem = "Processo interrompido por uma das extensões do PHP";
            break;
        }

        if ($erro == 0){
            if($tamanho<=$tamanhomaximo){
                move_uploaded_file($nomeTemporario, $diretorioImagem.$nomeOriginal);
                $sql[$i] = "insert into imagem(codigo_prod, nome_arquivo) "
                ."values('".$_REQUEST["txtCod"]."', '$nomeOriginal'); "; 
            }else{
                $mensagem = "Arquivo $nomeOriginal possui $tamanho bytes e supera o tamamho máximo permitido de $tamanhomaximo bytes" ;
                header("Location:Erro.php?id=$mensagem");
            }
        }else{
            header("Location:Erro.php?id=$mensagem");
        }
    }
   
    $sql[0] = "insert into produto(codigo_prod, nome_pro, descricao, valor_unitario, quantidade, peso, dimensoes, unidade_Venda, id) "
    ."values (:valCod, :valNome, :valDesc, :valVal, :valQtd, :valPeso, :valDim, :valUnVenda, :valCategoria); ";
    
    $comandoPreparado = array();
    $comandoPreparado[0] = $conexao -> prepare($sql[0]);
    $comandoPreparado[0] -> bindParam(":valCod", $_REQUEST["txtCod"]);
    $comandoPreparado[0] -> bindParam(":valNome", $_REQUEST["txtNome"]);
    $comandoPreparado[0] -> bindParam(":valDesc", $_REQUEST["txtDesc"]);
    $comandoPreparado[0] -> bindParam(":valVal", $_REQUEST["txtVal"]);
    $comandoPreparado[0] -> bindParam(":valQtd", $_REQUEST["txtQtd"]);
    $comandoPreparado[0] -> bindParam(":valPeso", $_REQUEST["txtPeso"]);
    $comandoPreparado[0] -> bindParam(":valDim", $_REQUEST["txtDim"]);
    $comandoPreparado[0] -> bindParam(":valUnVenda", $_REQUEST["txtUnVenda"]);
    $comandoPreparado[0] -> bindParam(":valCategoria", $_REQUEST["selCategoria"]);
    
    $conexao -> beginTransaction();
    
    try{
        $comandoPreparado[0] -> execute();
        for($j=1 ; $j <= $total ; $j++ ){
            $comandoPreparado[$j] = $conexao -> prepare($sql[$j]);
            $comandoPreparado[$j] -> execute();
        }
        $conexao -> commit();
        header("Location:listar.php");
    }
    catch (PDOException $e){
        header("Location: ../Erros/repetido.html");
    }  

}