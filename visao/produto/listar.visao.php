<h2>Listar Produtos</h2>
       
   <table class="table">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Ver Detalhes</th>
                    <?php if (acessoPegarPapelDoUsuario() == 'admin') { ?> 
                       <th>ID</th>
                       <th>Deletar Produto</th>
                       <th>Editar Produto</th>
                    <?php } ?>
                </tr>
            </thead>
        <?php foreach ($produtos as $produto): ?> 
            <tr>
               <td><img src="<?=$produto['imagem']?>" alt="imagem"></td> 
               <td><?=$produto['nome']?></td>
               <td><a href="./produto/ver/<?=$produto['cod_produto']?>">Ver</a></td>
               <?php if (acessoPegarPapelDoUsuario() == 'admin') { ?> 
                <td><?=$produto['cod_produto']?></td>
               <td><a href="./produto/deletar/<?=$produto['cod_produto']?>">Deletar</a></td>
               <td><a href="./produto/editar/<?=$produto['cod_produto']?>">Editar</a></td>  
                    <?php } ?>
                 
     </tr>
        <?php endforeach; ?>
   </table> 
        <br>
        <?php if (acessoPegarPapelDoUsuario() == 'admin') { ?> 
                      <a href="./produto/adicionar" class="btn btn-primary">Novo Produto</a>     
        <?php } ?>
          
     