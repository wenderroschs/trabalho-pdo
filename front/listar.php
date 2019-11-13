<?php
require_once("./inc/header.php");
require_once("./../back/cursoModelo.php");
require_once('./../back/cursoDAO.php');

$cursoDAO = new CursoDAO();
$listCurso = $cursoDAO->lista(10, 0);
?>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Alterar</th>
            <th scope="col">Excluir</th>
            <th scope="col">Detalhar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($listCurso as $curso) {
            echo '<tr>';
            echo '<td>' . $curso->getID() . '</td>';
            echo '<td>' . $curso->getNome() . '</td>';
            echo '<td><a href="./detalhes.php?id=' . $curso->getID() . '" class="btn btn-outline-info font-weight-bold">Detalhar</a></td>';
            echo '<td><a href="./../back/deleta.php?id=' . $curso->getID() . '" class="btn btn-outline-danger font-weight-bold">Deleta</a></td>';
            echo '<td><a href="./alterarInserir.php?id=' . $curso->getID() . '" class="btn btn-outline-warning font-weight-bold">Altera</a></td>';
            echo '</tr>';
        }
        ?>
    <tbody>
</table>
<div class="fixed-bottom d-flex justify-content-end">
    <a class="btn btn-secondary mb-4 mr-5 font-weight-bold" href="./testes.php">Testes de uso</a>
    <a class="btn btn-secondary mb-4 mr-5 font-weight-bold" href="./alterarInserir.php">Adicionar curso</a>
</div>

<?php require_once("./inc/footer.php"); ?>