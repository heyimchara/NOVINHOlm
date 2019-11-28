<?php

require_once 'modelo/cupomModelo.php';
require_once 'servico/validacaoServico.php';

/** admin */
function adicionar(){
    if (ehPost()){
        $nome = $_POST["nome"];
        $desconto = $_POST["desconto"];
        $erros = array();
        
if (valida_nao_vazio($nome) != NULL){
         $erros[]= "Voce deve inserir um valor!."; 
     }
if (valida_nao_vazio($desconto) != NULL){
         $erros[]= "Voce deve inserir um valor!."; 
     }
     
if(count($erros) > 0){
         $dados = array();
         $dados["erros"] = $erros;
         exibir("cupom/formulario", $dados);
     }else{
         $mensagem = adicionarCupom($nome,$desconto);
        redirecionar("cupom/listarCupom");
     }
    }else{
   exibir("cupom/formulario");  
     }    
}

/** admin */
function listarCupom(){
    $dados = array();
    $dados["cupons"] = pegarTodosCupom();
    exibir("cupom/listar", $dados);
}

/** admin */
function ver($id_cupom){
    $dados["cupom"] = pegarCupomPorId($id_cupom);
    exibir("cupom/visualizar", $dados);
}

/** admin */
function deletar($id_cupom){
    $msg = deletarCupom($id_cupom);
    redirecionar("cupom/listarCupom");
}

/** admin */
function editar($id_cupom){
     if (ehPost()){
      $nome = $_POST["nome"];
      $desconto = $_POST["desconto"];
       
       editarCupom($nome,$desconto,$id_cupom);
       redirecionar("cupom/listarCupom");
} else{
    $dados["cupom"] = pegarCupomPorId($id_cupom);
    exibir("cupom/formulario", $dados);
} 
}

