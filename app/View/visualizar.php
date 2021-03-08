<h2>Doador</h2><br>
<form action="#">
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" value="<?php echo $doador->nome; ?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $doador->email; ?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">CPF</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $doador->cpf; ?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Telefone</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $doador->telefone; ?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Data de Nascimento</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $doador->nascimento; ?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Intervalo de doações</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $doador->intervalo; ?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Valor da doação</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="R$: <?php echo $doador->valor; ?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Forma de pagamento</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $doador->pagamento; ?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">CEP</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $doador->cep; ?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Rua</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $doador->rua; ?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Bairro</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $doador->bairro; ?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Cidade</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $doador->cidade; ?>" disabled>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Estado</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $doador->estado; ?>" disabled>
    </div>
  </div>
    <a href="?metodo=editar&id=<?php echo $doador->id; ?>"><span class="btn btn-dark btn-hover">Editar</span></a>&nbsp;&nbsp;<a href="?metodo=excluir&id=<?php echo $doador->id; ?>"><span class="btn btn-danger btn-hover">Excluir</span></a>
</form>