<?php
/**
 * Description of Atualizacao
 *
 * @author Odair
 */
require_once 'Conteudo.php';
class Atualizacao extends Conteudo{
    //Atributos
    private $campeao, $habilidade, $mudanca;
    
    //Metodos
    protected function MontarArtigo(){
        echo "<img src='../{$this->getImagem()}'>";
        echo "<p>{$this->getCampeao()}</p>";
        echo "<p>{$this->getHabilidade()}</p>";
        echo "<p>{$this->getMudanca()}</p>";
        echo "<iframe src='{$this->getVideo()}'></iframe>";
    }
    public function MontarMaisHabilidade($habilidade){
        $this->setHabilidade($habilidade);
        echo "<p>{$this->getHabilidade()}</p>";
    }
    public function MontarMaisMudanca($mudanca){
        $this->setMudanca($mudanca);
        echo "<p>{$this->getMudanca()}</p>";
    }

    //Metodo Construdor
    public function __construct($titulo, $subtitulo, $autoria, $data, $imagem, $video, $campeao, $habilidade, $mudanca, $pagRelaciona) {
        parent::__construct($titulo, $subtitulo, $autoria, $data, $imagem, $video, $pagRelaciona);
        $this->setCampeao($campeao);
        $this->setHabilidade($habilidade);
        $this->setMudanca($mudanca);
        echo "<div id='conteudo'>";
        echo "<article>";
        echo "<section>";
        $this->MontarHgroup();
        $this->MontarArtigo();
        echo "</section>";
        $this->MontarAside();
        echo "</article>";
        echo "</div>";
    }
    //Metodos Getter e Setter
    public function getCampeao() {
        return $this->campeao;
    }
    public function getHabilidade() {
        return $this->habilidade;
    }
    public function getMudanca() {
        return $this->mudanca;
    }
    protected function setCampeao($campeao) {
        $this->campeao = $campeao;
    }
    protected function setHabilidade($habilidade) {
        $this->habilidade = $habilidade;
    }
    protected function setMudanca($mudanca) {
        $this->mudanca = $mudanca;
    }
}
