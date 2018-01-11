<?php
/**
 * Description of Noticias
 *
 * @author Odair
 */
require_once 'conteudo.php';
class Noticias extends Conteudo {
    //Atributos
    private $artigo;
    
    //Metodos
    public function MontarArtigo(){
        echo "<img src='{$this->getImagem()}'>";
        echo "<p>{$this->getArtigo()}</p>";
        echo "<iframe src='{$this->getVideo()}'></iframe>";
    }
    
    //Metodo construdor
    public function __construct($titulo, $subtitulo, $autoria, $data, $imagem, $video, $artigo, $pagRelaciona) {
        parent::__construct($titulo, $subtitulo, $autoria, $data, $imagem, $video, $pagRelaciona);
        $this->setArtigo($artigo);
        echo "<article>";
        $this->MontarHgroup();
        $this->MontarArtigo();
        echo "</article>";
        $this->MontarAside();
    }

    //Metodos Getter e Setter
    public function getArtigo() {
        return $this->artigo;
    }
    private function setArtigo($artigo) {
        $this->artigo = $artigo;
    }
}
