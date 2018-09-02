<?php


require_once 'Pagina.php';
class PaginaAtualizacao extends Pagina{
    private $objConteudo, $objMenu, $objDetalhes, $objFooter;
    private $fazerDetalhes;

    public function MontarDetalhes($padraoOrdem, $div1, $div2, $div3, $div4){
    /*
     *Nesse metodo será feito a div onde ficará os ultimas pagina feitas no banco de dados.
     *Para montar a div primeiro ele terá que vefificar se a pagina vai ter ela é isso que a variavel $fazerDetalhes ira passar como logico.
     *Já o $padraoOrdem também será logico, mas perguntando se as divs dentro do Detalhes estara na ordem normal ou a ordem alterada, se for o logico for FALSE, o proprio programador monstrará a ordem, passando qual o conteudo de cada div, com as variavel $div1, ...2, ...3 e $div4
     */
        $log1 = $this->getObjPesquisa()->getContLinha()[$div1];
        $log2 = $this->getObjPesquisa()->getContLinha()[$div2];
        $log3 = $this->getObjPesquisa()->getContLinha()[$div3];
        $log4 = $this->getObjPesquisa()->getContLinha()[$div4];
        if ($this->fazerDetalhes){
            if ($padraoOrdem){
                echo "<div id='detalhes'>";
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[0][0], $this->getObjPesquisa()->getResultado()[0][1], $this->getObjPesquisa()->getResultado()[0][5], "M", true, 0);
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[1][0], $this->getObjPesquisa()->getResultado()[1][1], $this->getObjPesquisa()->getResultado()[1][5], "P", true, 1);
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[2][0], $this->getObjPesquisa()->getResultado()[2][1], $this->getObjPesquisa()->getResultado()[2][5], "PTwo", true, 2);
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[3][0], $this->getObjPesquisa()->getResultado()[3][1], $this->getObjPesquisa()->getResultado()[3][5], "G", true, 3);
                echo "</div>";
            }
            else{
                echo "<div id='detalhes'>";
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[$log1][0], $this->getObjPesquisa()->getResultado()[$log1][1], $this->getObjPesquisa()->getResultado()[$log1][5], "M", true, $div1);
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[$log2][0], $this->getObjPesquisa()->getResultado()[$log2][1], $this->getObjPesquisa()->getResultado()[$log2][5], "P", true, $div2);
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[$log3][0], $this->getObjPesquisa()->getResultado()[$log3][1], $this->getObjPesquisa()->getResultado()[$log3][5], "PTwo", true, $div3);
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[$log4][0], $this->getObjPesquisa()->getResultado()[$log4][1], $this->getObjPesquisa()->getResultado()[$log4][5], "G", true, $div4);
                echo "</div>";
            }
        }
    }
    public function MontarConteudo($logicoLocal, $logicoAside){
        /*
         *A variavel $logicoLocal é um logico onde será pergundo se a pagina esta sendo feita a pasta raiz ou filha do sistema (true = não esta) e (false = esta);
         *A variavel $logicoAside também é um logico que esta perguntando se o conteudo aside que estara do lado da artigo será feito ou não;
         */
        $this->DefinirAside();
        $this->objConteudo = new Atualizacao($logicoLocal, $logicoAside, $this->getTitulo(), $this->getSubtitulo(), $this->getAutoria(), $this->getData(), $this->getImagem(), $this->getVideo(), $this->getCampeao(), $this->getHabilidade(), $this->getMudanca(), $this->getAside(), $this->getComentario(), $this->getQuantMudanca());
    }
    public function MontarMenu(){
        /*
         * Nesde será feito o menu da pagina;
         */
        $this->objMenu->PassarLinks("../", "../noticia/", "../zoeras/", "index.php", "../tier/", "../contato/");
        $this->objMenu->ConstrutorManual();
    }
    public function __construct($logico, $pesquisa, $escolha, $coment){
        /*
         * A variavel $logico esta perguntando se a pesquisa será feita pelos ultimos artigo feitos do assunto ou por uma pagina especifica;
         * A variavel $pesquisa é onde ficará a o que será pesquisado no banco de dados para formar a pagina, se o $logico for false essa variavel não faz nada;
         * A variavel $escolha é onde estará o numero da conteudo da pagina se for mais de um conteudo pesquisado no DB;
         */
        if ($coment[1] != null){
            $this->EnviarComent("atualizacao", $coment[0], $coment[1]);
        }
        $this->setEscolha($escolha);//Passando o numero da escolha para o atributo global, pois ela será usada em quase todas as funções da Pagina.php
        $this->objMenu = new MenuPagina();
        $this->objDetalhes = new Detalhes();
        $this->PesquisarComentario("atualizacao", null);// Ele entrega o getComentario definido na mãe "Pagina.php" ("qual pagina do comentario", "data especifica do comentario")
        $this->setObjPesquisa(new QueryAtualizacao());
        if ($logico){
            $this->objPesquisa->QueryWhere("titulo LIKE $pesquisa");
            $this->ValoresAtualizacao(0);
            $this->fazerDetalhes = false;
        }else{
            $this->getObjPesquisa()->QueryLimit(4);
            $this->fazerDetalhes = true;
            $this->ValoresAtualizacao($this->getObjPesquisa()->getContLinha()[$this->getEscolha()]);// Ele passará o valor de um do elementos do array com os numeros de quantas linhas cada patch tem 
        }
    }
    public function getObjConteudo(){
        return $this->objConteudo;
    }
    public function getObjMenu(){
        return $this->objMenu;
    }
    public function getObjDetalhes(){
        return $this->objDetalhes;
    }
    public function getObjFooter(){
        return $this->objFooter;
    }
    public function setObjConteudo($objConteudo){
        $this->objConteudo = $objConteudo;
    }
    public function setObjMenu($objMenu){
        $this->objMenu = $objMenu;
    }
    public function setObjDetalhes($objDetalhes){
        $this->objDetalhes = $objDetalhes;
    }
    public function setObjFooter($objFooter){
        $this->objFooter = $objFooter;
    }
}
