<h2>Cadastro</h2>
        
        <form action="" method="POST">
            
            Nome: <input type="text" name="nome" value="<?=@$cliente['nome']?>"><br><br>
            Email: <input type="text" name="email" value="<?=@$cliente['email']?>" ><br><br>
            CPF: <input type="text" name="cpf" value="<?=@$cliente['cpf']?>"><br><br>
            Data de Nascimento: <input type="date" name="dataNasc" value="<?=@$cliente['dataNasc']?>"><br><br>
            Sexo: <select name="sexo" value="<?=@$cliente['sexo']?>">
            <option value=""></option>
            <option value="F">Feminino</option>
            <option value="M">Masculino</option>
            <option value="Outros">Outros</option>
            </select>
            <br><br>
            Senha: <input type="password" name="senha" value="<?=@$cliente['senha']?>"><br><br>
            
            <?php if (acessoPegarPapelDoUsuario() == 'admin') { ?>              
            Tipo de usuario:<br><br> <input type="radio" name="tipousuario" value="user"><label>User</label>
            <input type="radio" name="tipousuario" value="admin"> <label>Admin</label> <br>
            <?php }?>
            

   
            
            <button>Enviar</button><br><br> <a href="./endereco/adicionar">Cadastrar Endereço</a>
            <br><br>
            
            <?php
            if(ehPost()){
                foreach($erros as $erro){
                    echo "$erro<br>";
                }
            }
            ?>
            
        </form>