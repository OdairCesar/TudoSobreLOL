<?php
require_once 'Destaques.php';
require_once 'Noticia.php';
require_once 'MenuPagina.php';
class Pagina {
    private $trasicao;
    
    public function __construct() {
        $this->trasicao = new Noticia();
    }

    public function PaginaInicial($noturl) {
        echo "<div id='efeitomenu'>\n";
        $menu = new MenuPagina();
        $menu->PassarLinks("index.php", "noticia/index.php", "","","","");
        $menu->ConstrutorManual();
        echo "</div>\n";
    
        echo "<div id='detalhes'>\n<p></p>\n";
        $destaque = new Destaques();
        $destaque->PrevNoticiaConst("");
        echo "\n<p></p>\n</div>\n";
        
        echo "<div id='conteudo'>\n";
        $this->trasicao->ConstrudorNoticiaSectionAside($noturl, "");
        echo "<footer>\n";
        echo "</footer>\n";
        echo "</div>\n";
    }
    public function MetaNot($noturl){
        $this->trasicao->ConstrudorNoticiaPadrao($noturl);
        $this->trasicao->MetaNoticia();
    }

    public function PaginaNoticia($noturl) {
        echo "<div id='efeitomenu'>\n";
        $menu = new MenuPagina();
        $menu->PassarLinks("../index.php", "index.php", "","","","");
        $menu->ConstrutorManual();
        echo "</div>\n";
    
        echo "<div id='detalhes'>\n<p></p>\n";
        $destaque = new Destaques();
        $destaque->PrevNoticiaConst("../");
        echo "\n<p></p>\n</div>\n";

        echo "<div id='conteudo'>\n";
        $this->trasicao->ConstrudorNoticiaSectionAside($noturl, "../");
        echo "<footer>\n";
        echo "</footer>\n";
        echo "</div>\n";
    }
}