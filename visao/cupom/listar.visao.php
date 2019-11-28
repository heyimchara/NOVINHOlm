<h2>Listar Cupons</h2>
        
   <table class="table">
            <thead>
                <tr>
                    <th>Id_cupom</th>
                    <th>Nome</th>
                    <th>Ver Cupom</th>
                    <th>Deletar</th>
                    <th>Editar</th>
                </tr>
            </thead>
        <?php foreach ($cupons as $cupom): ?> 
            <tr>
                <td><?=$cupom['id_cupom']?></td>
                <td><?=$cupom['nomeCupom']?></td>
                <td><a href="./cupom/ver/<?=$cupom['id_cupom']?>">Ver</a></td>
                <td><a href="./cupom/deletar/<?=$cupom['id_cupom']?>">Deletar</a></td>
                 <td><a href="./cupom/editar/<?=$cupom['id_cupom']?>">Editar</a></td>
            </tr>
        <?php endforeach; ?>
   </table> 
        <br>
        <a href="./cupom/adicionar" class="btn btn-primary">Novo Cupom</a>
        
        <br><br>
        
        
