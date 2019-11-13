<?php

require_once("./cursoDAO.php");

$id = isset($_GET['id']);

if ($id) {
    $id = $_GET['id'];
    $cursoDAO = new CursoDao();
    $cursoDAO->excluir($id);
}

header('Location: ./../front/listar.php');

?>