<?php
if (ehPost()){
    foreach ($errors as $erro) {
        echo "$erro<br>";
    }
}
?>

<form method="POST" action="">
  <h1>Escolha seu total de faturamento</h1>  
    <select name="tipo" id="pedido" class="formulario-select-option">
        <option value=""></option>
        <option value="S">Semanal</option>
        <option value="M">Mensal</option>
        <option value="A">Anual</option>
    </select>
  <button type="submit">Enviar</button>   
</form>
