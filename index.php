<?php
    //print_r($_GET);
    $rota = !empty($_GET["url"]) ? $_GET["url"] : "Nada ainda";//  Verifica se a url não está vazia, se estiver exibe um texto  caso contrário atribui o conteúdo normal
    echo $rota;

    $rota = explode("/",$rota);// explode irá criar um vetor separando as informações quando encontrar uma /

    echo "<hr>";
    print_r($rota);
    // Verificando se o usuário está querendo acessar a API
    if($rota[0] === "api"){
        echo "Chegou na api <hr>";
        array_shift($rota);
        print_r($rota);
    }
    else{
        echo "Tá querendo acessar outra coisa né?";
    }