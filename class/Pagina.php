<?php
require_once 'Destaques.php';
require_once 'Noticia.php';
require_once 'MenuPagina.php';
class Pagina {
    private $trasicao;

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

        echo "<div id='conteudo'>\n<section id='noticia'>\n";
        $noticia = new Noticia();
        $noticia->PassarNoticia($noturl, "");
        echo "</section>\n";
        echo "<aside>\n";
        $noticia->PassarAside();
        echo "</aside>\n";
        echo "<footer>\n";
        echo "</footer>\n</div>\n";
    }
    public function MetaNot($noturl){
        $this->trasicao = new Noticia();
        $this->trasicao->MetaNoticia($noturl);
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
        echo "<section id='noticia'>\n";
        $this->trasicao->PassarNoticia($noturl, "../");
        echo "</section>\n";
        echo "<aside>\n";
        $this->trasicao->PassarAside();
        echo "</aside>\n";
        echo "<footer>\n";
        echo "</footer>\n";
        echo "</div>\n";
    }
}