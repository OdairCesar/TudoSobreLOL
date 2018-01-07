<?php
require_once 'SistemaQuery.php';
class PrevNoticia extends SistemaQuery{
    private $titulo, $subtitulo, $url;
    
    //Só utilize G, M e P para id
    public function PegarImagem($codlink){
        return $this->resultado[$codlink]["link"];
    }
    private function PassarNoticiaGrande(){
        $this->setTitulo($this->resultado[3][0]);
        $this->setSubtitulo($this->resultado[3][1]);
        $tamanho = "G";
        $this->FormarDiv($tamanho, 3);
    }
    private function PassarNoticiaPequenaDois(){
        $this->setTitulo($this->resultado[2][0]);
        $this->setSubtitulo($this->resultado[2][1]);
        $tamanho = "M";
        $this->FormarDiv($tamanho, 2);
    }
    private function PassarNoticiaPequena(){
        $this->setTitulo($this->resultado[1][0]);
        $this->setSubtitulo($this->resultado[1][1]);
        $tamanho = "MTwo";
        $this->FormarDiv($tamanho, 1);
    }
    private function PassarNoticiaMedia(){
        $this->setTitulo($this->resultado[0][0]);
        $this->setSubtitulo($this->resultado[0][1]);
        $tamanho = "P";
        $this->FormarDiv($tamanho, 0);
    }
    private function FormarDiv($tam, $codlink){
        echo "<a href='index.php?var=$codlink'><div style='background: url(".$this->resultado[$codlink][6].")' id='PrevNoticia$tam'>\n";
        echo "<h1>".$this->getTitulo()."</h1>\n";
        echo "<h2>".$this->getSubtitulo()."</h2>\n";
        echo "</div></a>\n";
    }

    //Metodos Especiais
    public function PrevNoticiaConst(){
        $this->QueryNoticiasPadrao();
        $this->PassarNoticiaGrande();
        $this->PassarNoticiaPequenaDois();
        $this->PassarNoticiaPequena();
        $this->PassarNoticiaMedia();
    }
    private function setId($id){
        $this->id = $id;
    }
    private function getId(){
        return $this->id;
    }
    private function getTitulo() {
        return $this->titulo;
    }
    private function getSubtitulo() {
        return $this->subtitulo;
    }
    private function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    private function setSubtitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }
}
