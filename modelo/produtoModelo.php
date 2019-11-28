<?php
   
function adicionarProduto($nome,$descricao,$preco,$cod_categoria,$destino,$estoque_minimo,$estoque_maximo){
    $comando = "INSERT INTO produto (nome, preco, descricao, cod_categoria, imagem, estoque_minimo, estoque_maximo)"
            . "VALUES ('$nome', '$preco', '$descricao', '$cod_categoria', '$destino', '$estoque_minimo', '$estoque_maximo')";
    $resultado = mysqli_query($conexao = conn(), $comando);
    if(!$resultado){ die('Erro no cadastro!' . mysqli_error($conexao));}
    return 'Cadastrado com sucesso!';
}

function pegarTodosProdutos(){
    $sql = "SELECT * FROM produto";
    $resultado = mysqli_query(conn(),$sql);
    $produtos = array();
    while ($linha = mysqli_fetch_assoc($resultado)){
        $produtos[] = $linha;
    }
   return $produtos; 
}

function pegarProdutoPorId($cod_produto){
    $sql = "SELECT * FROM produto WHERE cod_produto = $cod_produto";
    $resultado = mysqli_query(conn(), $sql);
    $cadastro_produto = mysqli_fetch_assoc($resultado);
    return $cadastro_produto;
}

function deletarProduto($cod_produto){
    $sql = "DELETE FROM produto WHERE cod_produto = $cod_produto";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado){
        die('Erro ao deletar produto' . mysqli_error($cnx));
    }
      return 'Produto deletado com sucesso!';
}

function editarProduto($cod_produto, $nome, $descricao, $preco, $cod_categoria, $destino, $estoque_minimo, $estoque_maximo){
    $sql = "UPDATE produto SET nome = '$nome', descricao = '$descricao', preco = '$preco',cod_categoria = '$cod_categoria', imagem= '$destino', estoque_minimo = '$estoque_minimo', estoque_maximo = '$estoque_maximo'  WHERE cod_produto = $cod_produto";
    $resultado = mysqli_query($conexao = conn(), $sql);
     if(!$resultado){ die('Erro ao editar produto!' . mysqli_error($conexao)); }
    return 'Produto alterado com sucesso!';
}

function PegarProdutoPorNome($nome){
    $sql = "SELECT * FROM produto WHERE upper(nome) like upper('%".$nome."%')";
    $result = mysqli_query(conn(), $sql);
    $produtos = array();
    while($linha = mysqli_fetch_assoc($result)){
        $produtos[] = $linha;
    }
    return $produtos;
}

?>
