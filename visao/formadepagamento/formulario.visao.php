<form action="" method="POST">
            <h2>Cadastrar Forma de Pagamento</h2>
        
        Forma de Pagamento: <input type="text" name="descricao" value="<?=@$formadepagamento['descricao']?>"><br><br>
        
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