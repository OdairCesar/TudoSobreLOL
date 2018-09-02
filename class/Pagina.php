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
require_once 'AdminComment.php';
require_once 'MenuPagina.php';
class Pagina {
    //1.Atributos
    private $aside;//Recebe parte do objeto para aside
    private $objPesquisa; //Recebe o objetos
    private $titulo, $subtitulo, $data, $autoria, $argencia, $imagem, $video, $campeao, $habilidade, $mudanca, $quantMudanca, $bufs, $nerfs, $tabela, $artigo; //1.1.Atributos peguam receber os atributos  da SuperClasse Query para passam nas demais SuperClasse
    private $escolha, $comentario;
    private $verifLinha;

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
    protected function LimiteRepeticao($soma){
        switch($soma){
            case 0:
                $this->setVerifLinha(0);
                break;
            case 1:
                $this->setVerifLinha($this->getObjPesquisa()->getContLinha()[0]);
                break;
            case 2:
                $this->setVerifLinha($this->getObjPesquisa()->getContLinha()[1]);
                break;
            case 3:
                $this->setVerifLinha($this->getObjPesquisa()->getContLinha()[2]);
                break;
        }
    }
    protected function ValoresTier(){
        /**
         * Passará o array para atributos, em que, a pagina seja a Tier. Dessa forma, as filhas da Query, só será acessada pela Pagina.php e as filhas dela.
         */
        $this->setTitulo($this->objPesquisa->getResultado()[$this->getEscolha()][0]);
        $this->setSubtitulo($this->objPesquisa->getResultado()[$this->getEscolha()][1]);
        $this->setData($this->objPesquisa->getResultado()[$this->getEscolha()][2]);
        $this->setAutoria($this->objPesquisa->getResultado()[$this->getEscolha()][3]);
        $this->setArgencia($this->objPesquisa->getResultado()[$this->getEscolha()][4]);
        $this->setImagem($this->objPesquisa->getResultado()[$this->getEscolha()][5]);
        $this->setVideo($this->objPesquisa->getResultado()[$this->getEscolha()][6]);
        $this->setBufs($this->objPesquisa->getResultado()[$this->getEscolha()][7]);
        $this->setNerfs($this->objPesquisa->getResultado()[$this->getEscolha()][8]);
        $this->setTabela($this->objPesquisa->getResultado()[$this->getEscolha()][9]);
        $this->setArtigo($this->objPesquisa->getResultado()[$this->getEscolha()][10]);
    }
    protected function ValoresNotZoe(){
        /**
         * Passará o array para atributos, em que, a pagina seja a Noticia e Zoeras. Dessa forma, as filhas da Query, só será acessada pela Pagina.php e as filhas dela.
         */
        $this->setTitulo($this->objPesquisa->getResultado()[$this->getEscolha()][0]);
        $this->setSubtitulo($this->objPesquisa->getResultado()[$this->getEscolha()][1]);
        $this->setData($this->objPesquisa->getResultado()[$this->getEscolha()][2]);
        $this->setAutoria($this->objPesquisa->getResultado()[$this->getEscolha()][3]);
        $this->setArgencia($this->objPesquisa->getResultado()[$this->getEscolha()][4]);
        $this->setImagem($this->objPesquisa->getResultado()[$this->getEscolha()][5]);
        $this->setVideo($this->objPesquisa->getResultado()[$this->getEscolha()][6]);
        $this->setArtigo($this->objPesquisa->getResultado()[$this->getEscolha()][7]);
    }
    protected function ValoresAtualizacao($quant){
        /**
         * Passará o array para atributos, em que, a pagina seja a Atualizacao. Dessa forma, as filhas da Query, só será acessada pela Pagina.php e as filhas dela.
         * Tambem repetirá os ultimos elementos, pois os patch tem mais de uma modificação. Para fazer isso coloquei como array os atributos $campeao, $habilidade e $mudanca na Funções set delas
         * Como todos a linhas do array, que entregam os atributos tem titulo, subtitulo, imagem, etc. Não irá fazer diferença o elemento do array $resto entregada como $quantMudanca for alto.
         */
        $this->LimiteRepeticao($this->getEscolha());// Irá passar para variavel $verifLinha, até que array a repetição será feita
        $this->setQuantMudanca(array($quant, $this->getVerifLinha()));
        $this->setTitulo($this->objPesquisa->getResultado()[$quant][0]);
        $this->setSubtitulo($this->objPesquisa->getResultado()[$quant][1]);
        $this->setData($this->objPesquisa->getResultado()[$quant][2]);
        $this->setAutoria($this->objPesquisa->getResultado()[$quant][3]);
        $this->setArgencia($this->objPesquisa->getResultado()[$quant][4]);
        $this->setImagem($this->objPesquisa->getResultado()[$quant][5]);
        $this->setVideo($this->objPesquisa->getResultado()[$quant][6]);
        for($contar=$quant; $contar>=$this->getVerifLinha(); $contar--){// Repetição para fazer os arrays campeao, habilidade, mudanca. Usados para fazer o HTML da pagina Atualiacao.
            $this->campeao[$contar] = $this->objPesquisa->getResultado()[$contar][7];
            $this->habilidade[$contar] = $this->objPesquisa->getResultado()[$contar][8];
            $this->mudanca[$contar] = $this->objPesquisa->getResultado()[$contar][9];
        }
    }
    protected function PesquisarComentario($pagina, $data){
        /*
         * Essa função pesquisará os comentarios:
         * 
         * $pagina somente aceitara as palavras 'atualizacao','noticias', 'tierlist', 'zoera' e 'todas'.
         * $quantidades será quantos comentarios, seram pegos.
         * $data será usada para pesquisar comentarios feitos em um dia especifico
         */
        $objPesqComent = new AdminComment();
        $objPesqComent->Query($pagina, $data);
        $this->setComentario($objPesqComent->getResultado());  
    }
    protected function EnviarComent($pagina, $nome, $comentario){
        /*
         * Ela enviar o comentario feito para o Banco de Dados
         */
        $objPesqComent = new AdminComment();
        $objPesqComent->Insert($pagina, $nome, $comentario);
    }
    public function FazerMetas(){
        /*
         * Vai pegar o titulo do artigo, e colocar como nome da pagina. E subtitulo do artigo como a descrição
         */
        echo "<title>{$this->getTitulo()}</title>";
        echo "<meta name='author' content='{$this->getautoria()}'>";
        echo "<meta name='description' content='{$this->getSubtitulo()}'>";
    }

