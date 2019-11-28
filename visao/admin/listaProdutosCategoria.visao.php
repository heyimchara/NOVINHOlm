<br><h3>Listar Produtos por Categoria</h3>
<table class="table" border="1">
	<thead>
		<tr>
			<th>Categoria</th>
			<th>Produto</th>
		</tr>
	</thead>
                <?php $cat = "";
		foreach ($admin as $produto): ?>
			<tr>
                            <td><?php if($produto['categ'] != $cat){
                            echo $produto['categ'];
                        }else{
                            echo "      ";
                        }
                        $cat = $produto['categ'];?></td><br>
                            <td><?=$produto['nome']?></td>
			</tr>
		<?php endforeach; ?>
</table>


