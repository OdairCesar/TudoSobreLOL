<?php
include_once 'PrevNoticia.php';
include_once 'Noticia.php';
include_once 'MenuRaiz.php';
class PaginaPrincipal {
    public function __construct($noturl) {
        echo "<div id='efeitomenu'>\n";
        $menu = new MenuRaiz();
        echo "</div>\n";
    
        echo "<div id='detalhes'>\n<p></p>\n";
        $destaque = new PrevNoticia();
        $destaque->PrevNoticiaConst();
        echo "\n<p></p>\n</div>\n";

        echo "<div id='conteudo'>\n";
        echo "<section id='noticia'>\n";
        $noticia = new Noticia();
        $noticia->PassarNoticia($noturl);
        echo "</section>\n";
        echo "<aside>\n";
        $noticia->PassarAside();
        echo "</aside>\n";
        echo "<footer>\n";
        echo "</footer>\n";
        echo "</div>\n";
    }
}