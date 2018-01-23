<?php
/**
 * Description of Noticias
 *
 * @author Odair
 */
require_once 'Detalhes.php';
require_once 'Atualizacao.php';
require_once 'Noticias.php';
require_once 'Tier.php';
require_once 'Zoeras.php';
require_once 'Conteudo.php';
require_once 'QueryAtualizacao.php';
require_once 'QueryInicio.php';
require_once 'QueryNoticia.php';
require_once 'QueryTier.php';
require_once 'QueryZoeras.php';
require_once 'MenuPagina.php';
class Pagina {
    //1.Atributos
    private $tipo;//Passa o tipo de objeto criado
    private $aside;//Recebe parte do objeto para aside
    private $objPesquisa, $objConteudo, $objDetalhes; //Recebe o objetos 
    private $titulo, $subtitulo, $data, $autoria, $imagem, $video, $campeao, $habilidade, $mudanca, $bufs, $nerfs, $tabela, $artigo; //1.1.Atributos peguam receber os atributos da SuperClasse Query para passam nas demais SuperClasse
    private $tamanho, $pagRelaciona; //1.2.Atributos peguam variaveis das funçoes feitas nessa classe
    
    //Metodos que formar objetos diferenciando cada
    private function ObjAtualizacao($escolha){
        $this->PassarValores($escolha);
        $this->setObjConteudo(new Atualizacao(false, $this->titulo, $this->subtitulo, $this->autoria, $this->data, $this->imagem, $this->video, $this->campeao, $this->habilidade, $this->mudanca, $this->pagRelaciona)); 
    }
    private function ObjNoticias($escolha){
        $this->PassarValores($escolha);
        $this->setObjConteudo(new Noticias(false, $this->titulo, $this->subtitulo, $this->data, $this->autoria, $this->imagem, $this->video, $this->artigo, $this->pagRelaciona)); 
    }
    private function ObjTier($escolha){
        $this->PassarValores($escolha);
        $this->setObjConteudo(new Tier(false, $this->titulo, $this->subtitulo, $this->autoria, $this->data, $this->imagem, $this->video, $this->bufs, $this->nerfs, $this->tabela, $this->artigo, $this->pagRelaciona)); 
    }
    private function objInicio($escolha){
        $this->DefinirAside($escolha);
        if(($escolha == 0) || ($escolha == 1)){
            $this->tipo = "Noticia";
        } else if($escolha == 2){
            $this->tipo = "Atualizacao";
        } else if($escolha == 3){
            $this->tipo = "Tier";
        }
        $this->PassarValores($escolha);
        if(($escolha == 0) || ($escolha == 1)){
            $this->setObjConteudo(new Noticias(true, $this->titulo, $this->subtitulo, $this->data, $this->autoria, $this->imagem, $this->video, $this->artigo, $this->pagRelaciona));
        } else if($escolha == 2){
            $this->setObjConteudo(new Atualizacao(true, $this->titulo, $this->subtitulo, $this->autoria, $this->data, $this->imagem, $this->video, $this->campeao, $this->habilidade, $this->mudanca, $this->pagRelaciona));
        } else if($escolha == 3){
            $this->setObjConteudo(new Tier(true, $this->titulo, $this->subtitulo, $this->autoria, $this->data, $this->imagem, $this->video, $this->bufs, $this->nerfs, $this->tabela, $this->artigo, $this->pagRelaciona));
        }
    }
    private function ObjZoeras($escolha){
        $this->PassarValores($escolha);
        $this->setObjConteudo(new Zoeras(false, $this->titulo, $this->subtitulo, $this->data, $this->autoria, $this->imagem, $this->video, $this->artigo, $this->pagRelaciona)); 
    }
    private function DefinirAside($escolha){
        //Irá definir o que das pesquisas passará para o pagRelaciona (Artigo relacionados ao artigo
        switch ($escolha){
            case 0:
                $this->aside = array(
                    array($this->objPesquisa->resposta[3][0], $this->objPesquisa->resposta[3][1], 3), 
                    array($this->objPesquisa->resposta[1][0], $this->objPesquisa->resposta[1][1], 1));
                break;
            case 1:
                $this->aside = array( 
                    array($this->objPesquisa->resposta[2][0], $this->objPesquisa->resposta[2][1], 2), 
                    array($this->objPesquisa->resposta[0][0], $this->objPesquisa->resposta[0][1], 0));
                break;
            case 2:
                $this->aside = array( 
                    array($this->objPesquisa->resposta[3][0], $this->objPesquisa->resposta[3][1], 3), 
                    array($this->objPesquisa->resposta[1][0], $this->objPesquisa->resposta[1][1], 1));
                break;
            case 3:
                $this->aside = array( 
                    array($this->objPesquisa->resposta[2][0], $this->objPesquisa->resposta[2][1], 2), 
                    array($this->objPesquisa->resposta[0][0], $this->objPesquisa->resposta[0][1], 0));
                break;
        }
    }
    private function PassarValores($escolha){
        $this->titulo = $this->getObjPesquisa()->resposta[$escolha][0];
        $this->subtitulo = $this->getObjPesquisa()->resposta[$escolha][1];
        $this->data = $this->getObjPesquisa()->resposta[$escolha][2];
        $this->autoria = $this->getObjPesquisa()->resposta[$escolha][3];
        $this->argencia = $this->getObjPesquisa()->resposta[$escolha][4];
        $this->imagem = $this->getObjPesquisa()->resposta[$escolha][5];
        $this->video = $this->getObjPesquisa()->resposta[$escolha][6];
        $this->pagRelaciona = $this->aside;
        if ($this->tipo == "Tier"){
            $this->bufs = $this->getObjPesquisa()->resposta[$escolha][7];
            $this->nerfs = $this->getObjPesquisa()->resposta[$escolha][8];
            $this->tabela = $this->getObjPesquisa()->resposta[$escolha][9];
            $this->artigo = $this->getObjPesquisa()->resposta[$escolha][10];
        } elseif (($this->tipo == "Noticia") || ($this->tipo = "Zoera")) {
            $this->artigo = $this->getObjPesquisa()->resposta[$escolha][7]; 
        } elseif ($this->tipo == "Atualizacao") {
            $this->campeao = $this->getObjPesquisa()->resposta[$escolha][7];
            $this->habilidade = $this->getObjPesquisa()->resposta[$escolha][8];
            $this->mudanca = $this->getObjPesquisa()->resposta[$escolha][9]; 
        }
    }
    private function ObjDetalhes($logicOrdPadrao, $logicLink, $ordem1, $ordem2, $ordem3, $ordem4){// se passar o logico falço, podera colocar qualquer numero nas variaveis ordem
        $detalhes = new Detalhes;
        if ($logicOrdPadrao == true){
            echo "<div id='detalhes'>";
            $detalhes->MontarDiv($this->objPesquisa->resposta[$ordem1][0], $this->objPesquisa->resposta[$ordem1][1], $this->objPesquisa->resposta[$ordem1][5], "P", $logicLink, $ordem1);
            $detalhes->MontarDiv($this->objPesquisa->resposta[$ordem2][0], $this->objPesquisa->resposta[$ordem2][1], $this->objPesquisa->resposta[$ordem2][5], "M", $logicLink, $ordem2);
            $detalhes->MontarDiv($this->objPesquisa->resposta[$ordem3][0], $this->objPesquisa->resposta[$ordem3][1], $this->objPesquisa->resposta[$ordem3][5], "MTwo", $logicLink, $ordem3);
            $detalhes->MontarDiv($this->objPesquisa->resposta[$ordem4][0], $this->objPesquisa->resposta[$ordem4][1], $this->objPesquisa->resposta[$ordem4][5], "G", $logicLink, $ordem4);
            echo "</div>";
        } else {
            echo "<div id='detalhes'>";
            $detalhes->MontarDiv($this->objPesquisa->resposta[0][0], $this->objPesquisa->resposta[0][1], $this->objPesquisa->resposta[0][5], "P", $logicLink, 0);
            $detalhes->MontarDiv($this->objPesquisa->resposta[1][0], $this->objPesquisa->resposta[1][1], $this->objPesquisa->resposta[1][5], "M", $logicLink, 1);
            $detalhes->MontarDiv($this->objPesquisa->resposta[2][0], $this->objPesquisa->resposta[2][1], $this->objPesquisa->resposta[2][5], "MTwo", $logicLink, 2);
            $detalhes->MontarDiv($this->objPesquisa->resposta[3][0], $this->objPesquisa->resposta[3][1], $this->objPesquisa->resposta[3][5], "G", $logicLink, 3);
            echo "</div>";
        }
    }

