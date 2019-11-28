<h2>Listar Categorias</h2>
        
   <table class="table">
            <thead>
                <tr>
                    <th>Cod_categoria</th>
                    <th>Nome</th>
                    <th>Ver Categoria</th>
                    <th>Deletar</th>
                    <th>Editar</th>
                </tr>
            </thead>
        <?php foreach ($categorias as $categoria): ?> 
            <tr>
                <td><?=$categoria['cod_categoria']?></td>
                <td><?=$categoria['nome']?></td>
                <td><a href="./categoria/ver/<?=$categoria['cod_categoria']?>">Ver</a></td>
                <td><a href="./categoria/deletar/<?=$categoria['cod_categoria']?>">Deletar</a></td>
                 <td><a href="./categoria/editar/<?=$categoria['cod_categoria']?>">Editar</a></td>
            </tr>
        <?php endforeach; ?>
   </table> 
        <br>
        <a href="./categoria/adicionarCategoria" class="btn btn-primary">Nova Categoria</a>
        
        <br><br>