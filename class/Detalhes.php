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
    public function MontarDiv($titulo, $subtitulo, $imagem, $tamanho, $logico, $link){
        $this->setTitulo($titulo);
        $this->setSubtitulo($subtitulo);
        $this->setTamanho($tamanho);
        $this->setImagem($imagem);
        if ($logico){
            echo "<a href='index.php?var=$link#propa'><div id='PrevNoticia{$this->getTamanho()}' style='background-image: url(../../{$this->getImagem()})'>";
        }else{
            echo "<a href='index.php?var=$link#propa'><div id='PrevNoticia{$this->getTamanho()}' style='background-image: url(../{$this->getImagem()})'>";
        }
        echo "<p id='titulo'>{$this->getTitulo()}</h1>";
        echo "<p id='subtitulo'>{$this->getSubtitulo()}</h2>";
        echo "</div></a>";
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
