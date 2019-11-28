<?php

require_once 'modelo/categoriaModelo.php';
require_once 'servico/validacaoServico.php';

/** admin */

function adicionarCategoria(){
    if (ehPost()){
        $nome = $_POST["nome"];
        $erros = array();
        
if (valida_nao_vazio($nome) != NULL){
         $erros[]= "Voce deve inserir um valor!."; 
     }
     
if(count($erros) > 0){
         $dados = array();
         $dados["erros"] = $erros;
         exibir("categoria/formulario", $dados);
     }else{
         $mensagem = adicionarCategorias($nome);
        redirecionar("categoria/listarCategorias");
     }
    }else{
   exibir("categoria/formulario");  
     }    
}

/** admin */

function listarCategorias(){
    $dados = array();
    $dados["categorias"] = pegarTodasCategorias();
    exibir("categoria/listar", $dados);
}

/** admin */

function ver($cod_categoria){
    $dados["categoria"] = pegarCategoriaPorId($cod_categoria);
    exibir("categoria/visualizar", $dados);
}

/** admin */

function deletar($cod_categoria){
    $msg = deletarCategoria($cod_categoria);
    redirecionar("categoria/listarCategorias");
}

/** admin */

function editar($cod_categoria){
     if (ehPost()){
       $nome = $_POST["nome"];
       
       editarCategoria($nome, $cod_categoria);
       redirecionar("categoria/listarCategorias");
} else{
    $dados["categoria"] = pegarCategoriaPorId($cod_categoria);
    exibir("categoria/formulario", $dados);
} 
}