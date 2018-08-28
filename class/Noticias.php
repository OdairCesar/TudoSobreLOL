<?php
/**
 * Description of Noticias
 *
 * @author Odair
 */
require_once 'Conteudo.php';
class Noticias extends Conteudo {
    //Atributos
    private $artigo;
    
    //Metodos
    public function MontarArtigo($logicLink){
        /*
         * A função colocará o texto do artigo e imagens referente a ele em um estrutura HTML
         * O $ligocLink é para saber, se a imagem está na mesma pasta que o arquivo PHP que busca a noticia
         * As funções get são montadas na construct da classe Conteudo, que é mãe dessa classe.
         * IMPORTANTE: essa função esta aqui, pois todos as paginas tem uma estrutura HTML diferente no entre <article></article>
         */
        if ($logicLink){
            echo "<center><img id='tamsection' src='../{$this->getImagem()}'></center>";
        }else{
            echo "<center><img id='tamsection' src='../../{$this->getImagem()}'></center>";
        }
        echo "<p>{$this->getArtigo()}</p>";
        echo "<iframe id='youtube' src='{$this->getVideo()}' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>";
        $this->FormularioComentario();
    }
    
    //Metodo construdor
    public function __construct($logicLink, $logicAside, $titulo, $subtitulo, $autoria, $data, $imagem, $video, $artigo, $pagRelaciona , $comentario) {
        /*
         * LogicLink é uma VARIAVEL LOGICA para saber se a imagem está na mesma pasta que a pagina ou uma pagina antes
         * LogicAside é uma VARIAVEL LOGICA para saber se o ASIDE da pagina será feita
         * PagRelaciona são titulos e subtitulos para o ASIDE
         * Todo o resto são textos, imamens e videos para a pagina
         */
        parent::__construct($titulo, $subtitulo, $autoria, $data, $imagem, $video, $pagRelaciona);
        $this->setArtigo($artigo);
        $this->PropagandaAdSense();//Função onde entrega o script do JV com propagando do Google
        echo "<div id='conteudo'>";
        echo "<section>";
        echo "<article>";
        $this->MontarHgroup();// Coloca o Titulo, subtitulo, data de lançamento entre outras coisas no codigo do cabeçalho da pagina
        $this->MontarArtigo($logicLink);// Coloca o texto da pagina em HTML para visualização
        echo "</article>";
        echo "</section>";
        if ($logicAside){
            $this->MontarAside();// Coloca os link para outras paginas e o video sobre o artigo da pagina
        }
        $this->MontarFooter($comentario);// Coloca os comentarios pesquisados no codigo HTML
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
