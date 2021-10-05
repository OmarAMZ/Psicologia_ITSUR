<?php

class ConexionBD{
    
    public function cBD(){

        $bd = new PDO("mysql:host=localhost;dbname=psicoitsur", "root", "");

        $bd -> exec("set names utf8");

        return $bd;
    }
}