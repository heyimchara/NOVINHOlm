<?php

function adicionarEndereco($cod_cliente,$logradouro,$numero,$complemento, $bairro,$cidade,$cep){
    $comando = "INSERT INTO endereco (cod_cliente,logradouro,numero,complemento,bairro,cidade,cep)"
            . "VALUES ('$cod_cliente','$logradouro','$numero','$complemento', '$bairro','$cidade','$cep')";
    $resultado = mysqli_query($conexao = conn(), $comando);
    if(!$resultado){ die('Erro no cadastro!' . mysqli_error($conexao));}
    return 'Cadastrado com sucesso!';
}

function pegarTodosEnderecos(){
    $sql = "SELECT * FROM endereco";
    $resultado = mysqli_query(conn(),$sql);
    $enderecos = array();
    while ($linha = mysqli_fetch_assoc($resultado)){
        $enderecos[] = $linha;
    }
   return $enderecos; 
}

function pegarEnderecoPorId($idEndereco){
    $sql = "SELECT * FROM endereco WHERE idEndereco = $idEndereco";
    $resultado = mysqli_query(conn(), $sql);
    $endereco = mysqli_fetch_assoc($resultado);
    return $endereco;
}

function deletarEndereco($idEndereco){
    $sql = "DELETE FROM endereco WHERE idEndereco = $idEndereco";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado){
     die('Erro ao deletar endereco' . mysqli_error($cnx));   
    }
    return 'Endereco deletado com sucesso!';
}
function editarEndereco($idEndereco,$logradouro,$numero,$complemento, $bairro,$cidade,$cep){
    $sql = "UPDATE endereco SET logradouro = '$logradouro',numero ='$numero',complemento='$complemento',bairro= '$bairro',cidade='$cidade',cep='$cep'  WHERE idEndereco = $idEndereco";
    $resultado = mysqli_query($conexao = conn(), $sql);
     if(!$resultado){ die('Erro ao editar endereco!' . mysqli_error($conexao)); }
    return 'Endereco alterado com sucesso!';
}

function pegarEnderecosPorUsuario($cod_cliente){
    $sql = "SELECT * FROM endereco WHERE cod_cliente = $cod_cliente" ;
    $resultado = mysqli_query(conn(),$sql);
    $endereco = array();
    while ($linha = mysqli_fetch_assoc($resultado)){
        $endereco[] = $linha;
    }
   return $endereco; 
}