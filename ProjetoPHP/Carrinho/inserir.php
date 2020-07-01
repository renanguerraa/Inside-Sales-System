<?php
include_once '../Funcoes/BancoDeDados/bdConn.php';
if (
        (   isset($_REQUEST["txtcpfCli"]) &&
            isset($_REQUEST["txtcpfTransp"]) &&
            isset($_REQUEST["txtcpfVend"]) &&
            isset($_REQUEST["txtvalCom"]) &&
            isset($_REQUEST["txtvalTransp"]) &&
            isset($_REQUEST["quantidade"]) &&
            isset($_REQUEST["produtos"]) 
        )
    )
{   
    $produtos = $_REQUEST["produtos"];
    $quantidade = $_REQUEST["quantidade"];

    $conexao = conectar(); 

    foreach($quantidade as $key => $quant){
        $sql = "update produto set quantidade = quantidade - :quant where codigo_prod = :prod";

        $comandoPreparado = $conexao -> prepare($sql);

        $comandoPreparado -> bindParam(":quant", $quantidade[$key]);
        $comandoPreparado -> bindParam(":prod", $produtos[$key]);

        $conexao -> beginTransaction();
        $comandoPreparado -> execute();
        $conexao -> commit();
    }

    $sql = "insert into compra(cpf_cnpj_cli, cpf_cnpj_transp, cpf_cnpj_vend, data, valor_comissao, valor_transporte) "
           . "values (:valCPFc, :valCPFt, :valCPFv, now(), :valCom, :valTrans)";

    $comandoPreparado = $conexao -> prepare($sql);
    $comandoPreparado -> bindParam(":valCPFc", $_REQUEST["txtcpfCli"]);
    $comandoPreparado -> bindParam(":valCPFt", $_REQUEST["txtcpfTransp"]);
    $comandoPreparado -> bindParam(":valCPFv", $_REQUEST["txtcpfVend"]);
    $comandoPreparado -> bindParam(":valCom", $_REQUEST["txtvalCom"]);
    $comandoPreparado -> bindParam(":valTrans", $_REQUEST["txtvalTransp"]);
    
    $conexao -> beginTransaction();
    
    try{
        $comandoPreparado -> execute();
        $conexao -> commit();

        try{
            
            $sql = "select codigo_prod, valor_unitario from produto";
            $comandoPreparado = $conexao -> prepare($sql);
            $comandoPreparado -> execute();
            $preco = $comandoPreparado -> fetchAll();

            $sql = "select max(numero_compra) max_nc from compra";
            $result = $conexao -> query($sql);

            foreach($result as $res){
                $nc = $res["max_nc"];

            }
            
            $sql = "insert into possui(numero_compra, codigo_prod, valor, quantidade) "
                    . "values (:valNC, :valCodProd, :valValor, :valQuant)";

            foreach($produtos as $key => $prod){

                $comandoPreparado = $conexao -> prepare($sql);

                $comandoPreparado -> bindParam(":valNC", $nc);                
                $comandoPreparado -> bindParam(":valCodProd", $produtos[$key]);

                foreach($preco as $p){
                    if($produtos[$key] == $p["codigo_prod"]){
                        $valor = $p["valor_unitario"] * (int) $quantidade[$key];
                    }
                }

                $comandoPreparado -> bindParam(":valValor", $valor);
                $comandoPreparado -> bindParam(":valQuant", $quantidade[$key]);

                $conexao -> beginTransaction();
                $comandoPreparado -> execute();
                $conexao -> commit();
                
                header("Location: notaFiscal.php");

            }

        } catch (PDOException $e){
            echo $e -> getMessage();
            $conexao -> rollback();

        }

    } catch (PDOException $e){
        echo $e -> getMessage();
        $conexao -> rollback();

    }
}
