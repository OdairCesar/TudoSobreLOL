<?php
require_once 'SistemaQuery.php';
class Noticia extends SistemaQuery{
    //Atributos
    private $noticia, $escritor, $escolha, $lateral1, $lateral2, $lateral3; 
    
    //Metodos
    public function PesquisarNoticia(){
        $this->QueryNoticiasPadrao();
        $this->setNoticia($this->resultado);
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
        $this->setNoticia($this->resultado);
    }
    public function PassarNoticia($escolha, $linkpag){
        $this->PesquisarNoticia();
        $this->setEscolha($escolha);
        $this->PassarSection($linkpag);
    }
    public function PassarAside(){
        $this->DefinirAside();
        echo "<div id='video'>\n";
        echo "<p>Video Relacionado</p>\n";
        echo "<iframe src='{$this->getNoticia()[$this->getEscolha()][7]}' frameborder='0' gesture='media' allow='encrypted-media' allowfullscreen></iframe>\n";
        echo "</div>\n";
        for($e=0; $e<=2; $e++){
            $ajuste = $this->lateral[$e];
            echo "<div id='propaganda'><a href='noticia/?var=$ajuste'>\n";
            echo "<p class='titulo'>{$this->getNoticia()[$ajuste][0]}</p>\n";
            echo "<p>{$this->getNoticia()[$ajuste][1]}</p>\n";
            echo "</a></div>\n";
        }
    }
    public function MetaNoticia($escolha){
        $this->setEscolha($escolha);
        $this->PesquisarNoticia();
        echo "<meta name='author' content='{$this->getNoticia()[$this->getEscolha()][3]}'>\n";
        echo "<meta name='description' content='{$this->getNoticia()[$this->getEscolha()][1]}'>\n";
    }
    private function PassarSection($linkpag){
        echo "<hgroup id='enunciado'>";
        echo "<h1>".$this->getNoticia()[$this->getEscolha()][0]."</h1>";
        echo "<h2>".$this->getNoticia()[$this->getEscolha()][1]."</h2>";
        echo "<h3>Por: ".$this->getNoticia()[$this->getEscolha()][3]." Em: ".$this->getNoticia()[$this->getEscolha()][5]."</h3>";
        echo "</hgroup>";
        echo "<article>";
        echo "<center><img id='tamsection' src='".$linkpag."".$this->getNoticia()[$this->getEscolha()][6]."'></center>";
        echo "<p>".$this->getNoticia()[$this->getEscolha()][2]."</p>";
        if ($this->getNoticia()[$this->getEscolha()][7] == " "){
            echo "";
        }else{
            echo "<iframe id='youtube' src='".$this->getNoticia()[$this->getEscolha()][7]."' frameborder='0' gesture='media' allow='encrypted-media' allowfullscreen></iframe>";
        }
        echo "</article>";
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