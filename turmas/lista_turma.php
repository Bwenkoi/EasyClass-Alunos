<?php include '../header.php'; ?>

<main>
    <div class="tituloPaginaEntidade col-md-5 col-sm-6">
        <h1 class="h3">Lista de Turmas:</h1>
    </div>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Professor</th>
                <th>Ano.Período</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($turmas_aluno as $turma_aluno) : ?>
                <tr>
                    <?php 
                        $turma = get_turma_by_id($turma_aluno['id_turma']);
                        $disciplina = get_disciplina_by_id($turma[0]['id_disciplina']);
                        $professor = get_professor_by_id($turma[0]['id_professor']);
                    ?>
                    <td><?php echo $turma[0]['id_disciplina']; ?></td>
                    <td><?php echo $disciplina[0]['nome']; ?></td>
                    <td><?php echo $professor['nome']; ?></td>
                    <td><?php echo $turma[0]['ano_periodo']; ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action"
                                   value="visualizar_avaliacoes">
                            <input type="hidden" name="id_turma"
                                   value="<?php echo $turma[0]['id']; ?>">
                            <input type="submit" class="btn btn-sm" 
                            style="background-color: #218380; color: white" value="Visualizar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php include '../footer.php'; ?>