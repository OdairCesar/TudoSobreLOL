<?php
abstract class MenuPagina{
    //Links para o menu
    private $home, $noticia, $streams, $atualizacao, $tier, $contato;
    
    protected function LinksPagina(){
    }

    public function MenuPagina(){
        echo "<nav id='menu-principal'><ul>
                <a link='".$this->getHome()."'><li style='border:none;'>Home</li></a>
                <a link='".$this->getNoticia()."'><li>Noticias</li></a>
                <a link='".$this->getStreams()."'><li>Steams</li></a>
                <a link='".$this->getAtualizacao()."'><li>Atualização</li></a>
                <a link='".$this->getTier()."'><li>Tier List</li></a>
                <a link='".$this->getContato()."'><li>Fale Conosco</li></a>
            </ul></nav>";
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