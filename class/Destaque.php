<?php

class Destaque {
    private $titulo, $subtitulo, $texto, $autor, $data;
    
    //metodos especiais
    public function Destaque(){
        echo "<h1>{$this->getTitulo()}</h1>";
        echo "<h2>{$this->getSubtitulo()}</h2>";
        echo "<h3>Escrito por {$this->getAutor()} no dia {$this->getData()}</h3>";
        echo "<p>{$this->getTexto()}</p>";
    } 
    private function getTitulo() {
        return $this->titulo;
    }
    private function getSubtitulo() {
        return $this->subtitulo;
    }
    private function getTexto() {
        return $this->texto;
    }
    private function getAutor() {
        return $this->autor;
    }
    private function getData() {
        return $this->data;
    }
    private function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    private function setSubtitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }
    private function setTexto($texto) {
        $this->texto = $texto;
    }
    private function setAutor($autor) {
        $this->autor = $autor;
    }
    private function setData($data) {
        $this->data = $data;
    }
}
