<script src="app/assets/viacep.js"></script>
<h2>Cadastro de doador</h2><br>
<form action="?metodo=insert" method="post">
    <input type="hidden" value="<?php echo $doador->id; ?>" name="id">
  <div class="form-group row">
    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
    <div class="col-sm-10">
      <input value="<?php echo $doador->nome; ?>" type="text" class="form-control" name="nome">
    </div>
  </div>
  <div class="form-group row">
    <label for="Email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input value="<?php echo $doador->email; ?>" type="email" class="form-control" name="email">
    </div>
  </div>
  <div class="form-group row">
    <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
    <div class="col-sm-10">
      <input value="<?php echo $doador->cpf; ?>" type="text" class="form-control" name="cpf">
    </div>
  </div>
  <div class="form-group row">
    <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
    <div class="col-sm-10">
      <input value="<?php echo $doador->telefone; ?>" type="text" class="form-control" name="telefone">
    </div>
  </div>
  <div class="form-group row">
    <label for="data_nascimento" class="col-sm-2 col-form-label">Data de Nascimento</label>
    <div class="col-sm-10">
      <input value="<?php echo $doador->data; ?>" type="date" class="form-control" name="data_nascimento">
    </div>
  </div>
  <div class="form-group row">
    <label for="Email" class="col-sm-2 col-form-label">Intervalo de doações</label>
    <div class="col-sm-10">
        <select name="intervalo_doacao">
            <?php foreach($intervalos as $intervalo){ ?>
            <option <?php if($doador->intervalo_doacao->id == $intervalo->id){ echo "selected"; } ?> value="<?php echo $intervalo->id; ?>"><?php echo $intervalo->nome; ?></option>            
            <?php } ?>
        </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="valor_doacao" class="col-sm-2 col-form-label">Valor da doação</label>
    <div class="col-sm-10">
      <input value="<?php echo $doador->valor; ?>" type="number" min="1" step="any" name="valor_doacao" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="forma_pagamento" class="col-sm-2 col-form-label">Forma de pagamento</label>
    <div class="col-sm-10">
        <select name="forma_pagamento">
            <?php foreach($formas as $forma){ ?>
            <option <?php if($doador->forma_pagamento->id == $forma->id){ echo "selected"; } ?> value="<?php echo $forma->id; ?>"><?php echo $forma->nome; ?></option>            
            <?php } ?>
        </select>
    </div>
  </div>
  <div class="form-group row">
    <input type="hidden" value="<?php echo $doador->endereco->id; ?>" name="id_endereco">
    <label for="cep" class="col-sm-2 col-form-label">CEP</label>
    <div class="col-sm-10">
      <input value="<?php echo $doador->endereco->cep; ?>" name="cep" type="text" id="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="rua" class="col-sm-2 col-form-label">Rua</label>
    <div class="col-sm-10">
      <input value="<?php echo $doador->endereco->rua; ?>" name="rua" type="text" id="rua" size="60" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="bairro" class="col-sm-2 col-form-label">Bairro</label>
    <div class="col-sm-10">
      <input value="<?php echo $doador->endereco->bairro; ?>" name="bairro" type="text" id="bairro" size="40" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="cidade" class="col-sm-2 col-form-label">Cidade</label>
    <div class="col-sm-10">
      <input value="<?php echo $doador->endereco->cidade; ?>" name="cidade" type="text" id="cidade" size="40" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="uf" class="col-sm-2 col-form-label">Estado</label>
    <div class="col-sm-10">
      <input value="<?php echo $doador->endereco->estado; ?>" name="uf" type="text" id="uf" size="2" class="form-control">
    </div>
  </div>
    <input type="submit" class="btn btn-primary btn-hover" value="Atualizar">
</form>
<nav class="navegacao"><a href="?metodo=vizualizar&id=<?php echo $doador->id; ?>">Cancelar</a></nav>