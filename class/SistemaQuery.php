<?php
/**
 * Description of Noticias
 *
 * @author Odair
 */
require_once 'Conexao.php';
abstract class SistemaQuery extends Conexao{
    //Atributos
    private $query, $resultado;

    //Metodos para sobrecarga na QueryNoticia
    protected function QueryLimit($limit){
        $this->setQuery("SELECT * FROM atualizacao, tier_s, noticia, zoeras ORDER BY lancamento desc LIMIT $limit");
        $this->ResponderQuery();
    }
    protected function QueryColumn($column){
        $this->setQuery("SELECT $column FROM atualizacao, tier_s, noticia, zoeras ORDER BY lancamento desc");
        $this->ResponderQuery();
    }
    protected function QueryWhere($where){
        $this->setQuery("SELECT * FROM atualizacao, tier_s, noticia, zoeras WHERE $where ORDER BY lancamento desc");
        $this->ResponderQuery();
    }
    protected function QueryOrderBy($order){
        $this->setQuery("SELECT * FROM atualizacao, tier_s, noticia, zoeras ORDER BY $order LIMIT $limit");
        $this->ResponderQuery();
    }
    protected function QueryComplete($column, $tabela, $where, $order, $limit){
        $this->setQuery("SELECT $column FROM $tabela WHERE $where ORDER BY $order LIMIT $limit");
        $select = $this->conexao->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $this->resultado[] = array($res->$column);
        }
    }
    protected function ResponderQuery(){
      $select = $this->getConexão()->query($this->getQuery());
      while($res = $select->fetch(PDO::FETCH_OB3)){
          $this->setResultado(array($res->versao, $res->descricao, $res->lancamento, $res->criadores, $res->argencia, $res->imagem, $res->video, $res->campeao, $res->habilidade, $res->mudanca));
      }
    }

    //Metodos Especiais
    protected function getQuery(){
        return $this->query;
    }
    protected function setQuery($query){
        $this->query = $query;
    }
    public function setResultado($resultado){
        $this->resultado[] = $resultado;
    }
    public function getResultado(){
        return $this->resultado;
    }
}
