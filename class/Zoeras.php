<?php
/**
 * Description of Zoeras
 *
 * @author Odair
 */
require_once 'Conteudo.php';
class Zoeras extends Conteudo {
    //Atributos
    private $artigo;
    
    //Metodos
    public function MontarArtigo($logicLink){
        echo "<iframe id='youtube' src='{$this->getVideo()}' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>";
        echo "<p>{$this->getArtigo()}</p>";
        if ($logicLink){
            echo "<center><img id='tamsection' src='{$this->getImagem()}'></center>";
        }else{
            echo "<center><img id='tamsection' src='../{$this->getImagem()}'></center>";
        }
    }
    
    //Metodo construdor
    public function __construct($logicLink, $titulo, $subtitulo, $autoria, $data, $imagem, $video, $artigo, $pagRelaciona) {
        parent::__construct($titulo, $subtitulo, $autoria, $data, $imagem, $video, $pagRelaciona);
        $this->setArtigo($artigo);
        $this->PropagandaAdSense();
        echo "<div id='conteudo'>";
        echo "<section>";
        echo "<article>";
        $this->MontarHgroup();
        $this->MontarArtigo($logicLink);
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
