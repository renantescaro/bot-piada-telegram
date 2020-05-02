<?php

class Configuracoes{
    
    public function __construct(){
        
        define('DIRETORIO',dirname(dirname(__FILE__)));
        define('USUARIO' ,'usr_piada');
        define('SENHA'   ,'');
        define('BANCO'   ,'piada');
        define('SERVIDOR','localhost');
    }
}

$config = new Configuracoes();