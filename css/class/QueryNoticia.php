<?php
/**
 * Description of Noticias
 *
 * @author Odair
 */
require_once 'Query.php';
class QueryNoticia extends Query{
    //Metodos
    public function QueryLimit($limit){
        $this->setQuery("SELECT * FROM noticias ORDER BY lancamento desc LIMIT $limit");
        $this->ResponderQuery();
    }
    public function QueryColumn($column){
        $this->setQuery("SELECT $column FROM noticias ORDER BY lancamento desc");
        $this->ResponderQuery();
    }
    public function QueryWhere($where){
        $this->setQuery("SELECT * FROM noticias WHERE $where ORDER BY lancamento  desc");
        $this->ResponderQuery();
    }
    public function QueryOrderBy($order){
        $this->setQuery("SELECT * FROM noticias ORDER BY $order desc");
        $this->ResponderQuery();
    }
    protected function ResponderQuery(){
        $select = $this->getConexao()->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $this->setResultado(array($res->titulo, $res->subtitulo, $res->lancamento, $res->escritor, $res->argencia, $res->imagem, $res->video, $res->artigo));
        }
    }
}
