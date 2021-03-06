<?php
/**
 * Description of Noticias
 *
 * @author Odair
 */
require_once 'Query.php';
class QueryInicio extends Query{
    //Metodos
    public function QueryNotUm($where){
        $this->setQuery("SELECT * FROM noticias WHERE $where");
        $select = $this->getConexao()->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $this->setResultado(array($res->titulo, $res->subtitulo, $res->lancamento, $res->escritor, $res->argencia, $res->imagem, $res->video, $res->artigo));
        }
    }
    public function QueryNotDois($where){
        $this->setQuery("SELECT * FROM noticias WHERE $where");
        $select = $this->getConexao()->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $this->setResultado(array($res->titulo, $res->subtitulo, $res->lancamento, $res->escritor, $res->argencia, $res->imagem, $res->video, $res->artigo));
        }
    }
    public function QueryZoeras($where){
        $this->setQuery("SELECT * FROM zoeras WHERE $where");
        $select = $this->getConexao()->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $this->setResultado(array($res->titulo, $res->subtitulo, $res->lancamento, $res->escritor, $res->argencia, $res->imagem, $res->video, $res->artigo));
        }
    }
    public function QueryAtualizacao($where){
        $this->setQuery("SELECT * FROM atualizacao WHERE $where");
        $select = $this->getConexao()->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $this->setResultado(array($res->versao, $res->descricao, $res->lancamento, $res->criadores, $res->argencia, $res->imagem, $res->video, $res->campeao, $res->habilidade, $res->mudanca));
        }
    }
    public function QueryTier($where){
        $this->setQuery("SELECT * FROM tier_s WHERE $where");
        $select = $this->getConexao()->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $this->setResultado(array($res->versao, $res->descricao, $res->lancamento, $res->criador, $res->site_origem, $res->imagem, $res->video, $res->bufs, $res->nerfs, $res->tabela, $res->expricacao));
        }
    }
  }
