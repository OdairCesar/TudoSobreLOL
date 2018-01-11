<?php
/**
 * Description of Detalhes
 *
 * @author Odair
 */
class Detalhes {
    //Atributos
    private $titulo, $subtitulo, $tamanho;
    
    //Metodos
    private function MontarDiv(){
        echo "<div id='PrevNoticia{$this->getTamanho()}'>";
        echo "<h1>{$this->getTitulo()}</h1>";
        echo "<h2>{$this->getSubtitulo()}</h2>";
        echo "</div>";
    }
    //Metodo construdor
    public function __construct($titulo, $subtitulo, $tamanho) {
        $this->setTitulo($titulo);
        $this->setSubtitulo($subtitulo);
        $this->setTamanho($tamanho);
        $this->MontarDiv();
    }

    //Metodo Getter e Setter
    public function getTitulo() {
        return $this->titulo;
    }
    public function getSubtitulo() {
        return $this->subtitulo;
    }
    public function getTamanho() {
        return $this->tamanho;
    }
    protected function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    protected function setSubtitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }
    protected function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
    }
}
