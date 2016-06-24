<?php
    require 'autoLoad.php';
    use Alfa\BaseBD;
    use Alfa\GerenciadorBD;
    use Alfa\Aluno;
    $sgbd = new GerenciadorBD();
    $sgbd->setEndereco('localhost');
    $sgbd->setPorta(3306);
    $sgbd->setUsuario('root');
    $sgbd->setSenha('');
    $bd = new BaseBD('mysql', $sgbd);
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