<?php
/**
 * Description of Detalhes
 *
 * @author Odair
 */
class Detalhes{
    //Atributos
    private $titulo, $subtitulo, $imagem, $tamanho;
    
    //Metodos
    public function MontarDiv($titulo, $subtitulo, $imagem, $tamanho, $logico){
        $this->setTitulo($titulo);
        $this->setSubtitulo($subtitulo);
        $this->setTamanho($tamanho);
        $this->setImagem($imagem);
        if ($logico){
            echo "<div id='PrevNoticia{$this->getTamanho()}' style='background: url(../{$this->getImagem()})'>";
        }else{
            echo "<div id='PrevNoticia{$this->getTamanho()}' style='background: url({$this->getImagem()})'>";
        }
        echo "<h1>{$this->getTitulo()}</h1>";
        echo "<h2>{$this->getSubtitulo()}</h2>";
        echo "</div>";
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
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    public function setSubtitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }
    public function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
    }
    public function getImagem() {
        return $this->imagem;
    }
    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }
}
