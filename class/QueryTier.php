<?php
/**
 * Description of Noticias
 *
 * @author Odair
 */
require_once 'Query.php';
class QueryTier extends Query{
    //Metodos
    public function QueryLimit($limit){
        $this->setQuery("SELECT * FROM tier_s ORDER BY lancamento desc LIMIT $limit");
        $this->ResponderQuery();
    }
    public function QueryColumn($column){
        $this->setQuery("SELECT $column FROM tier_s ORDER BY lancamento desc");
        $this->ResponderQuery();
    }
    public function QueryWhere($where){
        $this->setQuery("SELECT * FROM tier_s WHERE $where ORDER BY lancamento  desc");
        $this->ResponderQuery();
    }
    public function QueryOrderBy($order){
        $this->setQuery("SELECT * FROM tier_s ORDER BY $order desc");
        $this->ResponderQuery();
    }
    protected function ResponderQuery(){
        $select = $this->getConexao()->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $this->setResultado(array($res->versao, $res->descricao, $res->lancamento, $res->criador, $res->site_origem, $res->imagem, $res->video, $res->bufs, $res->nerfs, $res->tabela, $res->expricacao));
        }
    }
}
