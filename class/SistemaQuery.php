<?php
require_once 'Conexao.php';
abstract class SistemaQuery extends Conexao{
    //Atributos
    private $query, $resultado;

    //Metodos para sobrecarga na QueryNoticia
    protected function QueryLimit($limit){
    }
    protected function QueryColumn($column){
    }
    protected function QueryWhere($where){
    }
    protected function QueryOrderBy($order){
    }
    protected function QueryComplete($column, $tabela, $where, $order, $limit){
        $this->setQuery("SELECT $column FROM $tabela WHERE $where ORDER BY $order LIMIT $limit");
        $select = $this->conexao->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $this->resultado[] = array($res->$column);
        }
    }
    protected function ResponderQuery(){
    }

    //Metodos Especiais
    protected function getQuery(){
        return $this->query;
    }
    protected function setQuery($query){
        $this->query = $query;
    }
}