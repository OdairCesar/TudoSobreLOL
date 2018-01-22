<?php
/**
 * Description of Noticias
 *
 * @author Odair
 */
class MenuPagina{
    //Links para o menu
    private $home, $noticia, $streams, $atualizacao, $tier, $contato;
    
    public function PassarLinks($home, $noticia, $streams, $atualizacao, $tier, $contato){
        $this->setHome($home);
        $this->setNoticia($noticia);
        $this->setStreams($streams);
        $this->setAtualizacao($atualizacao);
        $this->setTier($tier);
        $this->setContato($contato);
    }
    public function ConstrutorManual(){
        echo "<div id='efeitomenu'>";
        echo "<nav id='menu-principal'><ul>
                <a href='{$this->getHome()}'><li style='border:none;'>Home</li></a>
                <a href='{$this->getNoticia()}'><li>Noticias</li></a>
                <a href='{$this->getStreams()}'><li>Zueras</li></a>
                <a href='{$this->getAtualizacao()}'><li>Atualização</li></a>
                <a href='{$this->getTier()}'><li>Tier List</li></a>
                <a href='{$this->getContato()}'><li>Fale Conosco</li></a>
            </ul></nav>";
        echo "</div>";
    }
    protected function getHome() {
        return $this->home;
    }
    protected function getNoticia() {
        return $this->noticia;
    }
    protected function getStreams() {
        return $this->streams;
    }
    protected function getAtualizacao() {
        return $this->atualizacao;
    }
    protected function getTier() {
        return $this->tier;
    }
    protected function getContato() {
        return $this->contato;
    }
    protected function setHome($home) {
        $this->home = $home;
    }
    protected function setNoticia($noticia) {
        $this->noticia = $noticia;
    }
    protected function setStreams($streams) {
        $this->streams = $streams;
    }
    protected function setAtualizacao($atualizacao) {
        $this->atualizacao = $atualizacao;
    }
    protected function setTier($tier) {
        $this->tier = $tier;
    }
    protected function setContato($contato) {
        $this->contato = $contato;
    }
}