<h2>Ver detalhes do cliente</h2>
        <p>Id: <?=$cliente['cod_cliente']?></p>
        <p>Nome: <?=$cliente['nome']?></p>   
        <p>E-mail: <?=$cliente['email']?></p> 
        <p>CPF: <?=$cliente['cpf']?></p> 
        <p>Sexo: <?=$cliente['sexo']?></p>
        <p>Data de Nascimento: <?=$cliente['dataNasc']?></p>
        <p>Tipo de usuario: <?=$cliente['tipousuario']?></p>
        <p>Senha: <?=$cliente['senha']?></p> 
        
        <br>

<?php
require_once 'visao/endereco/listar.visao.php';
?>

<a href = "./endereco/adicionar/<?=$cliente['cod_cliente']?>">Novo Endereço</a><br><br>
  
<a href = "./cliente/editar/<?=$cliente['cod_cliente']?>">Editar</a><br><br>
<a href = "./login/logout">Sair</a>
  
       
   
