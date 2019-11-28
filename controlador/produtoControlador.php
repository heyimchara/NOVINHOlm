<?php
require_once 'servico/validacaoServico.php';
require_once 'modelo/categoriaModelo.php';
require_once 'modelo/produtoModelo.php';

/** anon */
function index(){
    redirecionar("produto/listarProdutos");
}

/** anon */
function visualizar (){
    $visualizar = array();
    $visualizar["nomeProd"] = "Moletom";
    $visualizar["descricao"] = "O material tem uma modelagem reta e apenas na cor preta";
    $visualizar["preco"] = " 109,99";
    
    exibir("produto/visualizar", $visualizar);
}

/** admin */
function adicionar(){
        
   if (ehPost()){
       $nome = $_POST["nome"];
       $preco = $_POST["preco"];
       $descricao = $_POST["descricao"];
       $cod_categoria = $_POST["cod_categoria"];
       $destino = './publico/img/' . $_FILES['imagem']['name'];
       $arquivo_tmp = $_FILES['imagem']['tmp_name'];
       $estoque_minimo = $_POST["estoque_minimo"];
       $estoque_maximo = $_POST["estoque_maximo"];
       
       move_uploaded_file( $arquivo_tmp, $destino );
       
       
       $erros = array();
       
       if (valida_nao_vazio($nome) != NULL){
          $erros[]= "Você deve inserir um valor no campo Nome.";    
      }
       if (valida_nao_vazio($descricao) != NULL){
          $erros[]= "Você deve inserir um valor no campo Descrição.";    
      }
      if (valida_nao_vazio($preco) != NULL){
          $erros[]= "Informe um valor valido.";    
      }
      if (valida_nao_vazio($estoque_minimo) != NULL){
          $erros[]= "Você deve inserir um valor válido.";    
      }
      if (valida_nao_vazio($estoque_maximo) != NULL){
          $erros[]= "Você deve inserir um valor válido.";    
      }
      
      if(count($erros) > 0 ){
          $dados = array();
          $dados["erros"] = $erros;
          exibir("produto/formulario", $dados);
      }else{
           $mensagem = adicionarProduto($nome, $descricao, $preco, $cod_categoria, $destino, $estoque_minimo, $estoque_maximo);
        redirecionar("produto/listarProdutos");
      }     
    }else{
      $dados["categorias"] = pegarTodasCategorias();
      exibir("produto/formulario", $dados);
   } 
  
}


/** anon */
function listarProdutos(){
    $dados = array();
    $dados["produtos"] = pegarTodosProdutos();
    exibir("produto/listar", $dados);
}

/** anon */
function ver($cod_produto){
    $dados["produto"] = pegarProdutoPorId($cod_produto);
    exibir("produto/visualizar", $dados);
}


/** admin */
function deletar($cod_produto){
    $msg = deletarProduto($cod_produto);
    redirecionar("produto/listarProdutos");
}

/** admin */
function editar($cod_produto){
     if (ehPost()){
       $nome = $_POST["nome"];
       $preco = $_POST["preco"];
       $descricao = $_POST["descricao"];
       $cod_categoria = $_POST["cod_categoria"];
      $destino = './publico/img/' . $_FILES['imagem']['name'];
       $arquivo_tmp = $_FILES['imagem']['tmp_name'];
       $estoque_minimo = $_POST["estoque_minimo"];
       $estoque_maximo = $_POST["estoque_maximo"];
     
        move_uploaded_file( $arquivo_tmp, $destino );
       
       
       editarProduto($cod_produto, $nome, $descricao, $preco, $cod_categoria, $destino, $estoque_minimo, $estoque_maximo);
       redirecionar("produto/listarProdutos");
} else{
    $dados["produto"] =  pegarProdutoPorId($cod_produto);
    $dados["categorias"] = pegarTodasCategorias();
    exibir("produto/formulario", $dados);
} 
}

/** user */
function comprar($cod_produto){
   // unset($_SESSION["carrinho"]); //p apagar sessão
    if(isset($_SESSION["carrinho"])) {
   $cadastro_produto = $_SESSION["carrinho"]; 
   } else {
        $cadastro_produto = array();
   }
   $cadastro_produto[] = $cod_produto;
   $_SESSION["carrinho"] = $cadastro_produto;
   redirecionar("sacola/mostrar"); 
}

/** anon */ 
function buscar(){
    if (ehPost()) {
        $nome = $_POST["nome"];
        $dados = array();
        $dados["produtos"] = PegarProdutoPorNome($nome);
        exibir('produto/listar', $dados);
    } else {
        exibir('produto/listar', $dados);
    }
}

