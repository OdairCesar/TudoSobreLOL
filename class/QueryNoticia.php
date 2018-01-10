<?php
require_once 'SistemaQuery.php';
class QueryNoticia extends SistemaQuery{
    //Atributos
    public $resposta;

    //Metodos
    protected function QueryLimit($limit){
        $this->setQuery("SELECT * FROM noticias ORDER BY lancamento desc LIMIT $limit");
        $this->ResponderQuery();
    }
    protected function QueryColumn($column){
        $this->setQuery("SELECT $column FROM noticias ORDER BY lancamento desc");
        $this->ResponderQuery();
    }
    protected function QueryWhere($where){
        $this->setQuery("SELECT * FROM noticias WHERE $where ORDER BY lancamento  desc");
        $this->ResponderQuery();
    }
    protected function QueryOrderBy($order){
        $this->setQuery("SELECT * FROM noticias ORDER BY $order desc");
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