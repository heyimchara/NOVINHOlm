<?php
    
function valida_nao_vazio($valor){
    
  if (strlen(trim($valor)) == 0) {
return "Você deve inserir um valor.";
 }  else{
     return NULL;
 }
 
}

function valida_nao_vazio_tipoEs($valor){
    
 $input['valor'] = filter_var($valor, FILTER_VALIDATE_INT);

if ($input['valor'] == FALSE) {
    return 'Informe um valor valido.';
}else{
     return NULL;
 }

    
}

function vali_email($email){
   $input['$email'] = filter_var($email, FILTER_VALIDATE_EMAIL);
     if ($input['$email'] == FALSE) {
    return 'Informe um email válido.';
}else{
     return NULL;
 }
}




?>
  