<?php
/**
 * Description of Noticias
 *
 * @author Odair
 */
require_once 'Query.php';
class QueryAtualizacao extends Query{
    private $patch, $contLinha, $ultPatch;

    //Metodos
    public function QueryLimit($limit){
        /*
         * Como na tabela 'atualizacao' do Bancos de Dados, tem mais de uma linha, para ser levada para uma pagina. 
         * É precisso pesquisar quais e quantas linhas vão para mesmo paginas 
         */
        $this->UltimoPatch($limit);// Função para saber apartir de qual patch iremos pesquisar
        $this->setQuery("SELECT * FROM atualizacao WHERE versao>='".$this->getPatch()."' ORDER BY versao desc");
        $this->ResponderQuery();
    }
    public function QueryColumn($column){
        $this->setQuery("SELECT $column FROM atualizacao ORDER BY lancamento desc");
        $this->ResponderQuery();
    }
    public function QueryWhere($where){
        $this->setQuery("SELECT * FROM atualizacao WHERE $where ORDER BY lancamento  desc");
        $this->ResponderQuery();
    }
    public function QueryOrderBy($order){
        $this->setQuery("SELECT * FROM atualizacao ORDER BY $order desc");
        $this->ResponderQuery();
    }
    protected function ContarLinhas(){
        /* 
         * Essa função contará quantos campeões mudaram, separados por patch
         */
        for($con=$this->getUltPatch(); $con>=$this->getPatch(); $con--){
            /*
             * Uma repetição para pesquisar um patch de cada vez e contar quantos vetores tem essa matriz, esse numero sera eventualmente igual ao numero de campeões que mudaram em determinado patch
             */
            $select = $this->getConexao()->query("SELECT * FROM atualizacao WHERE versao='$con'");
            while($res = $select->fetch(PDO::FETCH_OBJ)){// Vai contar quantos vertores tem por patch
                $pes[] = array($res->id);
            }
            if (empty($pes)){
                echo "<h1>O numero de linhas pedida é menor que o numero escontradas</h1>";
            }else{
                $this->setContLinha(count($pes) -1);
            }
        }
    }
    protected function UltimoPatch($limit){
        /*
         * Vai informar qual foi o ultimo patch adicionado e subtrairá desse numero, o $limit informado na QueryLimit
         * Assim saberemos quais e quantos patchs, terão que ser pesquisados 
         */
        $select = $this->getConexao()->query("SELECT * FROM atualizacao ORDER BY versao desc LIMIT 1");
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $pesq = $res->versao;
        }
        $this->setUltPatch($pesq);//817
        $this->setPatch($pesq +1 - $limit);//814
        $this->ContarLinhas();// Saber quantas linhas tem cada patch, para que o arquivo php que fizer essa pesquisa saiba quantas fasses ele repitira os atributos para o HTML.
    }
    protected function ResponderQuery(){
        $select = $this->getConexao()->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OBJ)){
            $this->setResultado(array($res->titulo, $res->descricao, $res->lancamento, $res->criadores, $res->argencia, $res->imagem, $res->video, $res->campeao, $res->habilidade, $res->mudanca, $res->versao));
        }
    }

    public function setPatch($patch){
        $this->patch = $patch;
    }
    public function setUltPatch($ultPatch){
        $this->ultPatch = $ultPatch;
    }
    public function setContLinha($contLinha){
        $this->contLinha[] = $contLinha;
    }   
    public function getPatch(){
        return $this->patch;
    }
    public function getUltPatch(){
        return $this->ultPatch;
    }
    public function getContLinha(){
        return $this->contLinha;
    }
}
