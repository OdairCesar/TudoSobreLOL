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
require_once 'QueryComentarios.php';
require_once 'MenuPagina.php';
class Pagina {
    //1.Atributos
    private $aside;//Recebe parte do objeto para aside
    private $objPesquisa; //Recebe o objetos
    private $titulo, $subtitulo, $data, $autoria, $imagem, $video, $campeao, $habilidade, $mudanca, $bufs, $nerfs, $tabela, $artigo; //1.1.Atributos peguam receber os atributos  da SuperClasse Query para passam nas demais SuperClasse
    private $comentario;
    private $escolha;

    //Metodos que formar objetos diferenciando cada
    protected function DefinirAside(){
        //Irá definir o que das pesquisas passará para o pagRelaciona (Artigo relacionados ao artigo
        switch ($this->getEscolha()){
            case 0:
                $this->aside = array(
                    array($this->objPesquisa->getResultado()[3][0], $this->objPesquisa->getResultado()[3][1], 3),
                    array($this->objPesquisa->getResultado()[1][0], $this->objPesquisa->getResultado()[1][1], 1));
                break;
            case 1:
                $this->aside = array(
                    array($this->objPesquisa->getResultado()[2][0], $this->objPesquisa->getResultado()[2][1], 2),
                    array($this->objPesquisa->getResultado()[0][0], $this->objPesquisa->getResultado()[0][1], 0));
                break;
            case 2:
                $this->aside = array(
                    array($this->objPesquisa->getResultado()[3][0], $this->objPesquisa->getResultado()[3][1], 3),
                    array($this->objPesquisa->getResultado()[1][0], $this->objPesquisa->getResultado()[1][1], 1));
                break;
            case 3:
                $this->aside = array(
                    array($this->objPesquisa->getResultado()[2][0], $this->objPesquisa->getResultado()[2][1], 2),
                    array($this->objPesquisa->getResultado()[0][0], $this->objPesquisa->getResultado()[0][1], 0));
                break;
        }
    }
    protected function PassarValores($tipo){
        $this->titulo = $this->objPesquisa->getResultado()[$this->escolha][0];
        $this->subtitulo = $this->objPesquisa->getResultado()[$this->escolha][1];
        $this->data = $this->objPesquisa->getResultado()[$this->escolha][2];
        $this->autoria = $this->objPesquisa->getResultado()[$this->escolha][3];
        $this->imagem = $this->objPesquisa->getResultado()[$this->escolha][5];
        $this->video = $this->objPesquisa->getResultado()[$this->escolha][6];
        if ($tipo == "Tier"){
            $this->bufs = $this->objPesquisa->getResultado()[$this->escolha][7];
            $this->nerfs = $this->objPesquisa->getResultado()[$this->escolha][8];
            $this->tabela = $this->objPesquisa->getResultado()[$this->escolha][9];
            $this->artigo = $this->objPesquisa->getResultado()[$this->escolha][10];
        } elseif ($tipo == "Noticia" || $tipo = "Zoera") {
            $this->artigo = $this->objPesquisa->getResultado()[$this->escolha][7];
        } elseif ($tipo == "Atualizacao") {
            $this->campeao = $this->objPesquisa->getResultado()[$this->escolha][7];
            $this->habilidade = $this->objPesquisa->getResultado()[$this->escolha][8];
            $this->mudanca = $this->objPesquisa->getResultado()[$this->escolha][9];
        }
    }
    protected function PesquisarComentario($quant){
        $objPesqComent = new QueryComentarios();
        $objPesqComent->QueryLimit($quant);
        $this->setComentario($objPesqComent->getResultado());  
    }
    public function FazerMetas(){
        echo "<title>{$this->getTitulo()}</title>";
        echo "<meta name='author' content='{$this->getautoria()}'>";
        echo "<meta name='description' content='{$this->getSubtitulo()}'>";
    }

    //Metodos Getter e Setter
    public function getObjPesquisa() {
        return $this->objPesquisa;
    }
    public function setObjPesquisa($objPesquisa) {
        $this->objPesquisa = $objPesquisa;
    }
    public function getEscolha() {
        return $this->escolha;
    }
    public function setEscolha($escolha) {
        $this->escolha = $escolha;
    }
    public function getAside() {
        return $this->aside;
    }
    public function getTitulo() {
        return $this->titulo;
    }
    public function getSubtitulo() {
        return $this->subtitulo;
    }
    public function getData() {
        return $this->data;
    }
    public function getAutoria() {
        return $this->autoria;
    }
    public function getImagem() {
        return $this->imagem;
    }
    public function getVideo() {
        return $this->video;
    }
    public function getBufs() {
        return $this->bufs;
    }
    public function getNerfs() {
        return $this->nerfs;
    }
    public function getTabela() {
        return $this->tabela;
    }
    public function getArtigo() {
        return $this->artigo;
    }
    public function setAside($aside) {
        $this->aside = $aside;
    }
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    public function setSubtitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }
    public function setData($data) {
        $this->data = $data;
    }
    public function setAutoria($autoria) {
        $this->autoria = $autoria;
    }
    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }
    public function setVideo($video) {
        $this->video = $video;
    }
    public function setBufs($bufs) {
        $this->bufs = $bufs;
    }
    public function setNerfs($nerfs) {
        $this->nerfs = $nerfs;
    }
    public function setTabela($tabela) {
        $this->tabela = $tabela;
    }
    public function setArtigo($artigo) {
        $this->artigo = $artigo;
    }
    public function getCampeao() {
        return $this->campeao;
    }
    public function getHabilidade() {
        return $this->habilidade;
    }
    public function getMudanca() {
        return $this->mudanca;
    }
    public function setCampeao($campeao) {
        $this->campeao = $campeao;
    }
    public function setHabilidade($habilidade) {
        $this->habilidade = $habilidade;
    }
    public function setMudanca($mudanca) {
        $this->mudanca = $mudanca;
    }
    public function getComentario(){
        return $this->comentario;
    }
    public function setComentario($comentario){
        $this->comentario = $comentario;
    }

}
