<?php
/**
 * Description of Noticias
 *
 * @author Odair
 */
require_once 'SistemaQuery.php';
class QueryAtualizacao extends SistemaQuery{
    //Atributos
    public $resposta;

    //Metodos
    protected function QueryLimit($limit){
        $this->setQuery("SELECT * FROM atualizacao ORDER BY lancamento desc LIMIT $limit");
        $this->ResponderQuery();
    }
    protected function QueryColumn($column){
        $this->setQuery("SELECT $column FROM atualizacao ORDER BY lancamento desc");
        $this->ResponderQuery();
    }
    protected function QueryWhere($where){
        $this->setQuery("SELECT * FROM atualizacao WHERE $where ORDER BY lancamento  desc");
        $this->ResponderQuery();
    }
    protected function QueryOrderBy($order){
        $this->setQuery("SELECT * FROM atualizacao ORDER BY $order desc");
        $this->ResponderQuery();
    }
    protected function ResponderQuery(){
        $select = $this->conexao->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $this->resposta[] = array($res->versao, $res->descricao, $res->lancamento, $res->criadores, $res->argencia, $res->imagem, $res->video, $res->campeao, $res->habilidade, $res->mudanca);
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