<?php
require_once("./inc/header.php");
require_once('./../back/cursoModelo.php');
require_once('./../back/cursoDAO.php');

$idIsset = isset($_GET['id']);

if ($idIsset) {
    $id = $_GET['id'];
    $cursoDAO = new CursoDAO();
    $curso = $cursoDAO->busca(intval($id));
}
?>



<form class="form-group" method="POST" action="./../back/altera.php">
    <?php
    if ($idIsset) {
        echo '<input class="form-control" value="' . $curso->getID() . '" type="text" placeholder="Digite nome do Curso" name="id" style="display: none;">';
    }
    ?>
    <input class="form-control" value="<?php if ($idIsset){echo $curso->getNome();} else { echo '';} ?>" type="text" placeholder="Digite nome do Curso" name="nome" required>
    <input class="form-control" value="<?php if ($idIsset){echo $curso->getArea();} else { echo '';} ?>" type="text" placeholder="Digite o nome da area do curso" name="area" required>
    <input class="form-control" value="<?php if ($idIsset){echo $curso->getDataFundacao();} else { echo '';} ?>" type="date" placeholder="Digite a data de fundação" name="dataFundacao" required>
    <input class="form-control" value="<?php if ($idIsset){echo $curso->getCargaHoraria();} else { echo '';} ?>" type="number" placeholder="Digite a carga horaria" name="cargaHoraria" required>
    <input type="submit" class="btn btn-success" value="Ok">
</form>


<?php require_once("./inc/footer.php"); ?>