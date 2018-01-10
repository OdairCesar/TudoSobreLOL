<?php
require_once 'SistemaQuery.php';
class Noticia extends SistemaQuery{
    //Atributos
    private $noticia, $escritor, $escolha, $lateral1, $lateral2, $lateral3; 
    
    //Metodos localizar o que irá no section aside e meta
    public function ConstrudorNoticiaSectionAside($escolha, $linkpag){
        $this->QueryNoticiasPadrao();
        $this->setNoticia($this->resultado);
        $this->setEscolha($escolha);
        
        //Contruir Section
        $this->PassarSection($linkpag);
        
        //Contruir Aside
        $this->DefinirAside();
        $this->PassarAside($linkpag);
    }
    public function ConstrudorInicioSectionAside($escolha, $linkpag){
        $this->QueryAtualizacaoLimit(1);
        $this->QueryNoticiasLike("titulo", "%Likkrit%");
        $this->QueryTierLimit(1);
        $this->QueryNoticiasLike("titulo", "%INTZ%");
        $this->setNoticia($this->resultado);
        $this->setEscolha($escolha);
        
        //Contruir Section
        $this->PassarSection($linkpag);
        
        //Construir Aside
        $this->DefinirAside();
        $this->PassarAside($linkpag);
    }
    public function ConstrudorNoticiaPadrao($escolha){
        $this->QueryNoticiasPadrao();
        $this->setNoticia($this->resultado);
        $this->setEscolha($escolha);
    }
    public function ConstrudorAtualizacaoPadrao($escolha){
        $this->QueryAtualizacaoPadrao();
        $this->setNoticia($this->resultado);
        $this->setEscolha($escolha);
    }
    private function DefinirAside(){
        switch ($this->getEscolha()){
            case 0:    
                $this->lateral[] = 1;
                $this->lateral[] = 2;
                $this->lateral[] = 3;
                break;
            case 1:      
                $this->lateral[] = 0;
                $this->lateral[] = 2;
                $this->lateral[] = 3;
                break;
            case 2:     
                $this->lateral[] = 0;
                $this->lateral[] = 1;
                $this->lateral[] = 3;
                break;
            case 3:     
                $this->lateral[] = 0;
                $this->lateral[] = 1;
                $this->lateral[] = 2;
                break;
        }
    }
    
    //Passando as informações para codigos de html para serem estilizados
    public function PassarSection($linkpag){
        echo "<section id='noticia'>\n";
        echo "<hgroup id='enunciado'>";
        echo "<h1>".$this->getNoticia()[$this->getEscolha()][0]."</h1>";
        echo "<h2>".$this->getNoticia()[$this->getEscolha()][1]."</h2>";
        echo "<h3>Por: ".$this->getNoticia()[$this->getEscolha()][3]." Em: ".$this->getNoticia()[$this->getEscolha()][2]."</h3>";
        echo "</hgroup>";
        echo "<article>";
        echo "<center><img id='tamsection' src='".$linkpag."".$this->getNoticia()[$this->getEscolha()][5]."'></center>";
        echo "<p>".$this->getNoticia()[$this->getEscolha()][7]."</p>";
        if ($this->getNoticia()[$this->getEscolha()][6] == " "){
            echo "";
        }else{
            echo "<iframe id='youtube' src='".$this->getNoticia()[$this->getEscolha()][6]."' frameborder='0' gesture='media' allow='encrypted-media' allowfullscreen></iframe>";
        }
        echo "</article>";
        echo "</section>\n";
    }
    public function PassarAside($linkpag){
        if ($linkpag == "../"){
            $linkvariavel = "index.php";
        }else {
            $linkvariavel = "noticia/";
        }
        echo "<aside>\n";
        /*echo "<div id='video'>\n";
        echo "<p>Video Relacionado</p>\n";
        echo "<iframe src='{$this->getNoticia()[$this->getEscolha()][6]}' frameborder='0' gesture='media' allow='encrypted-media' allowfullscreen></iframe>\n";
        echo "</div>\n";*/
        for($e=0; $e<=1; $e++){
            $ajuste = $this->lateral[$e];
            echo "<div id='propaganda'><a href='$linkvariavel?var=$ajuste'>\n";
            echo "<p class='titulo'>{$this->getNoticia()[$ajuste][0]}</p>\n";
            echo "<p>{$this->getNoticia()[$ajuste][1]}</p>\n";
            echo "</a></div>\n";
        }
        echo "</aside>\n";
    }
    
    //Meta para pagina noticias
    public function MetaNoticia(){
        echo "<title>{$this->getNoticia()[$this->getEscolha()][0]}</title>\n";
        echo "<meta name='author' content='{$this->getNoticia()[$this->getEscolha()][3]}'>\n";
        echo "<meta name='description' content='{$this->getNoticia()[$this->getEscolha()][1]}'>\n";
    }

        //Meotodos Especiais
    private function getEscritor() {
        return $this->escritor;
    }
    private function setEscritor($escritor) {
        $this->escritor = $escritor;
    }
    public function getNoticia(){
	return $this->noticia;
    }
    public function setNoticia($noticia){
        $this->noticia = $noticia;
    }
    public function getEscolha() {
        return $this->escolha;
    }
    public function setEscolha($escolha) {
        $this->escolha = $escolha;
    }
    private function getLateral1() {
        return $this->lateral1;
    }
    private function getLateral2() {
        return $this->lateral2;
    }
    private function getLateral3() {
        return $this->lateral3;
    }
    private function setLateral1($lateral1) {
        $this->lateral1 = $lateral1;
    }
    private function setLateral2($lateral2) {
        $this->lateral2 = $lateral2;
    }
    private function setLateral3($lateral3) {
        $this->lateral3 = $lateral3;
    }
}