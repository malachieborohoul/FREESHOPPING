<?php

class Template
{
    private $_namPage;
    private $_navBarContent = array();
    public function __construct($name){
        $this->_namPage = $name;
        $this->_navBarContent[] = array('lien'=>'../index','headerLabel'=>'Accueil');
        $this->_navBarContent[] = array('lien'=>'','headerLabel'=>'Article');
        $this->_navBarContent[] = array('lien'=>'','headerLabel'=>'A Propos');
        $this->_navBarContent[] = array('lien'=>'','headerLabel'=>'Nous Contacter');
        $this->_navBarContent[] = array('lien'=>'','headerLabel'=>'Connexion');



}
public function addNavContent($item=array()){
    $this->_navBarContent[] = $item;
}
public function render($active=""){
        require ('header.php');
        headered($this->_navBarContent,$active);
        include($this->_namPage);
        include('footer.php');
}

}