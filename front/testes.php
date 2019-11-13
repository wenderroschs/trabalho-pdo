<?php
require_once('./../back/cursoModelo.php');
require_once('./../back/cursoDAO.php');
require_once("./inc/header.php");
$geo = new CursoModelo ('geo', 'terra', 240, '05-02-1632');
$info = new CursoModelo ('info', 'computador', 1000, '08-02-1632');
$cursodao = new CursoDao();

print_r($cursodao);
echo '<br>';
echo '<br>';
print_r($cursodao -> inserir($geo));
echo '<br>';
echo '<br>';
print_r($cursodao->excluir($geo -> getID()));
echo '<br>';
echo '<br>';
print_r($cursodao->busca($geo -> getID()));
echo '<br>';
echo '<br>';
print_r($cursodao->lista(10, 0));
echo '<br>';
echo '<br>';
print_r($cursodao->altera($geo));
echo '<br>';
echo '<br>';
print_r($cursodao->salva($geo, 'altera'));
echo '<br>';
print_r($cursodao->salva($geo, 'cria'));

print_r($cursodao -> inserir($info));
echo '<br>';
echo '<br>';
print_r($cursodao->excluir($info -> getID()));
echo '<br>';
echo '<br>';
print_r($cursodao->busca($info -> getID()));
echo '<br>';
echo '<br>';
print_r($cursodao->lista(10, 0));
echo '<br>';
echo '<br>';
print_r($cursodao->altera($info));
echo '<br>';
echo '<br>';
print_r($cursodao->salva($info, 'altera'));
echo '<br>';
print_r($cursodao->salva($info, 'cria'));

?>
<br> <a href="listar.php" class="btn btn-secondary">Voltar</a>