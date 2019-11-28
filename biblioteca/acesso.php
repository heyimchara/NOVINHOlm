<?php

define('ACESSO', true);

function acessoLogar($cliente) {
    if(!empty($cliente)) { //se o usuario não for vazio, logo existe o usuário na base com as credenciais
        $_SESSION["acesso"] = array( //cria a sessao acesso com os dados do usuario
            "email" => $cliente["email"], 
            "tipousuario" => $cliente["tipousuario"],
            "cod_cliente" => $cliente["cod_cliente"]
    
        );
        return true; 
    }
    return false;
}

function acessoDeslogar() {
    if (isset($_SESSION["acesso"])) {
        $_SESSION["acesso"] = null;
        unset($_SESSION["acesso"]);
    }
}

function acessoUsuarioEstaLogado() {
    return isset($_SESSION["acesso"]);
}

function acessoPegarPapelDoUsuario() {
    if (acessoUsuarioEstaLogado()) {
        return $_SESSION["acesso"]["tipousuario"];
    }
}

function acessoPegarUsuarioLogado() {
    if (acessoUsuarioEstaLogado()) {
        return $_SESSION["acesso"]["cod_cliente"];
    }   
}
