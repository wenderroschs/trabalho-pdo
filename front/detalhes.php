<?php
require_once("./inc/header.php");
require_once('./../back/cursoModelo.php');
require_once('./../back/cursoDAO.php');

$id = isset($_GET['id']);

if ($id) {
    $id = $_GET['id'];
    $cursoDAO = new CursoDAO();
    $curso = $cursoDAO->busca(intval($id));
}
?>
<nav class="bg-primary">
    <h1 class="text-white mb-4">Detalhes</h1>
</nav>

<h1>Nome: <?php echo $curso->getNome() ?></h1>
<h1>Area: <?php echo $curso->getArea() ?></h4>
<h1>Carga Horaria: <?php echo $curso->getCargaHoraria() ?></h4>
<h1>Data de fundação: <?php echo $curso->getDataFundacao() ?></h4>

<?php require_once("./inc/footer.php"); ?>