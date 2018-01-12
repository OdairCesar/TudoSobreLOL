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
require_once 'QueryAtualizacao.php';
require_once 'QueryInicio.php';
require_once 'QueryNoticia.php';
require_once 'QueryTier.php';
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
        $this->setObjDetalhes(new Atualizacao($this->titulo, $this->subtitulo, $this->autoria, $this->data, $this->imagem, $this->video, $this->campeao, $this->habilidade, $this->mudanca, $this->pagRelaciona)); 
    }
    private function ObjNoticias($escolha){
        $this->DefinirAside($escolha);
        $this->PassarValores($escolha);
        $this->setObjDetalhes(new Noticias($this->titulo, $this->subtitulo, $this->data, $this->autoria, $this->imagem, $this->video, $this->artigo, $this->pagRelaciona)); 
    }
    private function ObjTier($escolha){
        $this->DefinirAside($escolha);
        $this->PassarValores($escolha);
        $this->setObjDetalhes(new Tier($this->titulo, $this->subtitulo, $this->autoria, $this->data, $this->imagem, $this->video, $this->bufs, $this->nerfs, $this->tabela, $this->artigo, $this->pagRelaciona)); 
    }
    private function DefinirAside($escolha){
        //Irá definir o que das pesquisas passará para o pagRelaciona (Artigo relacionados ao artigo)
        switch ($escolha){
            case 0:
                $this->aside = array(
                    array($this->objPesquisa->resposta[1][0], $this->objPesquisa->resposta[1][1]), 
                    array($this->objPesquisa->resposta[2][0], $this->objPesquisa->resposta[2][1])
                );
                break;
            case 1:
                $this->aside = array(
                    array($this->objPesquisa->resposta[0][0], $this->objPesquisa->resposta[0][1]), 
                    array($this->objPesquisa->resposta[2][0], $this->objPesquisa->resposta[2][1])
                );
                break;
            case 2:
                $this->aside = array(
                    array($this->objPesquisa->resposta[1][0], $this->objPesquisa->resposta[1][1]), 
                    array($this->objPesquisa->resposta[0][0], $this->objPesquisa->resposta[0][1])
                );
                break;
            case 3:
                $this->aside = array(
                    array($this->objPesquisa->resposta[1][0], $this->objPesquisa->resposta[1][1]), 
                    array($this->objPesquisa->resposta[2][0], $this->objPesquisa->resposta[2][1])
                );
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
        } else if ($this->tipo == "Noticia") {
            $this->artigo = $this->getObjPesquisa()->resposta[$escolha][7]; 
        } else if ($this->tipo == "Atualizacao") {
            $this->campeao = $this->getObjPesquisa()->resposta[0][7];
            $this->habilidade = $this->getObjPesquisa()->resposta[0][8];
            $this->mudanca = $this->getObjPesquisa()->resposta[0][9]; 
    }
    }

    //Metodo construtor
    public function __construct($queryPesq, $urlEscolha) {
        $this->tipo = $queryPesq;
        $menu = new MenuPagina;


        if($queryPesq == "Atualizacao"){
            $menu->PassarLinks("../index.php", "../noticia/index.php", "../stream/index.php", "index.php", "../tier/index.php", "../contato/index.php");
            $menu->ConstrutorManual();
            $this->objPesquisa = new QueryAtualizacao();
            $this->objPesquisa->QueryLimit(4);
            $this->DefinirAside($urlEscolha);
            $this->ObjAtualizacao($urlEscolha);
        }
        elseif ($queryPesq == "Inicio") {
            $menu->PassarLinks("index.php", "noticia/index.php", "stream/index.php", "atualizacao/index.php", "tier/index.php", "contato/index.php");
            $menu->ConstrutorManual();
            $this->DefinirAside($urlEscolha);
            $this->ObjInicio($urlEscolha);
        }
        elseif ($queryPesq == "Noticia"){
            $menu->PassarLinks("../index.php", "index.php", "../stream/index.php", "../atualizacao/index.php", "../tier/index.php", "../contato/index.php");
            $menu->ConstrutorManual();
            $this->objPesquisa = new QueryNoticia();
            $this->objPesquisa->QueryLimit(4);
            $this->DefinirAside($urlEscolha);
            $this->ObjNoticias($urlEscolha);
        }
        elseif ($queryPesq == "Tier") {
            $menu->PassarLinks("../index.php", "../noticia/index.php", "../stream/index.php", "../atualizacao/index.php", "index.php", "../contato/index.php");
            $menu->ConstrutorManual();
            $this->objPesquisa = new QueryTier();
            $this->objPesquisa->QueryLimit(4);
            $this->DefinirAside($urlEscolha);
            $this->ObjTier($urlEscolha);
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