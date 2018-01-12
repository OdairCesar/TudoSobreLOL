<?php
/**
 * Description of Tier
 *
 * @author Odair
 */
require_once 'Conteudo.php';
class Tier extends Conteudo{
    //Atributos
    private $bufs, $nerfs, $tabela, $especificacoes;
    
    //Metodos
    public function MontarArtigo(){
        echo "<p><b>{$this->getBufs()}</b></p>\n";
        echo "<p><b>{$this->getNerfs()}</b></p>\n";
        echo "<center><img src='../{$this->getTabela()}'></center>\n";
        echo "<p>{$this->getEspecificacoes()}</p>\n";
        echo "<iframe id='youtube' src='{$this->getVideo()}'></iframe>\n";
    }
    
    //Metodo Contrudor
    public function __construct($titulo, $subtitulo, $autoria, $data, $imagem, $video, $bufs, $nerfs, $tabela, $especificacoes, $pagRelaciona) {
        parent::__construct($titulo, $subtitulo, $autoria, $data, $imagem, $video, $pagRelaciona);
        $this->setBufs($bufs);
        $this->setNerfs($nerfs);
        $this->setEspecificacoes($especificacoes);
        $this->setTabela($tabela);
        echo "<div id='conteudo'>\n";
        echo "<section>";
        echo "<article>\n";
        $this->MontarHgroup();
        $this->MontarArtigo();
        echo "</article>\n";
        echo "</section>";
        $this->MontarAside();
        echo "</div>\n";
    }
    
    //Metodos Getter e Setter
    public function getBufs() {
        return $this->bufs;
    }
    public function getNerfs() {
        return $this->nerfs;
    }
    public function getEspecificacoes() {
        return $this->especificacoes;
    }
    public function getTabela() {
        return $this->tabela;
    }
    protected function setTabela($tabela) {
        $this->tabela = $tabela;
    }
    protected function setBufs($bufs) {
        $this->bufs = $bufs;
    }
    protected function setNerfs($nerfs) {
        $this->nerfs = $nerfs;
    }
    protected function setEspecificacoes($especificacoes) {
        $this->especificacoes = $especificacoes;
    }
}
