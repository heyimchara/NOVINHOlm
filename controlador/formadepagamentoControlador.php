<?php

require_once 'modelo/formadepagamentoModelo.php';
require_once 'servico/validacaoServico.php';

/** admin */
function index(){
    redirecionar("formadepagamento/listarFormasDePagamento");
}

/** admin */
function adicionar(){
    if (ehPost()){
        $descricao = $_POST["descricao"];
        $erros = array();
        
if (valida_nao_vazio($descricao) != NULL){
         $erros[]= "Voce deve inserir um valor!."; 
     }
     
if(count($erros) > 0){
         $dados = array();
         $dados["erros"] = $erros;
         exibir("formadepagamento/formulario", $dados);
     }else{
         $mensagem = adicionarFormadePagamento($descricao);
        redirecionar("formadepagamento/listarFormasDePagamento");
     }
    }else{
   exibir("formadepagamento/formulario");  
     }    
}

/** admin */
function listarFormasDePagamento(){
    $dados = array();
    $dados["formasdepagamento"] = pegarTodasFormasDePagamento();
    exibir("formadepagamento/listar", $dados);
}

/** admin */
function ver($cod_formadepagamento){
    $dados["formadepagamento"] = pegarFormaDePagamentoPorId($cod_formadepagamento);
    exibir("formadepagamento/visualizar", $dados);
}

/** admin */
function deletar($cod_formadepagamento){
    $msg = deletarFormaDePagamento($cod_formadepagamento);
    redirecionar("formadepagamento/listarFormasDePagamento");
}

/** admin */ 
function editar($cod_formadepagamento){
     if (ehPost()){
       $descricao = $_POST["descricao"];
       
       editarFormaDePagamento($cod_formadepagamento, $descricao);
       redirecionar("formadepagamento/listarFormasDePagamento");
} else{
    $dados["formadepagamento"] = pegarFormaDePagamentoPorId($cod_formadepagamento);
    exibir("formadepagamento/formulario", $dados);
} 
}