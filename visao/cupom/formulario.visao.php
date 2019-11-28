<form action="" method="POST">
            <h2>Cadastrar Cupom</h2>
        
        Nome: <input type="text" name="nome" value="<?=@$cupom['nomeCupom']?>"><br><br>
        Desconto: <input type="text" name="desconto" value="<?=@$cupom['desconto']?>"><br><br>
        <?php
            if(ehPost()){
                foreach($erros as $erro){
                    echo "$erro<br>";
                }
            }
        ?>
        
        <br>
        
        <button>Cadastrar</button>
        
        
        </form>