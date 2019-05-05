<?php

session_start();
if (!isset($_SESSION['usuarioLog'])) {
    header('location: index.php');
    session_destroy();
}
if (isset($_GET['sair'])) {
    session_destroy();
    header('location:index.php');
}

include_once 'layout.php';
include_once 'formulario.php';
include_once 'alterar.php';
include_once 'resetSenha.php';

?>

<main>
    <section class="mt-2">
        <div class="container">
            <div class="row pb-3">
                <div class="col-sm-6 text-center col-lg-12">
                    <h2 class="text-center">Tabela de Pontuação</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="container my-2">
        <?php
        if (@$_SESSION["bdinsert"] == "OK") {
            ?>
            <div class="alert alert-success text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong> Cadastrado com sucesso!</strong>
            </div>
            <?php
            unset($_SESSION["bdinsert"]);
        }
        ?>

        <?php
        if (@$_SESSION["exinsert"] == "EX") {
            ?>

            <div class="alert alert-danger text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong> Registro Excluído!</strong>
            </div>

            <?php
            unset($_SESSION["exinsert"]);
        }
        ?>
        <?php
        if (@$_SESSION["upinsert"] == "UP") {
            ?>

            <div class="alert alert-warning text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong> Atualizado com sucesso!</strong>
            </div>

            <?php
            unset($_SESSION["upinsert"]);
        }
        ?>
    </section>
    <section class="mt-2">
        <div class="container">
            <div class="row mt-2 ">
                <div class="col-sm-6 col-lg-12 bg-transparent">
                    <!-- TABELAS -->
                    <table class="table table-hover text-center box-shadow">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col ">Posto</th>
                                <th scope="col">Pontos</th>
                                <th scope="col">Medalhas</th>
                                <th scope="col">
                                    <i class="fas fa-tools fa-lg"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include_once 'database/query.php';

                            // executa a query
                            $dados = DBQuery('ranking', " order by pontos DESC ");
                            // transforma os dados em um array
                            $linha = mysqli_fetch_assoc($dados);
                            // calcula quantos dados retornaram
                            $total = mysqli_num_rows($dados);

                            // se o número de resultados for maior que zero, mostra os dados
                            if ($total > 0) {
                                // inicia o loop que vai mostrar todos os dados
                                do {

                                    ?>

                                    <tr>

                                        <td><strong><?= $linha['nome'] ?></strong></td>
                                        <td><strong><?= $linha['posto'] ?></strong></td>
                                        <td><strong><?= $linha['pontos'] ?></strong></td>
                                        <td>

                                            <?php

                                            if ($linha['medalha'] == "5") {
                                                echo '<img src="arquivosaula/certificado.png" alt="">';
                                            } else if ($linha['medalha'] == "4") {
                                                echo '<img src="arquivosaula/gold_medal.png" alt="">';
                                            } else if ($linha['medalha'] == "3") {
                                                echo '<img src="arquivosaula/silver_medal.png" alt="">';
                                            } else if ($linha['medalha'] == "2") {
                                                echo '<img src="arquivosaula/bronze_medal.png" alt="">';
                                            } else {
                                                echo '<img src="arquivosaula/progresso.png" alt="">';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#update" data-id="<?php echo $linha['idranking']; ?>" data-name="<?php echo $linha['nome']; ?>" data-posto="<?php echo $linha['posto']; ?>" data-pontos="<?php echo $linha['pontos']; ?>" data-medalha="<?php echo $linha['medalha']; ?>">
                                                <i class="fas fa-user-edit fa-2x px-2 text-dark"></i>
                                            </a>
                                
                                            <a href="excluir.php?ID=<?php echo $linha['idranking']; ?>">
                                                <i class="fas fa-user-times fa-2x text-danger px-2 "></i>
                                            </a>
                                        </td>
                                    </tr>

                                <?php
                                // finaliza o loop que vai mostrar os dados
                            } while ($linha = mysqli_fetch_assoc($dados));
                            // fim do if 
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



</main>
<script>
    $('#update').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var posto = button.data('posto')
        var pontos = button.data('pontos')
        var medalha = button.data('medalha')


        var modal = $(this)
        // modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input#id').val(id)
        modal.find('.modal-body input#nome').val(name)
        modal.find('.modal-body input#posto').val(posto)
        modal.find('.modal-body input#pontos').val(pontos)
        modal.find('.modal-body select#medalha').val(medalha)
    })
</script>