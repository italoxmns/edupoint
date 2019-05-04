<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Painel de alteração</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="update.php" method="POST" enctype="multipart/form-data">
            <input type="number" class="form-control d-none" id="id" name="id"  >
            <div class="form-group">
                <label for="nome">Nome do aluno</label>
                <input type="text" class="form-control" id="nome" name="nome"  >
            </div>
            <div class="form-group">
                <label for="Posto">Posto</label>
                <input type="number" class="form-control" id="posto" name="posto"  >
            </div>
            <div class="form-group">
                <label for="pontos">Pontos</label>
                <input type="number" class="form-control" id="pontos" name="pontos"  required>
            </div>
            <div class="form-group">
                <label for="medalha">Medalha</label>
                <div class="input-group mb-3">
                <select class="custom-select" id="medalha" name="medalha">
                    <option selected>Escolha uma medalha...</option>
                    <option value="1">Em progresso</option>
                    <option value="2">Bronze</option>
                    <option value="3">Prata</option>
                    <option value="4">Ouro</option>
                    <option value="5">Excelencia</option>
                </select>
                </div>
            </div>
            <button type="submit" class="btn btn-dark btn-md btn-block" name="alterar">Alterar</button>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>