<br><h3>Listar Faturamento</h3>
<table class="table" border="1">
	<thead>
		<tr>
			<th>Período</th>
                        <th>Fatura</th>
		</tr>
	</thead>
		<?php foreach ($admin as $faturamento): ?>

                            <td><?=$faturamento['data']?></td>
                            <td><?=$faturamento['fatura']?></td>
			</tr>
		<?php endforeach; ?>
</table>