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
    protected function MontarHgroup(){//Coloca o titulo, subtitulo e autor do artigo passado pela Query.php, em uma estrutura HTML
        echo "<hgroup id='enunciado'>\n";
        echo "<h1>{$this->getTitulo()}</h1>\n";
        echo "<h2>{$this->getSubtitulo()}</h2>\n";
        echo "<h3>Por: {$this->getAutoria()} Em:{$this->getData()}</h3>\n";
        echo "</hgroup>\n";
    }
    protected function MontarComentario($comentario){//Coloca os comentarios em HTML, ela sera colocada dentro da função MontarFoooter
        echo "<div id='comentario'>\n";
        for($con= 0; $con<2; $con++){
            echo "<h5><b>De: </b>".$comentario[$con][0]."</h5>\n";
            echo "<p>".$comentario[$con][1]."</p>\n";
        }
        echo "</div>";
    }
    protected function TernoUsoContato(){
        echo "<div id='contatoProg'>\n";
        echo "<p><b>Nome do Programador: </b> Odair Cesar</p>\n";
        echo "<p><b>E-mail: </b> odairferreira97@gmail.com</p>\n";
        echo "<p><b>Cidade: </b> Bauru-SP</p>\n";
        echo "<p><b>Direito de Acesso: </b><a target='_black' href='https://www.adp.com.br/assets/vfs/Family-34/Termos-e-Condicoes-de-Uso.pdf'>© Copyright 2000-2018</a></p>\n";
        echo "</div>\n";
    }
    protected function FormularioComentario(){
        echo "<form method='post' action='index.php' id='formComenta'>\n";
        echo "<fieldset>\n";
        echo "<p><label for='Inome'>Nome:</label>\n";
        echo "<input id='Inome' type='text' name='nome' maxlength='35' placeholder='OU Seu Nick'></p>\n"; 
        echo "<p><label for='Icomentario'>Comentario:</label></p>\n";
        echo "<p><textarea id='Icomentario' name='comentario'></textarea></p>\n";
        echo "</fieldset>\n";
        echo "<label for='Ienviar'></label>\n";
        echo "<input id='Ienviar' type='submit' name='enviar' value='Enviar'>\n";
        echo "</form>\n";
    }
    protected function MontarFooter($comentario){
        echo "<footer>\n";
        $this->TernoUsoContato();
        $this->MontarComentario($comentario);
        echo "</footer>";
    }
    protected function MontarAside(){
        echo "<aside>\n";
        echo "<div id='video'>\n";
        echo "<p>Video da Pagina</p>";
        echo "<iframe src='{$this->getVideo()}' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>";
        echo "</div>\n";
        for($e=0; $e<=1; $e++){
            echo "<div id='propaganda'><a href='index.php?var={$this->getPagRelaciona()[$e][2]}#propa'>\n";
            echo "<p class='titulo'>{$this->getPagRelaciona()[$e][0]}</p>\n";
            echo "<p>{$this->getPagRelaciona()[$e][1]}</p>\n";
            echo "</a></div>\n";
        }
        echo "</aside>\n";
    }
    protected function PropagandaAdSense(){  
        echo "<div id='propa'>\n";
        echo "<ins class=\"adsbygoogle\"
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