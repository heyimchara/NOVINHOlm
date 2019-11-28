<?php

function adicionarFormadePagamento($descricao){
    $comando = "INSERT INTO forma_de_pagamento(descricao)"
            . "VALUES ('$descricao')";
    $resultado = mysqli_query($conexao = conn(), $comando);
    if(!$resultado){ die('Erro no cadastro!' . mysqli_error($conexao));}
    return 'Cadastrado com sucesso!';
}

function pegarTodasFormasDePagamento(){
    $sql = "SELECT * FROM forma_de_pagamento";
    $resultado = mysqli_query(conn(),$sql);
    $formasdepagamento = array();
    while ($linha = mysqli_fetch_assoc($resultado)){
        $formasdepagamento[] = $linha;
    }
   return $formasdepagamento; 
}

function pegarFormaDePagamentoPorId($cod_formadepagamento){
    $sql = "SELECT * FROM forma_de_pagamento WHERE cod_formadepagamento = $cod_formadepagamento";
    $resultado = mysqli_query(conn(), $sql);
    $formadepagamento = mysqli_fetch_assoc($resultado);
    return $formadepagamento;
}

function deletarFormaDePagamento($cod_formadepagamento){
    $sql = "DELETE FROM forma_de_pagamento WHERE cod_formadepagamento = $cod_formadepagamento";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!resultado){
     die('Erro ao deletar forma de pagamento!' . mysqli_error($cnx));   
    }
    return 'Forma de pagamento deletada com sucesso!';
}
function editarFormaDePagamento($cod_formadepagamento, $descricao){
    $sql = "UPDATE forma_de_pagamento SET descricao = '$descricao'  WHERE cod_formadepagamento = $cod_formadepagamento";
    $resultado = mysqli_query($conexao = conn(), $sql);
     if(!$resultado){ die('Erro ao editar forma de pagamento!' . mysqli_error($conexao)); }
    return 'Forma de pagamento alterada com sucesso!';
}