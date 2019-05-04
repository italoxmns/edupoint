<!-- Modal -->
<div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Painel de Cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="cadastrar.php" method="post">
            <div class="form-group">
                <label for="nome">Nome do aluno</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Fulano da Silva" required >
            </div>
            <div class="form-group">
                <label for="Posto">Posto</label>
                <input type="number" class="form-control" id="posto" name="posto"  required >
            </div>
            <div class="form-group">
                <label for="pontos">Pontos</label>
                <input type="number" class="form-control" id="pontos" name="pontos"  required>
            </div>
            <div class="form-group">
                <label for="medalha">Medalha</label>
                <div class="input-group mb-3">
                <select class="custom-select" id="medalha" name="medalha" required>
                    <option selected>Escolha uma medalha...</option>
                    <option value="1">Em progresso</option>
                    <option value="2">Bronze</option>
                    <option value="3">Prata</option>
                    <option value="4">Ouro</option>
                    <option value="5">Excelencia</option>
                </select>
                </div>
            </div>
            <button type="submit" class="btn btn-dark btn-md btn-block" name="cadastrar">Cadastrar</button>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>