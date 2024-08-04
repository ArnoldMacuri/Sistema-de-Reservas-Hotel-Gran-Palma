<?php
class Views{
    public function getView($vista, $data="") {
        require 'views/' . $vista . '.php';        
    }
}
?>