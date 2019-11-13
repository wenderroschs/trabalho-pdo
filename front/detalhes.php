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
<nav class="bg-secondary">
    <h2 class="text-white mb-4">Detalhes do curso:</h2>
</nav>

<h4>Nome: <?php echo $curso->getNome() ?></h4>
<h4>Área: <?php echo $curso->getArea() ?></h4>
<h4>Carga horária: <?php echo $curso->getCargaHoraria() ?></h4>
<h4>Data de fundação: <?php echo $curso->getDataFundacao() ?></h4>


<a href="listar.php" class="btn btn-secondary">Voltar</a>
<?php require_once("./inc/footer.php"); ?>