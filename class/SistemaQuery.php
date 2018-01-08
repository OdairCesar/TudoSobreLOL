<?php
require_once 'Conexao.php';
abstract class SistemaQuery extends Conexao{
    //Atributos
    private $query, $quantidade; 
    protected $resultado;

    //Metodos para sobrecarga na QueryNoticia
    protected function QueryNoticiasPadrao(){
        $this->setQuantidade(4);
        $this->setQuery("SELECT * FROM noticias ORDER BY data_lancamento LIMIT {$this->getQuantidade()}");
        $this->ResponderQuery();
    }
    protected function QueryNoticiasLimit($limit){
        $this->setQuantidade($limit);
        $this->setQuery("SELECT * FROM noticias ORDER BY data_lancamento LIMIT {$this->getQuantidade()}");
        $this->ResponderQuery();
    }
    protected function QueryNoticiasLimitColunas($limit, $coluna1, $coluna2, $coluna3){
        $this->setQuantidade($limit);
        $this->setQuery("SELECT $coluna1, $coluna2, $coluna3 FROM noticias ORDER BY data_lancamento LIMIT {$this->getQuantidade()}");
        $select = $this->conexao->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $this->resultado[$this->getQuantidade()] = array($res->$coluna1, $res->$coluna2, $res->$coluna3);
            $this->setQuantidade($this->getQuantidade() - 1);
        }
    }
    protected function QueryNoticiasWhere($where, $selecao){
        $this->setQuery("SELECT * FROM noticias WHERE $where = '$selecao' ORDER BY data_lancamento");
        $this->ResponderQuery();
    }
    
    //Metodos para sobrecarga na QueryAtualizacao
    protected function QueryAtualizacaoPadrao(){
        $this->setQuantidade(4);
        $this->setQuery("SELECT * FROM atualizacao ORDER BY lancamento {$this->getQuantidade()}");
        $this->ResponderQuery();
    }
    protected function QueryAtualizacaoLimit($limit){
        $this->setQuantidade($limit);
        $this->setQuery("SELECT * FROM atualizacao ORDER BY lancamento LIMIT {$this->getQuantidade()}");
        $this->ResponderQuery();
    }
    protected function QueryAtualizacaoLimitColunas($limit, $coluna1, $coluna2, $coluna3){
        $this->setQuantidade($limit);
        $this->setQuery("SELECT $coluna1, $coluna2, $coluna3 FROM atualizacao ORDER BY lancamento LIMIT {$this->getQuantidade()}");
        $select = $this->conexao->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $this->resultado[$this->getQuantidade()] = array($res->$coluna1, $res->$coluna2, $res->$coluna3);
            $this->setQuantidade($this->getQuantidade() - 1);
        }
    }
    protected function QueryAtualizacaoWhere($where, $selecao){
        $this->setQuery("SELECT * FROM atualizacao WHERE $where = '$selecao' ORDER BY lancamento");
        $this->ResponderQuery();
    }
    
    //Metodos para contruir a conexao da query no Banco de Dados
    protected function ResponderQuery(){
        $select = $this->conexao->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $this->resultado[] = array($res->titulo, $res->subtitulo, $res->artigo, $res->escritor, $res->argencia, $res->data_lancamento, $res->link, $res->linkdois, );
        }
    }

    //Metodos Especiais
    private function getQuantidade() {
        return $this->quantidade;
    }
    private function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }
    private function getQuery(){
        return $this->query;
    }
    private function setQuery($query){
        $this->query = $query;
    }
    public function getResultado() {
        return $this->resultado;
    }
    public function setResultado($resultado) {
        $this->resultado = $resultado;
    }
}