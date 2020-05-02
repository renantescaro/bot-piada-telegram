<?php

class PiadaCtrl{
    
    public static function contarPiada(){

        $ids = PiadaDao::selecionarTodosIds();

        $qtdIds  = count($ids);
        $posicao = rand(0,$qtdIds-1);
        $id      = intval($ids[$posicao]['id']);

        $retorno = PiadaDao::selecionarPorId($id);
        
        $retornoFormatado          = [];
        $retornoFormatado['id']    = $retorno[0]['id'];
        $retornoFormatado['piada'] = utf8_encode($retorno[0]['piada']);

        echo(json_encode($retornoFormatado, true));
    }
}