<?php
/**
 * Description of Noticias
 *
 * @author Odair
 */
abstract class Conexao{
    //Atributos
    private $Local, $usuario, $senha, $db;
    protected $conexao;

    //Metodos
    private function Acessar(){
        try{
            $this->conexao = new PDO('mysql:host='.$this->getLocal().';dbname='. $this->getDb(), $this->getUsuario(), $this->getSenha());
            $this->conexao->exec("set names utf8");
            /*$this->conexao->exec('SET character_set_connection=utf8');
            $this->conexao->exec('SET character_set_client=utf8');
            $this->conexao->exec('SET character_set_results=utf8');*/
        } catch(PDOException $e){
            echo "Erro ao conectar".$e->getMessage();
        }
    }

    //Metodos Especiais
    public function __construct(){
        $this->setLocal("localhost");
        $this->setUsuario("root");
        $this->setSenha("");
        $this->setDb("tudosob1_lol");
        $this->Acessar();
    }
    protected function getConexao(){
        return $this->conexao;
    }
    protected function setConexao($conexao){
        $this->conexao = $conexao;
    }
    private function getLocal() {
        return $this->Local;
    }
    private function getUsuario() {
        return $this->usuario;
    }
    private function getSenha() {
        return $this->senha;
    }
    private function getDb() {
        return $this->db;
    }
    private function setLocal($Local) {
        $this->Local = $Local;
    }
    private function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
    private function setSenha($senha) {
        $this->senha = $senha;
    }
    private function setDb($db) {
        $this->db = $db;
    }
}
