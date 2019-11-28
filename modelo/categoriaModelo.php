<?php

function adicionarCategorias($nome){
    $comando = "INSERT INTO categoria (nome)"
            . "VALUES ('$nome')";
    $resultado = mysqli_query($conexao = conn(), $comando);
    if(!$resultado){ die('Erro no cadastro!' . mysqli_error($conexao));}
    return 'Cadastrado com sucesso!';
}

function pegarTodasCategorias(){
    $sql = "SELECT * FROM categoria";
    $resultado = mysqli_query(conn(),$sql);
    $categorias = array();
    while ($linha = mysqli_fetch_assoc($resultado)){
        $categorias[] = $linha;
    }
   return $categorias; 
}

function pegarCategoriaPorId($cod_categoria){
    $sql = "SELECT * FROM categoria WHERE cod_categoria = $cod_categoria";
    $resultado = mysqli_query(conn(), $sql);
    $categoria = mysqli_fetch_assoc($resultado);
    return $categoria;
}

function deletarCategoria($cod_categoria){
    $sql = "DELETE FROM categoria WHERE cod_categoria = $cod_categoria";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!resultado){
     die('Erro ao deletar categoria' . mysqli_error($cnx));   
    }
    return 'Categoria deletada com sucesso!';
}
function editarCategoria($nome,$cod_categoria){
    $sql = "UPDATE categoria SET nome = '$nome'  WHERE cod_categoria = $cod_categoria";
    $resultado = mysqli_query($conexao = conn(), $sql);
     if(!$resultado){ die('Erro ao editar categoria!' . mysqli_error($conexao)); }
    return 'Categoria alterada com sucesso!';
}
