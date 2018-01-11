<?php
/**
 * Description of Noticias
 *
 * @author Odair
 */
require_once 'SistemaQuery.php';
class Destaques extends SistemaQuery{
    private $titulo, $subtitulo, $url;
    
    //Só utilize G, M e P para id
    public function PegarImagem($codlink){
        return $this->resultado[$codlink]["link"];
    }
    private function PassarDivGrande($linkpag){
        $this->setTitulo($this->resultado[3][0]);
        $this->setSubtitulo($this->resultado[3][1]);
        $tamanho = "G";
        $this->FormarDiv($tamanho, 3,$linkpag);
    }
    private function PassarDivPequenaDois($linkpag){
        $this->setTitulo($this->resultado[2][0]);
        $this->setSubtitulo($this->resultado[2][1]);
        $tamanho = "M";
        $this->FormarDiv($tamanho, 2, $linkpag);
    }
    private function PassarDivPequena($linkpag){
        $this->setTitulo($this->resultado[1][0]);
        $this->setSubtitulo($this->resultado[1][1]);
        $tamanho = "MTwo";
        $this->FormarDiv($tamanho, 1, $linkpag);
    }
    private function PassarDivMedia($linkpag){
        $this->setTitulo($this->resultado[0][0]);
        $this->setSubtitulo($this->resultado[0][1]);
        $tamanho = "P";
        $this->FormarDiv($tamanho, 0, $linkpag);
    }
    
    //Metodos Construdores Manuais
    private function FormarDiv($tam, $codlink, $linkpag){
        echo "<a href='index.php?var=$codlink'><div style='background: url(".$linkpag."".$this->resultado[$codlink][5].")' id='PrevNoticia$tam'>\n";
        echo "<h1>".$this->getTitulo()."</h1>\n";
        echo "<h2>".$this->getSubtitulo()."</h2>\n";
        echo "</div></a>\n";
    }
    public function PrevNoticiaConst($linkpag){
        $this->QueryNoticiasPadrao();
        $this->PassarDivGrande($linkpag);
        $this->PassarDivPequenaDois($linkpag);
        $this->PassarDivPequena($linkpag);
        $this->PassarDivMedia($linkpag);
    }
    public function PrevInicialConst($linkpag){
        $this->QueryAtualizacaoLimit(1);
        $this->QueryNoticiasLike("titulo", "%Likkrit%");
        $this->QueryTierLimit(1);
        $this->QueryNoticiasLike("titulo", "%INTZ%");
        $this->PassarDivGrande($linkpag);
        $this->PassarDivPequenaDois($linkpag);
        $this->PassarDivPequena($linkpag);
        $this->PassarDivMedia($linkpag);
    }
    
    //Metodos Especiais
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
