<?php
namespace App\controller;// utilizando namespace para identificar nossa classe
use App\model\ProdutoDAO;

class ProdutoController{
    public function get($id = null){
        $meuProduto = new ProdutoDAO();
        
        if($id){
            return $meuProduto-> consultarUnico($id);
        }
        else{
            return $meuProduto->consultar();

        }
        
        
    }
    public function post(){
        $meuProduto = new ProdutoDAO();
       return $meuProduto->inserir($_POST);
        //var_dump($_POST);

    }
    public function put($id){
        $meuProduto = new ProdutoDAO();
        $dados = json_decode(file_get_contents('php://input'),true); //file_get_contests é utilizado para pegar dados de algum lugar especifico
      
        return $meuProduto->atualizar($id, $dados);
    
    }
    public function delete($id){
        $meuProduto = new ProdutoDAO();
        return $meuProduto->deletar($id);
        
    }
}