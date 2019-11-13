<?php
require_once('./../back/cursoModelo.php');
require_once('./../back/cursoDAO.php');
$geo = new CursoModelo ('geo', 'terra', 240, '05-02-1632');
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
