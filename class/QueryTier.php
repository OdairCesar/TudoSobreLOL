<?php
/**
 * Description of Noticias
 *
 * @author Odair
 */
require_once 'SistemaQuery.php';
class QueryTier extends SistemaQuery{
    //Atributos
    public $resposta;

    //Metodos
    protected function QueryLimit($limit){
        $this->setQuery("SELECT * FROM tier ORDER BY lancamento desc LIMIT $limit");
        $this->ResponderQuery();
    }
    protected function QueryColumn($column){
        $this->setQuery("SELECT $column FROM tier ORDER BY lancamento desc");
        $this->ResponderQuery();
    }
    protected function QueryWhere($where){
        $this->setQuery("SELECT * FROM tier WHERE $where ORDER BY lancamento  desc");
        $this->ResponderQuery();
    }
    protected function QueryOrderBy($order){
        $this->setQuery("SELECT * FROM tier ORDER BY $order desc");
        $this->ResponderQuery();
    }
    protected function ResponderQuery(){
        $select = $this->conexao->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $this->resposta[] = array($res->versao, $res->descricao, $res->lancamento, $res->criador, $res->site_origem, $res->imagem, $res->video, $res->nufs, $res->nerfs, $res->tabela, $res->expricacao);
        }
    }

    //Metodos Especiais
    public function getReposta() {
        return $this->reposta;
    }
    public function setReposta($reposta) {
        $this->reposta = $reposta;
    }
}