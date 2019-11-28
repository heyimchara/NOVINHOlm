<h2>Detalhes do produto</h2>       
        <p> Nome: <?=$produto['nome']?></p>  
        <p> Preço: <?=$produto['preco']?></p>
        <p> Descrição: <?=$produto['descricao']?></p> 
        <p> estoque_minimo: <?=$produto['estoque_minimo']?></p>
        <p> estoque_maximo: <?=$produto['estoque_maximo']?></p>
        
    <?php if (acessoPegarPapelDoUsuario() == 'admin') { ?> 
        <p> Id: <?=$produto['cod_produto']?></p>
        <p> Categoria: <?=$produto['cod_categoria']?></p>    
    <?php } ?>
                  
        <p> Imagem: <img src="<?=$produto['imagem']?>" alt="imagem"></p>  
              
<a href="./produto/comprar/<?=$produto['cod_produto']?>">Adicionar ao carrinho</a>
