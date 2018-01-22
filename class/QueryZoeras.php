<?php
/**
 * Description of QueryZoeras
 *
 * @author Odair
 */
require_once 'SistemaQuery.php';
class QueryZoeras extends SistemaQuery {
    //Atributos
    public $resposta;

    //Metodos
    public function QueryLimit($limit){
        $this->setQuery("SELECT * FROM zoeras ORDER BY lancamento desc LIMIT $limit");
        $this->ResponderQuery();
    }
    public function QueryColumn($column){
        $this->setQuery("SELECT $column FROM zoeras ORDER BY lancamento desc");
        $this->ResponderQuery();
    }
    public function QueryWhere($where){
        $this->setQuery("SELECT * FROM zoeras WHERE $where ORDER BY lancamento  desc");
        $this->ResponderQuery();
    }
    public function QueryOrderBy($order){
        $this->setQuery("SELECT * FROM zoeras ORDER BY $order desc");
        $this->ResponderQuery();
    }
    protected function ResponderQuery(){
        $select = $this->conexao->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $this->resposta[] = array($res->titulo, $res->subtitulo, $res->lancamento, $res->escritor, $res->argencia, $res->imagem, $res->video, $res->artigo);
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