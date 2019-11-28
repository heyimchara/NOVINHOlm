<?php

if (acessoPegarPapelDoUsuario() == 'admin') {              
     function adicionarCadastro($nome,$cpf,$senha,$email,$sexo,$tipousuario,$dataNasc){
    $comando = "INSERT INTO cliente (nome, cpf, senha, email, sexo, tipousuario, dataNasc)"
            . "VALUES ('$nome','$cpf','$senha','$email','$sexo','$tipousuario', '$dataNasc')";
    $resultado = mysqli_query($conexao = conn(), $comando);
    if(!$resultado){ die('Erro no cadastro!' . mysqli_error($conexao));}
    return 'Cadastrado com sucesso!';
}
}else{
     function adicionarCadastro($nome,$cpf,$senha,$email,$sexo,$dataNasc){
    $comando = "INSERT INTO cliente (nome, cpf, senha, email, sexo, tipousuario, dataNasc)"
            . "VALUES ('$nome','$cpf','$senha','$email','$sexo','user', '$dataNasc')";
    $resultado = mysqli_query($conexao = conn(), $comando);
    if(!$resultado){ die('Erro no cadastro!' . mysqli_error($conexao));}
    return 'Cadastrado com sucesso!';
}
}
  
function pegarTodosClientes(){
    $sql = "SELECT * FROM cliente";
    $resultado = mysqli_query(conn(),$sql);
    $clientes = array();
    while ($linha = mysqli_fetch_assoc($resultado)){
        $clientes[] = $linha;
    }
   return $clientes; 
}

function pegarUsuarioPorId($cod_cliente){
    $sql = "SELECT * FROM cliente WHERE cod_cliente = $cod_cliente";
    $resultado = mysqli_query(conn(), $sql);
    $cliente = mysqli_fetch_assoc($resultado);
    return $cliente;
}

function deletarCliente($cod_cliente){
    $sql = "DELETE FROM cliente WHERE cod_cliente = $cod_cliente";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado){
        die('Erro ao deletar cliente' . mysqli_error($cnx));
    }
      return 'Cliente deletado com sucesso!';
}

if (acessoPegarPapelDoUsuario() == 'admin') {              
function editarCliente($cod_cliente,$nome,$cpf,$senha,$email,$sexo,$tipousuario,$dataNasc){
    $sql = "UPDATE cliente SET nome = '$nome', cpf = '$cpf',senha = '$senha',email='$email',sexo='$sexo',tipousuario='$tipousuario',dataNasc= '$dataNasc'  WHERE cod_cliente = $cod_cliente";
    $resultado = mysqli_query($conexao = conn(), $sql);
     if(!$resultado){ die('Erro ao editar cliente!' . mysqli_error($conexao)); }
    return 'Cliente alterado com sucesso!';
}
}else{
function editarCliente($cod_cliente,$nome,$cpf,$senha,$email,$sexo,$dataNasc){
    $sql = "UPDATE cliente SET nome = '$nome', cpf = '$cpf',senha = '$senha',email='$email',sexo='$sexo',dataNasc= '$dataNasc'  WHERE cod_cliente = $cod_cliente";
    $resultado = mysqli_query($conexao = conn(), $sql);
     if(!$resultado){ die('Erro ao editar cliente!' . mysqli_error($conexao)); }
    return 'Cliente alterado com sucesso!';
}
}


function pegarUsuarioPorEmailSenha($email, $senha) {
    $sql = "SELECT * FROM cliente WHERE email= '$email' and senha = '$senha'";
    $resultado = mysqli_query(conn(), $sql);
    $cliente = mysqli_fetch_assoc($resultado);
    return $cliente;
}



?>
  