    //Metodos Getter e Setter
    public function getObjPesquisa() {
        return $this->objPesquisa;
    }
    public function getEscolha(){
        return $this->escolha;
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
    public function getArgencia() {
        return $this->argencia;
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
    public function getCampeao() {
        return $this->campeao;
    }
    public function getHabilidade() {
        return $this->habilidade;
    }
    public function getMudanca() {
        return $this->mudanca;
    }
    public function getComentario(){
        return $this->comentario;
    }
    public function getQuantMudanca(){
        return $this->quantMudanca;
    }
    public function getVerifLinha(){
        return $this->verifLinha;
    }
    public function setObjPesquisa($objPesquisa) {
        $this->objPesquisa = $objPesquisa;
    }
    public function setEscolha($escolha){
        $this->escolha = $escolha;
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
    public function setArgencia($argencia) {
        $this->argencia = $argencia;
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
    public function setComentario($comentario){
        $this->comentario = $comentario;
    }
    public function setCampeao($campeao) {
        $this->campeao[] = $campeao;
    }
    public function setHabilidade($habilidade) {
        $this->habilidade[] = $habilidade;
    }
    public function setMudanca($mudanca) {
        $this->mudanca[] = $mudanca;
    }
    public function setQuantMudanca($quantMudanca){
        $this->quantMudanca = $quantMudanca;
    }
    public function setVerifLinha($linha){
        $this->verifLinha = $linha;
    }
}
