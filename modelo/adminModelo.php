<?php

function pegarProdutosQuantidade() {
    $sql = "select * from produto";
    $resultado = mysqli_query(conn(), $sql);
    $produto = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $produto[] = $linha;
    }
    return $produto;
}
function pegarProdutoCategoria() {
    $sql = "select produto.nome, categoria.nome as categ 
            from produto
            inner join categoria 
            on categoria.cod_categoria = produto.cod_categoria 
            order by categoria.nome";
    $resultado = mysqli_query(conn(), $sql);
    $produto = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $produto[] = $linha;
    }
    return $produto;
}
function pegarTodosPedidosDatas($datad1, $datad2) {
    $sql = "select * from pedido where datacompra between '$datad1' and '$datad2'";
    $resultado = mysqli_query(conn(), $sql);
    $produto = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $produto[] = $linha;
    }
    return $produto;
} 
function pegarPedidosEstado() {
    $sql = "select pedido.datacompra, pedido.total, endereco.cidade  
            from pedido
            inner join endereco 
            on endereco.idEndereco = pedido.logradouro 
            order by endereco.cidade";
 
    $resultado = mysqli_query(conn(), $sql);
    $pedido = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $pedido[] = $linha;
    }
    return $pedido;
}

function pegarTodosFaturamentos($tipoFaturamento) {
switch ($tipoFaturamento) {
case 'S':
$sql = "SELECT WEEK(pedido.datacompra) AS data, SUM(produto.preco * pedido_produto.quantidade) AS fatura
FROM produto 
INNER JOIN pedido_produto 
ON produto.cod_produto = pedido_produto.cod_produto
INNER JOIN pedido 
ON pedido_produto.id_pedido = pedido.id_pedido
GROUP BY WEEK(pedido.datacompra, 0)";
break;
case 'M':
$sql = "SELECT MONTH(pedido.datacompra) AS data, SUM(produto.preco * pedido_produto.quantidade) AS fatura
FROM produto 
INNER JOIN pedido_produto 
ON produto.cod_produto = pedido_produto.cod_produto
INNER JOIN pedido 
ON pedido_produto.id_pedido = pedido.id_pedido
GROUP BY MONTH(pedido.datacompra)";
break;
case 'A':
$sql = "SELECT YEAR(pedido.datacompra) AS data, SUM(produto.preco * pedido_produto.quantidade) AS fatura
FROM produto 
INNER JOIN pedido_produto 
ON produto.cod_produto = pedido_produto.cod_produto
INNER JOIN pedido 
ON pedido_produto.id_pedido = pedido.id_pedido
GROUP BY YEAR(pedido.datacompra)";
break;
}
$resultado = mysqli_query(conn(), $sql);
$produto = array();
while ($linha = mysqli_fetch_assoc($resultado)) {
$produto[] = $linha;
}
return $produto;
}