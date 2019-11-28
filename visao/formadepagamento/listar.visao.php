<h2>Listar Forma de Pagamento</h2>
        
   <table class="table">
            <thead>
                <tr>
                    <th>Cod_formadepagamento</th>
                    <th>Descrição</th>
                    <th>Ver</th>
                    <th>Deletar</th>
                    <th>Editar</th>
                </tr>
            </thead>
        <?php foreach ($formasdepagamento as $formadepagamento): ?> 
            <tr>
                <td><?=$formadepagamento['cod_formadepagamento']?></td>
                <td><?=$formadepagamento['descricao']?></td>
                <td><a href="./formadepagamento/ver/<?=$formadepagamento['cod_formadepagamento']?>">Ver</a></td>
                <td><a href="./formadepagamento/deletar/<?=$formadepagamento['cod_formadepagamento']?>">Deletar</a></td>
                 <td><a href="./formadepagamento/editar/<?=$formadepagamento['cod_formadepagamento']?>">Editar</a></td>
            </tr>
        <?php endforeach; ?>
   </table> 
        <br>
        <a href="./formadepagamento/adicionar" class="">Nova Forma de Pagamento</a>
        
        <br><br>
        


  