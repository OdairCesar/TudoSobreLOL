<?php
/**
 * Description of Tier
 *
 * @author Odair
 */
require_once 'Conteudo.php';
class Tier extends Conteudo{
    //Atributos
    private $bufs, $nerfs, $especificacoes;
    
    //Metodos
    public function MontarArtigo(){
        echo "<p><b>{$this->getBufs()}</b></p>";
        echo "<p><b>{$this->getNerfs()}</b></p>";
        echo "<img src='{$this->getImagem()}'>";
        echo "<p>{$this->getEspecificacoes()}</p>";
        echo "<iframe src=''></iframe> ";
    }
    
    //Metodo Contrudor
    public function __construct($titulo, $subtitulo, $autoria, $data, $imagem, $video, $bufs, $nerfs, $especificacoes, $pagRelaciona) {
        parent::__construct($titulo, $subtitulo, $autoria, $data, $imagem, $video, $pagRelaciona);
        $this->setBufs($bufs);
        $this->setNerfs($nerfs);
        $this->setEspecificacoes($especificacoes);
        echo "<article>";
        $this->MontarHgroup();
        $this->MontarArtigo();
        echo "</article>";
        $this->MontarAside();
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
