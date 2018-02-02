<?php

require_once 'Pagina.php'

class PaginaNotcias extends Pagina{
	private objConteudo, objMenu, objDetalhes, objFooter;

	public function PassarValores(){

	}
	public function MontarDetalhes(){

	}
	public function MontarSection(){

	}
	public function MontarAside(){

	}
	public function MontarFooter(){

	}

	public function __construct(){
		
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