<?php
/**
 * Description of Atualizacao
 *
 * @author Odair
 */
require_once 'Conteudo.php';
class Atualizacao extends Conteudo{
    //Atributos
    private $camp, $habilid, $muda;
    
    //Metodos
    protected function MontarArtigo($logicLink, $quantMudanca){
        echo "<iframe id='youtube' src='{$this->getVideo()}' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>";
        echo "<ins class=\"adsbygoogle\"
                style=\"display:inline-block;width:336px;height:280px\"
                data-ad-client=\"ca-pub-6479735546054520\"
                data-ad-slot=\"1126000179\">
            </ins>\n
        <script>\n
            (adsbygoogle = window.adsbygoogle || []).push({});\n
        </script>\n";
        for($contar=$quantMudanca[0]; $contar>=$quantMudanca[1]; $contar--){
            echo "<p id='campeao'>{$this->getCamp()[$contar]}</p>";
            echo "<p id='habilidade'>{$this->getHabilid()[$contar]}</p>";
            echo "<p id='mudanca'>{$this->getMuda()[$contar]}</p>";
        }
        if ($logicLink == "true"){
            echo "<center><img id='tamsection' src='../{$this->getImagem()}'></center>";
        } else {
            echo "<center><img id='tamsection' src='../../{$this->getImagem()}'></center>";
        }
        $this->FormularioComentario();
    }

    //Metodo Construdor
    public function __construct($logicLink, $logicAside,$titulo, $subtitulo, $autoria, $data, $imagem, $video, $campeao, $habilidade, $mudanca, $pagRelaciona, $comentario, $quantMudanca) {
        parent::__construct($titulo, $subtitulo, $autoria, $data, $imagem, $video, $pagRelaciona);
        $this->setCamp($campeao);
        $this->setHabilid($habilidade);
        $this->setMuda($mudanca);
        $this->PropagandaAdSense();
        echo "<div id='conteudo'>";
        echo "<section>";
        echo "<article>";
        $this->MontarHgroup();
        $this->MontarArtigo($logicLink, $quantMudanca);
        echo "</article>";
        echo "</section>";
        if ($logicAside){
            $this->MontarAside();
        }
        $this->MontarFooter($comentario);
        echo "</div>";
    }
    //Metodos Getter e Setter
    public function getCamp() {
        return $this->camp;
    }
    public function getHabilid() {
        return $this->habilid;
    }
    public function getMuda() {
        return $this->muda;
    }
    protected function setCamp($camp) {
        $this->camp = $camp;
    }
    protected function setHabilid($habilid) {
        $this->habilid = $habilid;
    }
    protected function setMuda($muda) {
        $this->muda = $muda;
    }
}
