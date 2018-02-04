<?php
/**
 * Description of Tier
 *
 * @author Odair
 */
require_once 'Conteudo.php';
class Tier extends Conteudo{
    //Atributos
    private $bufs, $nerfs, $tabela, $especificacoes;
    
    //Metodos
    public function MontarArtigo($logicLink){
        echo "<p><b>Bufs:</b> {$this->getBufs()}</p>\n";
        echo "<p><b>Nerfs:</b> {$this->getNerfs()}</p>\n";
        if ($logicLink == true){
            echo "<center><img src='{$this->getTabela()}'></center>\n";
        }else{
            echo "<center><img src='../{$this->getTabela()}'></center>\n";
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
        echo "<p>{$this->getEspecificacoes()}</p>\n";
        echo "<iframe id='youtube' src='{$this->getVideo()}' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>\n";
    }
    
    //Metodo Contrudor
    public function __construct($logicLink, $logicAside, $titulo, $subtitulo, $autoria, $data, $imagem, $video, $bufs, $nerfs, $tabela, $especificacoes, $aside) {
        parent::__construct($titulo, $subtitulo, $autoria, $data, $imagem, $video, $aside);
        $this->setBufs($bufs);
        $this->setNerfs($nerfs);
        $this->setEspecificacoes($especificacoes);
        $this->setTabela($tabela);
        $this->PropagandaAdSense();
        echo "<div id='conteudo'>\n";
        echo "<section>";
        echo "<article>\n";
        $this->MontarHgroup();
        $this->MontarArtigo($logicLink);
        echo "</article>\n";
        echo "</section>";
        if ($logicAside){
            $this->MontarAside();
        }
        echo "</div>\n";
    }
    
    //Metodos Getter e Setter
    public function getBufs() {
        return $this->bufs;
    }
    public function getNerfs() {
        return $this->nerfs;
    }
    public function getEspecificacoes() {
        return $this->especificacoes;
    }
    public function getTabela() {
        return $this->tabela;
    }
    protected function setTabela($tabela) {
        $this->tabela = $tabela;
    }
    protected function setBufs($bufs) {
        $this->bufs = $bufs;
    }
    protected function setNerfs($nerfs) {
        $this->nerfs = $nerfs;
    }
    protected function setEspecificacoes($especificacoes) {
        $this->especificacoes = $especificacoes;
    }
}
