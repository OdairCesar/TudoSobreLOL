<?php
/**
 *Description of Noticias
 *
 *@author Odair
 */
 require_once 'Conexao.php';
class AdminComment extends Conexao{
    //Atributos
    private $resultado, $query, $erro;

    //Metados para modivicar comentarios
    protected function Modify($pagina, $nomeNovo, $nomeAnterior, $comNovo, $comAnterior){
        if($comNovo = ""){
            $this->setQuery("UPDATE comentario SET nome='$nomeNovo' WHERE pagina='$pagina' and nome=$nomeAnterior and comentario='$comAnterior'");
        }elseif($nomeNovo = ""){
            $this->setQuery("UPDATE comentario SET comentario='$comNovo' WHERE pagina='$pagina' and nome=$nomeAnterior and comentario='$comAnterior'");
        }else{
            $this->setQuery("UPDATE comentario SET nome='$nomeNovo', comentario='$comNovo' WHERE pagina='$pagina' and nome=$nomeAnterior and comentario='$comAnterior'");
        }
        $this->UsarQuery(false);
    }

    //Metodos para adicionar comentarios
    public function Insert($pagina, $nome, $comentario){
        if ($nome == null){
            $nome = "Anonimo";
        }
        if ($pagina=="atualizacao" ||$pagina=="noticia" || $pagina=="tierlist" || $pagina=="zoera"){
            $this->setQuery("INSERT INTO comentario(pagina, nome, comentario) VALUES ('$pagina', '$nome', '$comentario')");
            $this->UsarQuery(false);
        }else{
            echo "<script> alert('Pagina informada está incorreta')</script>";
        }
    }

    //Metodos para pesquisar comentarios feitos
    public function Query($pagina, $data){
        /* 
         * Como no PHP as estrutas POO não são boas para anular as variaves $limit e $data é preciso entregar um valor de string vazia
         *
         * A variavel $pagina será usada para saber os comentarios de qual pagina será pega
         * A variavel $data será usada para pesquisar, comentarios em uma data especifica
         */
        if ($pagina ==  "todas"){
        /* 
         * Irá verificar se a variavel $pagina é valida, se não for ele ira substituir a matrix resultado para mensagem de erro nas duas linhas (por padrao são 2 pedidas na classe Noticias.php)
         * Para a função UsarQuery não tentar buscar uma resposta para query, o primeiro teste logico tira entrega o valor de TRUE para variavel erro que será verificado antes de chamar a UsarQuery
         */
            $where = null;
            $erro = false;
        }elseif($pagina == "atualizacao" || $pagina == "noticia"|| $pagina == "tierlist"|| $pagina == "zoera"){
            $where = "WHERE pagina='".$pagina."'";
            $erro = false;
        }else{
            $erro = true;
            for($con=0; $con<2; $con=$con+1){
                $this->resultado[] = array("Erro" ,"Não foi possivel trazer os comentarios");
            }
        }
        if ($erro != true){
            if ($data == null){
                $this->setQuery("SELECT nome, comentario FROM comentario $where ORDER BY data desc LIMIT 2");
                $this->UsarQuery(true);
            }else{
                $this->setQuery("SELECT nome, comentario FROM comentario $where and data='$data' ORDER BY data desc LIMIT 2");
                $this->UsarQuery(true);
            }
        }
    }

    //Metodos Especiais
    public function __construct(){
        parent::__construct();
    }
    public function UsarQuery($logico){// O $logico vai ser utilizado para informar se a getQuery é uma pesquisar ou não
        if ($logico){
            $sistem = $this->getConexao()->query($this->getQuery());
            while($res = $sistem->fetch(PDO::FETCH_OBJ)){
                $this->resultado[] = array($res->nome, $res->comentario);
            }
        }
        else{
            $sistem = $this->getConexao()->query($this->getQuery());
        }
    }

    public function getResultado(){
        return $this->resultado;
    }
    public function setResultado($resultado){
        $this->resultado = $resultado;
    }
    public function getQuery(){
        return $this->query;
    }
    public function setQuery($query){
        $this->query = $query;
    }
 }