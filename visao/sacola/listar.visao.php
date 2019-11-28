<div class="col-25">
    <div class="container">
        <h4 style="font-size: 30px; color: black">Meu carrinho <span class="price" style="color: black"></span></h4>
        <?php foreach ($produtos as $produto) : ?>
        <div class="produto-lista">
        <p><a href="produto/ver/<?= $produto['cod_produto']?>"><img src="<?=$produto['imagem']?>" alt="imagem"><?= $produto['nome']?>
        </a><span class="price" style= margin-left:2% >R$<?= $produto['preco']?></span><a href="sacola/remover/<?=$produto['cod_produto']?>" style= margin-left:2%> Retirar do carrinho</a></p>
        </div>
        <?php endforeach; ?>
        <hr>
        <a href="sacola/limpar">Limpar Carrinho</a><br>
        <a href="produto/listarProdutos">Continuar Comprando</a>
        <p>Total <span class="price" style="color:black"><b>R$ <?= $total?></b></span></p>
        <br>
        <a href="pedido/salvarPedido" class="btn btn-primary">Finalizar Compra</a>       

    </div>
</div>
