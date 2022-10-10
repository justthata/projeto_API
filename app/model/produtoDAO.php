<?php
namespace App\model;
use App\model\Conexao;
use Exception;

class ProdutoDAO{
    private $tabela = "produto";

    public function consultar(){
        $comando = "SELECT * FROM {$this->tabela}";

        $preparacao = Conexao::getConexao()->prepare($comando);
       
        
        $preparacao->execute();

        if($preparacao->rowCount() > 0){
            return $preparacao->fetchALL(\PDO::FETCH_ASSOC);
        }
        else{
            throw new \Exception("Nenhum dado encontrado");// Estamos lançando um erro para ser tratado pelo catch
        }
    }

    public function consultarUnico($id){
        $comando = "SELECT * FROM {$this->tabela} WHERE cod_produto = :id";

        $preparacao = Conexao::getConexao()->prepare($comando);
        $preparacao->bindValue(":id",$id);
        $preparacao->execute();
       
        
        $preparacao->execute();

        if($preparacao->rowCount() > 0){
            return $preparacao->fetchALL(\PDO::FETCH_ASSOC);
        }
        else{
            throw new \Exception("Nenhum dado encontrado");// Estamos lançando um erro para ser tratado pelo catch
        }
    }


    //post
    public function inserir($dados){
        $comando = "INSERT INTO {$this->tabela} VALUES(NULL,:nome, :preco, :info)";
        
        $preparacao = Conexao::getConexao()->prepare($comando);

        $preparacao->bindValue(":nome", $dados["nome_produto"]);
        $preparacao->bindValue(":preco", $dados["preco_produto"]);
        $preparacao->bindValue(":info", $dados["info_produto"]);
        
        $preparacao->execute();

        if($preparacao->rowCount() >0 ){
            return "dados inseridos com sucesso";
        }
        else{
            throw new \Exception ("Erro ao cadastrar as informações");
        }
        
    }

    //PUT
     public function atualizar ($id,$dados){
         $comando = "UPDATE {$this->tabela} SET
         nome = :nome_produto,
         preco = :preco_produto,
         info_produto = :info WHERE cod_produto = :id";

        $preparacao = conexao ::getConexao()->prepare($comando);
       
        list($nome, $preco, $info) = array_values($dados);

        $preparacao->bindValue(':nome_produto', $nome);
        $preparacao->bindValue(':preco_produto', $preco);
        $preparacao->bindValue(':info', $info);
        $preparacao->bindValue(':id', $id);

        $preparacao->execute();
        if($preparacao->rowCount() > 0){
            return "Dados atualizados com sucesso";
        }
        else{
            throw new \Exception ("Erro ao tentar atualizar os dados");
        }

    }
        
        //DELETE

        public function deletar($id){
            $comando = "DELETE FROM {$this->tabela} WHERE cod_produto = :id";

            $preparacao = Conexao::getConexao()->prepare($comando);
            $preparacao->bindValue(":id",$id);

            $preparacao->execute();

            if($preparacao->rowCount() > 0){
                return " Dados excluidos com sucesso";
            }

            else{
                throw new \Exception("Erro ao tentar excluir os dados");
            }

        }   
        
}


