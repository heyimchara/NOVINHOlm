<br><h3>listar Pedidos por Municipio</h3>
<table class="table" border="1">
	<thead>
		<tr>
			<th>Data da Compra</th>
			<th>Total</th>
                        <th>Cidade</th>
		</tr>
	</thead>
		<?php foreach ($admin as $pedido): ?>
			<tr>
                            <td><?=$pedido['datacompra']?></td><br>
                            <td><?=$pedido['total']?></td>
                            <td><?=$pedido['cidade']?></td>
			</tr>
		<?php endforeach; ?>
</table>