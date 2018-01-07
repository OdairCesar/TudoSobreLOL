<?php
require_once 'SistemaQuery.php';
class Noticia extends SistemaQuery{
    //Atributos
    private $noticia, $escritor, $escolha, $lateral1, $lateral2, $lateral3; 
    
    //Metodos
    private function PesquisarNoticia(){
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
    }
    public function PassarNoticia($escolha){
        $this->setEscolha($escolha);
        $this->PesquisarNoticia();
        $this->PassarSection();
    }
    public function PassarAside(){
        $this->DefinirAside();
        echo "<div id='video'>\n";
        echo "<p>Video Relacionado</p>\n";
        echo "<iframe src='{$this->getNoticia()[$this->getEscolha()][7]}' frameborder='0' gesture='media' allow='encrypted-media' allowfullscreen></iframe>\n";
        echo "</div>\n";
        for($e=0; $e<=2; $e++){
            echo "<div id='propaganda'>\n";
            $ajuste = $this->lateral[$e];
            echo "<p class='titulo'>{$this->getNoticia()[$ajuste][0]}</p>\n";
            echo "<p>{$this->getNoticia()[$ajuste][1]}</p>\n";
            echo "</div>\n";
        }
    }
    private function PassarSection(){
        echo "<hgroup id='enunciado'>";
        echo "<h1>".$this->getNoticia()[$this->getEscolha()][0]."</h1>";
        echo "<h2>".$this->getNoticia()[$this->getEscolha()][1]."</h2>";
        echo "<h3>Por: ".$this->getNoticia()[$this->getEscolha()][3]." Em: ".$this->getNoticia()[$this->getEscolha()][5]."</h3>";
        echo "</hgroup>";
        echo "<article>";
        echo "<center><img id='tamsection' src='".$this->getNoticia()[$this->getEscolha()][6]."'></center>";
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
    private function getNoticia(){
	return $this->noticia;
    }
    private function setNoticia($noticia){
        $this->noticia = $noticia;
    }
    private function getPeqNoticia() {
        return $this->peqNoticia;
    }
    private function setPeqNoticia($peqNoticia) {
        $this->peqNoticia = $peqNoticia;
    }
    private function getEscolha() {
        return $this->escolha;
    }
    private function setEscolha($escolha) {
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