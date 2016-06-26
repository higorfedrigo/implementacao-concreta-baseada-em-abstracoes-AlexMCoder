<?php
    namespace Alfa;
    class Aluno implements Abstracao\Entidade
    {
        private $nome;
        private static $bd;
        public function __construct(BaseDeDados $bd)
        {
            self::$bd = $bd;
        }
        public function getNome()
        {
            return $this->nome;
        }
        public function setNome($nome)
        {
            $this->nome = $nome;
        }
        public function create($colunas, $valores)
        {
            $entidade = substr(__CLASS__, strrpos(__CLASS__, '\\')+1);
            $sql = "INSERT INTO $entidade (".implode(',', $colunas).") VALUES ('".implode("','", $valores)."')";
            $this->execQuery($sql);
        }
        public function retrieve($colunas, $clausula)
        {
            $entidade = substr(__CLASS__, strrpos(__CLASS__, '\\')+1);
            $sql = "SELECT ".implode(',', $colunas)." FROM $entidade WHERE ".implode(',', $clausula);
            $this->execQuery($sql);
        }
        public function update($colunas, $valores, $clausula)
        {
            $entidade = substr(__CLASS__, strrpos(__CLASS__, '\\')+1);
            $sql = "UPDATE $entidade SET ".implode(',', $valores)." WHERE ".implode(',', $clausula);
            $this->execQuery($sql);
        }
        public function delete($clausula)
        {
            $entidade = substr(__CLASS__, strrpos(__CLASS__, '\\')+1);
            $sql = "DELETE FROM $entidade WHERE ".implode(',', $clausula);
            $this->execQuery($sql);
        }
        private function execQuery($query)
        {
            if($result = mysqli_query(self::$bd->conexao, $query)) {
                echo 'Query '.$query.' executada com sucesso<br>';
                var_dump($result);
            } else {
                throw new \Exception(mysqli_error(self::$bd->conexao));
            }
        }
    }