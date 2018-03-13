<?php

require_once 'Pagina.php';
class PaginaInicial extends Pagina{
    private $objConteudo, $objMenu, $objDetalhes, $objFooter;
    private $fazerDetalhes;

    public function MontarDetalhes($padraoOrdem, $div1, $div2, $div3, $div4){
    /*
     *Nesse metodo será feito a div onde ficará os ultimas pagina feitas no banco de dados.
     *Para montar a div primeiro ele terá que vefificar se a pagina vai ter ela é isso que a variavel $fazerDetalhes ira passar como logico.
     *Já o $padraoOrdem também será logico, mas perguntando se as divs dentro do Detalhes estara na ordem normal ou a ordem alterada, se for o logico for FALSE, o proprio programador monstrará a ordem, passando qual o conteudo de cada div, com as variavel $div1, ...2, ...3 e $div4
     */
        if ($this->fazerDetalhes){
            if ($padraoOrdem){
                echo "<div id='detalhes'>";
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[0][0], $this->getObjPesquisa()->getResultado()[0][1], $this->getObjPesquisa()->getResultado()[0][5], "P", false, 0);
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[1][0], $this->getObjPesquisa()->getResultado()[1][1], $this->getObjPesquisa()->getResultado()[1][5], "M", false, 1);
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[2][0], $this->getObjPesquisa()->getResultado()[2][1], $this->getObjPesquisa()->getResultado()[2][5], "MTwo", false, 2);
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[3][0], $this->getObjPesquisa()->getResultado()[3][1], $this->getObjPesquisa()->getResultado()[3][5], "G", false, 3);
                echo "</div>";
            }
            else{
                echo "<div id='detalhes'>";
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[$div1][0], $this->getObjPesquisa()->getResultado()[$div1][1], $this->getObjPesquisa()->getResultado()[$div1][5], "P", false, $div1);
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[$div2][0], $this->getObjPesquisa()->getResultado()[$div2][1], $this->getObjPesquisa()->getResultado()[$div2][5], "M", false, $div2);
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[$div3][0], $this->getObjPesquisa()->getResultado()[$div3][1], $this->getObjPesquisa()->getResultado()[$div3][5], "MTwo", false, $div3);
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[$div4][0], $this->getObjPesquisa()->getResultado()[$div4][1], $this->getObjPesquisa()->getResultado()[$div4][5], "G", false, $div4);
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
        if ($this->getEscolha() == 0){
        	$this->objConteudo = new Noticias($logicoLocal, $logicoAside, $this->getTitulo(), $this->getSubtitulo(), $this->getAutoria(), $this->getData(), $this->getImagem(), $this->getVideo(), $this->getArtigo(), $this->getAside());
    	  }
        elseif($this->getEscolha() == 1){
        	$this->objConteudo = new Atualizacao($logicoLocal, $logicoAside, $this->getTitulo(), $this->getSubtitulo(), $this->getAutoria(), $this->getData(), $this->getImagem(), $this->getVideo(), $this->getCampeao(), $this->getHabilidade(), $this->getMudanca(), $this->getAside());
    	  }
        elseif($this->getEscolha() == 2){
        	$this->objConteudo = new Tier($logicoLocal, $logicoAside, $this->getTitulo(), $this->getSubtitulo(), $this->getAutoria(), $this->getData(), $this->getImagem(), $this->getVideo(), $this->getBufs(), $this->getNerfs(), $this->getTabela(), $this->getArtigo(), $this->getAside());
    	  }
        elseif($this->getEscolha() == 3){
        	$this->objConteudo = new Zoeras($logicoLocal, $logicoAside, $this->getTitulo(), $this->getSubtitulo(), $this->getAutoria(), $this->getData(), $this->getImagem(), $this->getVideo(), $this->getArtigo(), $this->getAside());
    	  }
    }
    public function MontarMenu(){
        /*
         * Nesde será feito o menu da pagina;
         */
        $this->objMenu->PassarLinks("index.php", "noticia/", "zoeras/", "atualizacao/", "tier/", "contato/");
        $this->objMenu->ConstrutorManual();
    }
    public function MontarFooter(){
    }
    public function __construct($escolha){
        /*
         * A variavel $logico esta perguntando se a pesquisa será feita pelos ultimos artigo feitos do assunto ou por uma pagina especifica;
         * A variavel $pesquisa é onde ficará a o que será pesquisado no banco de dados para formar a pagina, se o $logico for false essa variavel não faz nada;
         * A variavel $escolha é onde estará o numero da conteudo da pagina se for mais de um conteudo pesquisado no DB;
         */
        $this->setEscolha($escolha);
        $this->objMenu = new MenuPagina();
        $this->objDetalhes = new Detalhes();
        //$this->objFooter = new Footer();
        $this->setObjPesquisa(new QueryInicio());
        $this->getObjPesquisa()->QueryNotUm("titulo LIKE '%Imbatível%Kabum%liderança%'");
        $this->getObjPesquisa()->QueryAtualizacao("versao LIKE '%8.1%'");
        $this->getObjPesquisa()->QueryTier("versao LIKE '%8.2%'");
        $this->getObjPesquisa()->QueryZoeras("subtitulo LIKE '%Shevii%fazendo%cagada%como%sempre%'");

        $this->fazerDetalhes = true;
        if ($escolha == 0){
            $this->PassarValores("Noticia");
        }
        elseif ($escolha == 1){
            $this->PassarValores("Atualizacao");
            if ($this->getCampeao() || NULL && $this->getHabilidade() == NULL || $this->getMudanca() == NULL){
                $this->setCampeao($this->getObjPesquisa()->getResultado()[$this->getEscolha()][7]);
                $this->setHabilidade($this->getObjPesquisa()->getResultado()[$this->getEscolha()][8]);
                $this->setMudanca($this->getObjPesquisa()->getResultado()[$this->getEscolha()][9]);
            }
        }
        elseif ($escolha == 2){
            $this->PassarValores("Tier");
        }
        elseif ($escolha == 3){
            $this->PassarValores("Zoera");
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
