<?php include '../header.php'; ?>
<main>
    <div class="tituloPaginaEntidade col-md-4 offset-md-4 col-sm-6">
        <h1 class="h3 text-center"><?php echo $avaliacao['titulo'] . ' - ' . $avaliacao['disciplina'] ?></h1>
    </div>
    <form class="container" action="index.php" method="post">
        <input type="hidden" name="action" value="confirmar_realizacao_prova">
        <input type="hidden" name="id_aluno_turma" value="<?php echo $id_aluno_turma; ?>">
        <input type="hidden" name="id_turma_avaliacao" value="<?php echo $id_turma_avaliacao; ?>">
        <input type="hidden" name="id_avaliacao" value="<?php echo $id_avaliacao; ?>">

        <?php foreach ($questoes as $indice => $q) : ?>
            <div class="card form-group row">
                <div class="card-header">
                    <span style="font-weight: bold;"><?php echo $indice + 1 . ' - ' ?></span>
                    <?php echo buscar_enunciado_questao($q['id_questao']); ?>
                </div>
                <ul class="list-group list-group-flush">
                    <?php $alternativas = buscar_alternativas_questao($q['id_questao']); ?>
                    <?php foreach ($alternativas as $i => $alternativa) : ?>
                        <li class="list-group-item">
                            <input type="radio" id="alternativa<?php echo $indice . '-' . $i ?>" 
                            name="questao<?php echo $indice; ?>" value="<?php echo $alternativa['id']; ?>">
                            <label for="alternativa<?php echo $indice . '-' . $i ?>">
                                <?php echo $alternativa['texto'] ?>
                            </label>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>

        <button type="submit" class="btn btn-dark mb-5 mt-4 col-md-4 offset-md-4 col-sm-6">Confirmar</button>

        <br>
    </form>
</main>
<?php include '../footer.php'; ?>