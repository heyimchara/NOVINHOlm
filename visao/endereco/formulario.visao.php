<form action="" method="POST">
            <h2>Cadastrar Endereço</h2>
        
            Logradouro: <input type="text" name="logradouro" value="<?=@$endereco['logradouro']?>"><br><br>
        Número: <input type="text" name="numero" value="<?=@$endereco['numero']?>"><br><br>
        Complemento: <input type="text" name="complemento" value="<?=@$endereco['complemento']?>"><br><br>
        Bairro: <input type="text" name="bairro" value="<?=@$endereco['bairro']?>"><br><br>
        Cidade: <input type="text" name="cidade" value="<?=@$endereco['cidade']?>"><br><br>
        Cep: <input type="text" name="cep" value="<?=@$endereco['cep']?>"><br><br>
        
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
        

