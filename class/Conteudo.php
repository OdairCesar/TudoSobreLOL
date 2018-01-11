<?php
/**
 * Description of Noticias
 *
 * @author Odair
 */
abstract class Conteudo{
    //Atributos
    private $titulo, $subtitulo, $autoria, $data, $imagem, $video, $pagRelaciona; 
    
    //Metodos
    protected function MontarHgroup(){
        echo "<hgruop>\n";
        echo "<h1>{$this->getTitulo()}</h1>";
        echo "<h2>{$this->getSubtitulo()}</h2>";
        echo "<h3>Por: {$this->getAutotia()} Em:</h3>{$this->getData()}";
        echo "</hgroup>";
    }
    protected function MontarAside(){
        echo "<aside>";
        echo "<div>";
        echo "<p>Video relacionado</p>";
        echo "<iframe src='{$this->getVideo()}'></iframe>";
        echo "</div>";
        for($e=0; $e<2; $e++){
            echo "<div>";
            echo "<p>{$this->getPagRelaciona()[$e][0]}</p>";
            echo "<p>{$this->getPagRelaciona()[$e][1]}</p>";
            echo "</div>";
        }
        echo "/aside>";
    }
    
    //Metodo Contrudor
    public function __construct($titulo, $subtitulo, $autoria, $data, $imagem, $video, $pagRelaciona) {
        $this->setTitulo($titulo);
        $this->setSubtitulo($subtitulo);
        $this->setAutoria($autoria);
        $this->setData($data);
        $this->setImagem($imagem);
        $this->setVideo($video);
        $this->setPagRelaciona($pagRelaciona);
    }

    
    //Metodos Getter e Setter
    public function getTitulo() {
        return $this->titulo;
    }
    public function getSubtitulo() {
        return $this->subtitulo;
    }
    public function getAutoria() {
        return $this->autoria;
    }
    public function getData() {
        return $this->data;
    }
    public function getImagem() {
        return $this->imagem;
    }
    public function getVideo() {
        return $this->video;
    }
    public function getPagRelaciona() {
        return $this->pagRelaciona;
    }
    protected function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    protected function setSubtitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }
    protected function setAutoria($autoria) {
        $this->autoria = $autoria;
    }
    protected function setData($data) {
        $this->data = $data;
    }
    protected function setImagem($imagem) {
        $this->imagem = $imagem;
    }
    protected function setVideo($video) {
        $this->video = $video;
    }
    protected function setPagRelaciona($pagRelaciona) {
        $this->pagRelaciona = $pagRelaciona;
    }
}