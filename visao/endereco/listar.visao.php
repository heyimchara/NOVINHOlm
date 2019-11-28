<table class="table">
            <thead>
                <tr>
                    <th>Endereço</th>
                    <th>Ver</th>
                    <th>Deletar</th>
                    <td>Editar</td>
                </tr>
            </thead>
            
       
        <?php foreach ($enderecos as $endereco): ?> 
            <tr>
              
                <td><?=$endereco['logradouro']?></td>
                <td><a href="./endereco/ver/<?=$endereco['idEndereco']?>">Ver</a></td>
                <td><a href="./endereco/deletar/<?=$endereco['idEndereco']?>/<?=$endereco['cod_cliente']?>">Deletar</a></td>
                <td><a href="./endereco/editar/<?=$endereco['idEndereco']?>/<?=$endereco['cod_cliente']?>">Editar</a></td>
            </tr>
        <?php endforeach; ?>
   </table> 
        <br>
        