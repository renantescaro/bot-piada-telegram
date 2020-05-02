<?php

class PiadaDao{

    public static function selecionarTodosIds(){
        $sql = 'SELECT id FROM piada';
        return Banco::selecionar($sql);
    }

    public static function selecionarPorId(int $id){
        $sql = 'SELECT * FROM piada WHERE id = :ID';
        return Banco::selecionar($sql, [':ID'=>$id]);
    }
}