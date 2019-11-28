        <h2>Ver Endereço</h2> 
        <p> Logradouro: <?=$endereco['logradouro']?></p>
        <p> Número: <?=$endereco['numero']?></p>
        <p> Complemento: <?=$endereco['complemento']?></p>
        <p> Bairro: <?=$endereco['bairro']?></p>
        <p> Cidade: <?=$endereco['cidade']?></p>
        <p> Cep: <?=$endereco['cep']?></p>
        
     <?php if (acessoPegarPapelDoUsuario() == 'admin') { ?> 
         <p> Id: <?=$endereco['idEndereco']?></p>
     <?php } ?>
 
  