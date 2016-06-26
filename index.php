<?php
    require 'autoload.php';

    use Alfa\BaseDeDados;
    use Alfa\GerenciadorBD;
    use Alfa\Aluno;
    
    $sgbd = new GerenciadorBD();
    $sgbd->setEndereco('localhost');
    $sgbd->setPorta(3306);
    $sgbd->setUsuario('root');
    $sgbd->setSenha('123456');
    $bd = new BaseDeDados('mysql', $sgbd);
    try {
        $bd->conectar();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    var_dump($sgbd);
    var_dump($bd);
    $aluno = new Aluno($bd);
    $colunas = ["nome"];
    $valores = ["Alex M Pereira"];
    $aluno->create($colunas, $valores);
    $bd->desconectar();
?>