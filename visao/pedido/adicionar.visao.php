<form action="" method="POST">
<h2>Pedidos</h2>

<h2>Selecione o endereço</h2> 
Endereços: <select name="logradouro">
<option value="default"></option>
<?php foreach ($enderecos as $endereco): ?>
<option value="<?=$endereco["idEndereco"]?>"><?=$endereco["logradouro"]?></option>
<?php endforeach;?>
</select>

<h2>Selecione cupom</h2> 
<form action="" method="POST">
Digite o código de seu cupom ou vale: <input type="text" name="id_cupom" value="<?=@$cupom['id_cupom']?>">

<h2>Selecione a forma de pagamento</h2> 
FormasDePagamento: <select name="cod_formadepagamento">
<option value="default"></option>
<?php foreach ($formasdepagamento as $formadepagamento): ?>
<option value="<?=$formadepagamento["cod_formadepagamento"]?>"><?=$formadepagamento["descricao"]?></option>
<?php endforeach;?>
</select>

<h2>Produtos</h2>
<?php $total=0; foreach ($produtos as $produto) : ?>
<p><a href="produto/ver/<?=$produto['cod_produto']?>"><?= $produto['nome']?><br><img src="<?=$produto['imagem']?>" alt=""></p>
<p>R$ <?= number_format($produto["preco"],2) ?></p>
<?php $total = $produto["preco"] + $total ?>
<?php endforeach; ?>


<p>Total:</p> <p>R$ <?= number_format($total,2)?></p>


<br>
<button>Finalizar</button>
</form>
