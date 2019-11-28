<?php

function salvaPedidos($cod_cliente, $cod_formadepagamento, $logradouro, $produtos, $total){
    $comando = "INSERT INTO pedido (cod_cliente, cod_formadepagamento, logradouro, datacompra, total)"
            . "VALUES ('$cod_cliente', '$cod_formadepagamento', '$logradouro', CURDATE(),  '$total')";
    $resultado = mysqli_query($conexao = conn(), $comando);
    if(!$resultado){ die('Erro no cadastro!' . mysqli_error($conexao));}
    $id_pedido = mysqli_insert_id($conexao);
    foreach ($produtos as $produto):
        $cod = $produto['cod_produto'];
    echo "produto: $cod";
    $comando = "INSERT INTO pedido_produto (cod_produto, id_pedido, quantidade)"
            . "VALUES ('$cod', '$id_pedido', '1')";    
    $resultado = mysqli_query($conexao = conn(), $comando);
    endforeach;
    
    if(!$resultado){ die('Erro no cadastro!' . mysqli_error($conexao));}
    return 'Cadastrado com sucesso!';
}

function listarPedidos($cod_cliente){
   $sql =  "SELECT p.*, c.*, fp.*, e.* , DATE_FORMAT(p.datacompra , '%d/%m/%Y') as data
            FROM pedido p
            INNER JOIN forma_de_pagamento fp
            ON p.cod_formadepagamento = fp.cod_formadepagamento
            INNER JOIN cliente c
            ON p.cod_cliente = c.cod_cliente
            INNER JOIN endereco e
            ON c.cod_cliente = e.cod_cliente
            WHERE c.cod_cliente = $cod_cliente";
   $resultado = mysqli_query($conexao = conn(), $sql);
   $pedido = array();
   while ($linha = mysqli_fetch_assoc($resultado)){
    $pedido[] = $linha;   
   }
   return $pedido;
}

function selecionarPedido($id_pedido){
    $comando =  "SELECT p.*, c.*, fp.*, e.* , DATE_FORMAT(p.datacompra , '%d/%m/%Y') as data
            FROM pedido p
            INNER JOIN forma_de_pagamento fp
            ON p.cod_formadepagamento = fp.cod_formadepagamento
            INNER JOIN cliente c
            ON p.cod_cliente = c.cod_cliente
            INNER JOIN endereco e
            WHERE id_pedido = $id_pedido";
    $resultado = mysqli_query($conexao = conn(), $comando);
    $pedido = mysqli_fetch_assoc($resultado);
    return $pedido;
}

function pegarPedidoProdutos($id_pedido){
    $comando = "SELECT * FROM pedido_produto pp
                INNER JOIN produto p
                ON pp.cod_produto = p.cod_produto 
                WHERE id_pedido = $id_pedido";
    $resultado = mysqli_query($conexao = conn(), $comando);
    $pedido = array();
    while ($linha = mysqli_fetch_assoc($resultado)){
    $pedido[] = $linha;   
   }
   return $pedido;
}
?>


            