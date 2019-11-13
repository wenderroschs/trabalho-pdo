<?php
require_once('./cursoDAO.php');
require_once('./cursoModelo.php');

$idIsset = isset($_POST['id']);

$curso = new CursoModelo($_POST['nome'], $_POST['area'], $_POST['cargaHoraria'], $_POST['dataFundacao']);
$cursoDAO = new CursoDAO();
if ($idIsset) {
    $curso -> setID(intval($_POST['id']));
    $cursoDAO -> salva ($curso, 'altera');
} else {
    $cursoDAO -> salva($curso, 'cria');
}
header ("Location: ./../front/listar.php");
?>