<?PHP

class Banco{
    
    private static $conexao;

    private static function conectar(){
        try{
            self::$conexao = new PDO('mysql:host='.SERVIDOR.';dbname='.BANCO, USUARIO, SENHA);
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $error){
            echo 'Erro Conexão: ' . $error->getMessage();
        }
    }

    public static function selecionar(string $query, array $parametros = [], $entidade = null){

        //EXECUTA QUERY NO BANCO DE DADOS
        $stmt    = self::executar($query, $parametros);
        $dadosBd = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //SE RECEBER OBJETO COMO PARAMETRO, CONVERTE ENTRAPA PARA ARRAY DO OBJETO
        if($entidade != null){

            $arrayObj = [];
            
            forEach($dadosBd as $dados){

                $objeto = new $entidade();
                
                $keys = array_keys($dados);
    
                foreach($keys as $key){
                    $objeto->{$key} = $dados[$key];
                }
                $arrayObj[] = $objeto;
            }
            return $arrayObj;
        }
        return $dadosBd;
    }

    public static function executar(string $query, array $parametros = []){
        
        self::conectar();
        $stmt = self::$conexao->prepare($query);
        self::setParametros($stmt, $parametros);
        $stmt->execute();

        return $stmt;
    }

    private static function setParametros($statement, $parametros = array()){
        foreach ($parametros as $chave => $parametro){
            self::setParametro($statement, $chave, $parametro);
        }
    }

    private static function setParametro($statement, $chave, $parametro){
        $statement->bindparam($chave, $parametro);
    }
}