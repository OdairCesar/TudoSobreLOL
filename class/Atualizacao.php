<?php
/**
 * Description of Atualizacao
 *
 * @author Odair
 */
require_once 'Conteudo.php';
class Atualizacao extends Conteudo{
    //Atributos
    private $campeao, $habilidade, $mudanca;
    
    //Metodos
    protected function MontarArtigo($logicLink){
        if ($logicLink == "true"){
            echo "<center><img src='{$this->getImagem()}'></center>";
        } else {
            echo "<center><img src='../{$this->getImagem()}'></center>";
        }
        echo "<script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script>\n
            <!-- Propaganda lateral -->\n
            <ins class=\"adsbygoogle\"
                style=\"display:inline-block;width:336px;height:280px\"
                data-ad-client=\"ca-pub-6479735546054520\"
                data-ad-slot=\"1126000179\">
            </ins>\n
        <script>\n
            (adsbygoogle = window.adsbygoogle || []).push({});\n
        </script>\n";
        echo "<p>{$this->getCampeao()}</p>";
        echo "<p>{$this->getHabilidade()}</p>";
        echo "<p>{$this->getMudanca()}</p>";
        echo "<iframe id='youtube' src='{$this->getVideo()}' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>";
    }
    public function MontarMaisHabilidade($habilidade){
        $this->setHabilidade($habilidade);
        echo "<p>{$this->getHabilidade()}</p>";
    }
    public function MontarMaisMudanca($mudanca){
        $this->setMudanca($mudanca);
        echo "<p>{$this->getMudanca()}</p>";
    }

    //Metodo Construdor
    public function __construct($logicLink, $titulo, $subtitulo, $autoria, $data, $imagem, $video, $campeao, $habilidade, $mudanca, $pagRelaciona) {
        parent::__construct($titulo, $subtitulo, $autoria, $data, $imagem, $video, $pagRelaciona);
        $this->setCampeao($campeao);
        $this->setHabilidade($habilidade);
        $this->setMudanca($mudanca);
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
    public function getCampeao() {
        return $this->campeao;
    }
    public function getHabilidade() {
        return $this->habilidade;
    }
    public function getMudanca() {
        return $this->mudanca;
    }
    protected function setCampeao($campeao) {
        $this->campeao = $campeao;
    }
    protected function setHabilidade($habilidade) {
        $this->habilidade = $habilidade;
    }
    protected function setMudanca($mudanca) {
        $this->mudanca = $mudanca;
    }
}
