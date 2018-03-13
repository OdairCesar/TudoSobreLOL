<?php
/**
 * Description of QueryComentarios
 *
 * @author Odair
 */
class QueryComentarios extends SistemaQuery{
    public function QueryLimit($limit){
        $this->setQuery("SELECT * FROM comentarios LIMIT $limit");
        $this->ResponderQuery();
    }
    public function QueryColumn($column){
        $this->setQuery("SELECT $column FROM comentarios");
        $this->ResponderQuery();
    }
    public function QueryWhere($where){
        $this->setQuery("SELECT * FROM comentarios WHERE $where");
        $this->ResponderQuery();
    }
    /*public function QueryOrderBy($order){
        $this->setQuery("SELECT * FROM comentarios ORDER BY $order desc");
        $this->ResponderQuery();
    }*/
    public function ResponderQuery(){
        $select = $this->getConexao()->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $this->setResultado(array($res->nome, $res->comentario));
        }
    }
}
