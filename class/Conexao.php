<?php
/**
 * Description of Noticias
 *
 * @author Odair
 */
abstract class Conexao{
    //Atributos
    private $Local, $usuario, $senha, $db;
    private $conexao;

    //Metodos
    private function Acessar(){
        try{
            $this->conexao = new PDO('mysql:host='.$this->getLocal().';dbname='. $this->getDb(), $this->getUsuario(), $this->getSenha());
            $this->conexao->exec("set names utf8");
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
    protected function getLocal() {
        return $this->Local;
    }
    protected function getUsuario() {
        return $this->usuario;
    }
    protected function getSenha() {
        return $this->senha;
    }
    protected function getDb() {
        return $this->db;
    }
    protected function setLocal($Local) {
        $this->Local = $Local;
    }
    protected function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
    protected function setSenha($senha) {
        $this->senha = $senha;
    }
    protected function setDb($db) {
        $this->db = $db;
    }
}
