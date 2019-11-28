<h2>Listar Clientes</h2>
        
   <table class="table">
            <thead>
                <tr>
                    <th>Cod_cliente</th>
                    <th>Nome</th>
                    <th>Ver Detalhes</th>
                    <th>Deletar</th>
                    <th>Editar</th>
                </tr>
            </thead>
        <?php foreach ($clientes as $cliente): ?> 
            <tr>
                <td><?=$cliente['cod_cliente']?></td>
                <td><?=$cliente['nome']?></td>
                <td><a href="./cliente/ver/<?=$cliente['cod_cliente']?>">Ver</a></td>
                 <td><a href="./cliente/deletar/<?=$cliente['cod_cliente']?>">Deletar</a></td>
                  <td><a href="./cliente/editar/<?=$cliente['cod_cliente']?>">Editar</a></td>
                
            </tr>
        <?php endforeach; ?>
   </table> 
        <br>
        <a href="./cliente/cadastro" class="btn btn-primary">Novo Cliente</a>       
