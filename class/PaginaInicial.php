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
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[0][0], $this->getObjPesquisa()->getResultado()[0][1], $this->getObjPesquisa()->getResultado()[0][5], "M", false, 0);
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[1][0], $this->getObjPesquisa()->getResultado()[1][1], $this->getObjPesquisa()->getResultado()[1][5], "P", false, 1);
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[2][0], $this->getObjPesquisa()->getResultado()[2][1], $this->getObjPesquisa()->getResultado()[2][5], "PTwo", false, 2);
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[3][0], $this->getObjPesquisa()->getResultado()[3][1], $this->getObjPesquisa()->getResultado()[3][5], "G", false, 3);
                echo "</div>";
            }
            else{
                echo "<div id='detalhes'>";
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[$div1][0], $this->getObjPesquisa()->getResultado()[$div1][1], $this->getObjPesquisa()->getResultado()[$div1][5], "M", false, $div1);
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[$div2][0], $this->getObjPesquisa()->getResultado()[$div2][1], $this->getObjPesquisa()->getResultado()[$div2][5], "P", false, $div2);
                $this->objDetalhes->MontarDiv($this->getObjPesquisa()->getResultado()[$div3][0], $this->getObjPesquisa()->getResultado()[$div3][1], $this->getObjPesquisa()->getResultado()[$div3][5], "PTwo", false, $div3);
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
        	$this->objConteudo = new Noticias($logicoLocal, $logicoAside, $this->getTitulo(), $this->getSubtitulo(), $this->getAutoria(), $this->getData(), $this->getImagem(), $this->getVideo(), $this->getArtigo(), $this->getAside(), $this->getComentario());
    	  }
        elseif($this->getEscolha() == 1){
        	$this->objConteudo = new Atualizacao($logicoLocal, $logicoAside, $this->getTitulo(), $this->getSubtitulo(), $this->getAutoria(), $this->getData(), $this->getImagem(), $this->getVideo(), $this->getCampeao(), $this->getHabilidade(), $this->getMudanca(), $this->getAside(), $this->getComentario());
    	  }
        elseif($this->getEscolha() == 2){
        	$this->objConteudo = new Tier($logicoLocal, $logicoAside, $this->getTitulo(), $this->getSubtitulo(), $this->getAutoria(), $this->getData(), $this->getImagem(), $this->getVideo(), $this->getBufs(), $this->getNerfs(), $this->getTabela(), $this->getArtigo(), $this->getAside(), $this->getComentario());
    	  }
        elseif($this->getEscolha() == 3){
        	$this->objConteudo = new Zoeras($logicoLocal, $logicoAside, $this->getTitulo(), $this->getSubtitulo(), $this->getAutoria(), $this->getData(), $this->getImagem(), $this->getVideo(), $this->getArtigo(), $this->getAside(), $this->getComentario());
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
    public function __construct($escolha, $coment){
        /*
         * A variavel $logico esta perguntando se a pesquisa será feita pelos ultimos artigo feitos do assunto ou por uma pagina especifica;
         * A variavel $pesquisa é onde ficará a o que será pesquisado no banco de dados para formar a pagina, se o $logico for false essa variavel não faz nada;
         * A variavel $escolha é onde estará o numero da conteudo da pagina se for mais de um conteudo pesquisado no DB;
         */
        $this->setEscolha($escolha);
        $this->objMenu = new MenuPagina();
        $this->objDetalhes = new Detalhes();
        $this->setObjPesquisa(new QueryInicio()); //A Função setObjPesquisa vai receber a classe QueryInicio para fazer a pesquisas sobre os artigos dessa pagina.
        $this->getObjPesquisa()->QueryNotUm("titulo LIKE '%Imbatível%Kabum%liderança%'");
        $this->getObjPesquisa()->QueryAtualizacao("versao LIKE '%801%'");
        $this->getObjPesquisa()->QueryTier("versao LIKE '%8.2%'");
        $this->getObjPesquisa()->QueryZoeras("subtitulo LIKE '%Shevii%fazendo%cagada%como%sempre%'");

        $this->fazerDetalhes = true;
        if ($this->getEscolha() == 0){
            if ($coment[1] != null){
                $this->EnviarComent("noticia", $coment[0], $coment[1]);
            }
            $this->PesquisarComentario("noticia", null);// Ele estrega o getComentario definido na mãe "Pagina.php" ("qual pagina do comentario", "data especifica do comentario")
            $this->ValoresNotZoe();
        }
        elseif ($this->getEscolha() == 1){
            if ($coment[1] != null){
                $this->EnviarComent("atualizacao", $coment[0], $coment[1]);
            }
            $this->PesquisarComentario("atualizacao", null);// Ele estrega o getComentario definido na mãe "Pagina.php" ("qual pagina do comentario", "data especifica do comentario")
            $this->ValoresAtualizacao();
        }
        elseif ($this->getEscolha() == 2){
            if ($coment[1] != null){
                $this->EnviarComent("tierlist", $coment[0], $coment[1]);
            }
            $this->PesquisarComentario("tierlist", null);// Ele estrega o getComentario definido na mãe "Pagina.php" ("qual pagina do comentario", "data especifica do comentario")
            $this->ValoresTier();
        }
        elseif ($this->getEscolha() == 3){
            if ($coment[1] != null){
                $this->EnviarComent("zoera", $coment[0], $coment[1]);
            }
            $this->PesquisarComentario("zoera", null);// Ele estrega o getComentario definido na mãe "Pagina.php" ("qual pagina do comentario", "data especifica do comentario")
            $this->ValoresNotZoe();
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
