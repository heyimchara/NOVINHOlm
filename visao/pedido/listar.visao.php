<h2>Listar Pedidos</h2>
        
        <?php foreach ($pedidos as $pedido): ?> 
                <p>Usuário: <?= $pedido['nome'] ?></p>
                <p>Envio: <?=$pedido['id_pedido']?></p>
                <p>Data: <?= $pedido['data']?></p>
                <p>Endereço: <?= $pedido['logradouro']?></p>
                <p>Pagamento: <?= $pedido['descricao']?></p>
               
                <p><a href="./pedido/ver/<?=$pedido['id_pedido']?>">Ver</a></p>
                
                <br><br>
                
        <?php endforeach; ?>
  
