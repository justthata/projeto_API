<?php
namespace App\controller;// utilizando namespace para identificar nossa classe

class ProdutoController{
    public function get(){
        return "Estou no método get";
    }
    public function post(){
        return "Estou no método post";
    }
    public function put($id){
        return "Estou no método put {$id}";
    }
    public function delete($id){
        return "Estou no método delete {$id}";
    }
}