    //Metodo construtor
    public function __construct($queryPesq, $urlEscolha) {
        $this->tipo = $queryPesq;
        $menu = new MenuPagina;

        if($queryPesq == "Atualizacao"){
            $menu->PassarLinks("../", "../noticia/", "../zoeras/", "index.php", "../tier/", "../contato/");
            $menu->ConstrutorManual();
            $this->objPesquisa = new QueryAtualizacao();
            $this->objPesquisa->QueryLimit(4);
            $this->ObjDetalhes(true, true, 1, 2, 3, 0);
            $this->DefinirAside($urlEscolha);
            $this->ObjAtualizacao($urlEscolha);
        } elseif ($queryPesq == "Inicio") {
            $menu->PassarLinks("index.php", "noticia/", "zoeras/", "atualizacao/", "tier/", "contato/");
            $menu->ConstrutorManual();
            $this->objPesquisa = new QueryInicio();
            $this->objPesquisa->QueryNotUm("titulo LIKE '%Likkrit%'");
            $this->objPesquisa->QueryNotDois("titulo LIKE 'Coreano%'");
            $this->objPesquisa->QueryAtualizacao("versao LIKE '%8.1%'");
            $this->objPesquisa->QueryTier("descricao LIKE '%8.1%'");
            $this->objDetalhes(true, false, 2, 1, 0, 3);
            $this->DefinirAside($urlEscolha);
            $this->ObjInicio($urlEscolha);
        } elseif ($queryPesq == "Noticia"){
            $menu->PassarLinks("../", "index.php", "../zoeras/", "../atualizacao/", "../tier/", "../contato/");
            $menu->ConstrutorManual();
            $this->objPesquisa = new QueryNoticia();
            $this->objPesquisa->QueryLimit(4);
            $this->ObjDetalhes(true, true, 3, 1, 2, 0);
            $this->DefinirAside($urlEscolha);
            $this->ObjNoticias($urlEscolha);
        } elseif ($queryPesq == "Tier") {
            $menu->PassarLinks("../", "../noticia/", "../zoeras/", "../atualizacao/", "index.php", "../contato/");
            $menu->ConstrutorManual();
            $this->objPesquisa = new QueryTier();
            $this->objPesquisa->QueryLimit(4);
            $this->ObjDetalhes(true, true, 1, 3, 2, 0);
            $this->DefinirAside($urlEscolha);
            $this->ObjTier($urlEscolha);
        } elseif ($queryPesq == "Zoera"){
            $menu->PassarLinks("../", "../noticia/", "index.php", "../atualizacao/", "../tier/", "../contato/");
            $menu->ConstrutorManual();
            $this->objPesquisa = new QueryZoeras();
            $this->objPesquisa->QueryLimit(4);
            $this->ObjDetalhes(false, true, 0, 0, 0, 0);
            $this->DefinirAside($urlEscolha);
            $this->ObjZoeras($urlEscolha);
        }
    }

    //Metodos Getter e Setter
    public function getObjPesquisa() {
        return $this->objPesquisa;
    }
    public function getObjConteudo() {
        return $this->objConteudo;
    }
    public function getObjDetalhes() {
        return $this->objDetalhes;
    }
    public function setObjPesquisa($objPesquisa) {
        $this->objPesquisa = $objPesquisa;
    }
    public function setObjConteudo($objConteudo) {
        $this->objConteudo = $objConteudo;
    }
    public function setObjDetalhes($objDetalhes) {
        $this->objDetalhes = $objDetalhes;
    }
}