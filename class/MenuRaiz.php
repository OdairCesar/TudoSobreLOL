<?php
require_once 'MenuPagina.php';
class MenuRaiz extends MenuPagina {
    function LinksPagina(){
        $this->setHome(index.php);
        $this->setNoticia();
        $this->setStreams();
        $this->setAtualizacao();
        $this->setTier();
        $this->setContato();
    }
}
