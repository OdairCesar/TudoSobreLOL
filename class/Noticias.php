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
        echo "<center><img id='tamsection' src='../{$this->getImagem()}'></center>";
        echo "<p>{$this->getArtigo()}</p>";
        echo "<iframe id='youtube' src='{$this->getVideo()}'></iframe>";
    }
    
    //Metodo construdor
    public function __construct($titulo, $subtitulo, $autoria, $data, $imagem, $video, $artigo, $pagRelaciona) {
        parent::__construct($titulo, $subtitulo, $autoria, $data, $imagem, $video, $pagRelaciona);
        $this->setArtigo($artigo);
        echo "<div id='conteudo'>";
        echo "<section>";
        echo "<article>";
        $this->MontarHgroup();
        $this->MontarArtigo();
        echo "</article>";
        echo "</section>";
        $this->MontarAside();
        echo "</div>";
    }

    //Metodos Getter e Setter
    public function getArtigo() {
        return $this->artigo;
    }
    private function setArtigo($artigo) {
        $this->artigo = $artigo;
    }
}
