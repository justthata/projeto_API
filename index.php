<?php
header("Content-type: application/json");// Alterandoo cabeçalho do documento para ser um arquivo json
header("Content-Control-Allow-Origin:*");// Estamos permitindo o acesso livre a nossa api.

require_once("vendor/autoload.php");
//use App\controller\ProdutoController;

    //print_r($_GET);
    $rota = !empty($_GET["url"]) ? $_GET["url"] : "Nada ainda";//  Verifica se a url não está vazia, se estiver exibe um texto  caso contrário atribui o conteúdo normal
    //echo $rota;

    $rota = explode("/",$rota);// explode irá criar um vetor separando as informações quando encontrar uma /

    //echo "<hr>";
    //print_r($rota);
    // Verificando se o usuário está querendo acessar a API
    if($rota[0] === "api"){
        //echo "Chegou na api <hr>";
        array_shift($rota);
        //print_r($rota);

        // $meuProduto = new App\controller\ProdutoController();
        // echo "<hr>";
        // $meuProduto->inicio();

        // Pegando a informação do serviço que o usuário quer acessar
        if(!file_exists("App\controller\\".$rota[0]."Controller.php")){
            //echo "<hr> esse serviço não está disponível";
        }
        else{
            $servico = "App\controller\\".ucfirst($rota[0])."Controller";// Organizando o caminho para deixar com o mesmo nome da classe da pasta controller
            //echo"<hr> {$servico}";
        
            array_shift($rota);
            $verboHTTP = strtolower($_SERVER["REQUEST_METHOD"]);// está pegando o verbo HTTP, que é o método de envio dos dados, ou seja, GET, POST, PUT e DELETE
            //echo "<hr> {$verboHTTP}";
            try {
                $resposta = call_user_func_array(array(new $servico, $verboHTTP), $rota);// Estamos instanciando  dinamicamente a classe ProdutoController e informando qual método da classe será executado, passando a variável $verboHTTP, que será get, post, put e delete. A variável $rota, será utilizada para passar o parâmetro para o método da nossa classe, seria algo como delete(1) ou put(1).

                //print_r($resposta);
                echo json_encode(array('status'=>'sucesso','data'=>$resposta),JSON_UNESCAPED_UNICODE);// JSON_UNESCAPED_UNICODE serve para exibir conteúdo com acentos e caracteres especiais
            } catch (\Exception $erro) {
                http_response_code(404);
                echo json_encode(array('status'=>'erro','data'=>$erro->getMessage()));
            }
        }

       


    }
    else{
        //echo "Tá querendo acessar outra coisa né?";
    }