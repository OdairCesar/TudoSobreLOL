<?php

require_once 'Pagina.php'

class PaginaZoera extends Pagina{
	private objAside, objSection, objDetalhes, objFooter;

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
	public function getObjAside(){
		return $this->objAside;
	}
	public function getObjSection(){
		return $this->objSection;
	}
	public function getObjDetalhes(){
		return $this->objDetalhes;
	}
	public function getObjFooter(){
		return $this->objFooter;
	}
	public function setObjAside($objAside){
		$this->objAside = $objAside;
	}
	public function setObjSection($objSection){
		$this->objSection = $objSection;
	}
	public function setObjDetalhes($objDetalhes){
		$this->objDetalhes = $objDetalhes;
	}
	public function setObjFooter($objFooter){
		$this->objFooter = $objFooter;
	}
}