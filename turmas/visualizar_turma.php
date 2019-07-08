<?php include '../header.php'; ?>
<main>
    <!-- HISTORICO -->
    <div class="tituloPaginaEntidade col-md-5 col-sm-6">
        <h1 class="h3">Avaliações realizadas nesta turma</h1>
    </div>
    <?php
    $avaliacoes_realizadas = array();
    $media = 0;
    $qtd = 0;
    ?>
    <?php if (!empty($avaliacoes_aluno)) : ?>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Disciplina</th>
                    <th>Título</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($avaliacoes_aluno as $av) : ?>
                    <?php
                    $avaliacao = get_avaliacao_by_id(get_avaliacao_by_turma_avaliacao(get_turma_avaliacao_by_aluno_avaliacao($av['id'])));
                    array_push($avaliacoes_realizadas, $avaliacao['id']);
                    $media += $av['nota'];
                    $qtd++;
                    ?>
                    <tr>
                        <td><?php echo $avaliacao['disciplina']; ?></td>
                        <td><?php echo $avaliacao['titulo']; ?></td>
                        <td><?php echo $av['nota']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <?php $nota_final = $media / $qtd; ?>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td style="font-weight: bold;">
                        <?php echo 'Nota Final: ' . $nota_final; ?>
                        <?php echo $nota_final >= 6 ? ' - APROVADO' : ' - REPROVADO' ?>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php else : ?>
        <p class="ml1">Nenhuma avaliação realizada</p>
    <?php endif; ?>

    <!-- AVALIAÇÕES DA TURMA -->
    <div class="tituloPaginaEntidade col-md-5 col-sm-6">
        <h1 class="h3">Avaliações Pendentes</h1>
    </div>
    <?php if (!empty($avaliacoes_pendentes)) : ?>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Disciplina</th>
                    <th>Título</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($avaliacoes_pendentes as $av) : ?>
                    <?php $avaliacao = get_avaliacao_by_id($av['id_avaliacao']); ?>
                    <?php if ((!in_array($avaliacao['id'], $avaliacoes_realizadas)) && contar_questoes_avaliacao($avaliacao['id'])) : ?>
                        <tr>
                            <td><?php echo $avaliacao['disciplina']; ?></td>
                            <td><?php echo $avaliacao['titulo']; ?></td>
                            <td>
                                <form action="." method="post">
                                    <input type="hidden" name="action" value="realizar_avaliacao">
                                    <input type="hidden" name="id_aluno_turma" value="<?php echo $id_aluno_turma; ?>">
                                    <input type="hidden" name="id_turma_avaliacao" value="<?php echo $av['id']; ?>">
                                    <input type="hidden" name="id_avaliacao" value="<?php echo $avaliacao['id']; ?>">
                                    <input type="submit" class="btn btn-sm" style="background-color: #218380; color: white" value="Realizar Avaliação">
                                </form>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Nenhuma avaliação cadastrada para essa turma</p>
    <?php endif; ?>

</main>
<?php include '../footer.php'; ?>