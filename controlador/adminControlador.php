<?php

require_once 'modelo/adminModelo.php';
require_once 'modelo/produtoModelo.php';


function listaProdutosQuantidade() {
    $dados = array();
    $dados["admin"] = pegarProdutosQuantidade();
    exibir("admin/listaProdutosQuantidade", $dados);
}
function listaProdutosCategoria() {
    $dados = array();
    $dados["admin"] = pegarProdutoCategoria();
    exibir("admin/listaProdutosCategoria", $dados);
}
function listaPedidosRealizadosDatas() {
    if (ehPost()){
    $datad1 = $_POST ['datad1'];
    $datad2= $_POST ['datad2'];
    $dados = array();
    $dados["admin"] = pegarTodosPedidosDatas($datad1,$datad2); 
    exibir("admin/listaPedidosRealizadosDatas", $dados);
}else{
    exibir("admin/data");
} 
}
function listaPedidosEstado() {
    $dados = array();
    $dados["admin"] = pegarPedidosEstado();
    exibir("admin/listaPedidosEstado", $dados);
} 
function Totalfaturamento() {
    if (ehPost()){
    $fatu = $_POST ['tipo'];
    $dados = array();
    $dados["admin"] = pegarTodosFaturamentos($fatu); 
    exibir("admin/Totalfaturamento", $dados);
}      else{
    exibir("admin/faturamento");
     } 
}

