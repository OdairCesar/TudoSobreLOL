<?php
/**
 * Description of Noticias
 *
 * @author Odair
 */
abstract class Conteudo{
    //Atributos
    private $titulo, $subtitulo, $autoria, $data, $imagem, $video, $pagRelaciona; 
    
    //Metodos
    protected function MontarHgroup(){
        echo "<hgroup id='enunciado'>\n";
        echo "<h1>{$this->getTitulo()}</h1>\n";
        echo "<h2>{$this->getSubtitulo()}</h2>\n";
        echo "<h3>Por: {$this->getAutoria()} Em:{$this->getData()}</h3>\n";
        echo "</hgroup>\n";
    }
    protected function MontarAside(){
        echo "<aside>\n";
        echo "<div id='video'>\n";
        echo "<p>Video da Pagina</p>";
        echo "<iframe src='{$this->getVideo()}' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>";
        echo "</div>\n";
        for($e=0; $e<=1; $e++){
            echo "<div id='propaganda'><a href='index.php?var={$this->getPagRelaciona()[$e][2]}'>\n";
            echo "<p class='titulo'>{$this->getPagRelaciona()[$e][0]}</p>\n";
            echo "<p>{$this->getPagRelaciona()[$e][1]}</p>\n";
            echo "</a></div>\n";
        }
        echo "</aside>\n";
    }
    protected function PropagandaAdSense(){  
        echo "<div id='propa'>\n";
        echo "<script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script>\n
        <ins class=\"adsbygoogle\"
            style=\"display:block\"
            data-ad-format=\"fluid\"
            data-ad-layout-key=\"-gw-1s+cd-5x-uk\"
            data-ad-client=\"ca-pub-6479735546054520\"
            data-ad-slot=\"8183552481\"></ins>
        <script>\n
            (adsbygoogle = window.adsbygoogle || []).push({});\n
        </script>\n";
        echo "</div>\n";
    }
    
    //Metodo Contrudor
    public function __construct($titulo, $subtitulo, $autoria, $data, $imagem, $video, $pagRelaciona) {
        $this->setTitulo($titulo);
        $this->setSubtitulo($subtitulo);
        $this->setAutoria($autoria);
        $this->setData($data);
        $this->setImagem($imagem);
        $this->setVideo($video);
        $this->setPagRelaciona($pagRelaciona);
    }

    
    //Metodos Getter e Setter
    public function getTitulo() {
        return $this->titulo;
    }
    public function getSubtitulo() {
        return $this->subtitulo;
    }
    public function getAutoria() {
        return $this->autoria;
    }
    public function getData() {
        return $this->data;
    }
    public function getImagem() {
        return $this->imagem;
    }
    public function getVideo() {
        return $this->video;
    }
    public function getPagRelaciona() {
        return $this->pagRelaciona;
    }
    protected function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    protected function setSubtitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }
    protected function setAutoria($autoria) {
        $this->autoria = $autoria;
    }
    protected function setData($data) {
        $this->data = $data;
    }
    protected function setImagem($imagem) {
        $this->imagem = $imagem;
    }
    protected function setVideo($video) {
        $this->video = $video;
    }
    protected function setPagRelaciona($pagRelaciona) {
        $this->pagRelaciona = $pagRelaciona;
    }
}