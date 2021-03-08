<script src="app/assets/viacep.js"></script>
<form  class="formulario" action="?metodo=update" method="post">
    <div class="inputs-formulario">        
        <h3>Doador</h3><br>
        <input type="hidden" value="<?php echo $doador->id; ?>" name="id">
        <span>Nome </span>
        <input value="<?php echo $doador->nome; ?>"type="text" name="nome"><br>
        <span>Email:</span>
        <input value="<?php echo $doador->email; ?>"type="email" name="email"><br>
        <span>CPF:</span>
        <input value="<?php echo $doador->cpf; ?>" type="text" name="cpf"><br>
        <span>Telefone</span>
        <input value="<?php echo $doador->telefone; ?>" type="text" name="telefone"><br>
        <span>Data de Nascimento</span>
        <input value="<?php echo $doador->data; ?>" type="date" name="data_nascimento"><br>
        <span>Intervalo de doações</span><br>
        <select name="intervalo_doacao">
            <?php foreach($intervalos as $intervalo){ ?>
            <option <?php if($doador->intervalo_doacao->id == $intervalo->id){ echo "selected"; } ?> value="<?php echo $intervalo->id; ?>"><?php echo $intervalo->nome; ?></option>            
            <?php } ?>
        </select><br><br>
        <span>Valor da doação</span><br>
        <input value="<?php echo $doador->valor; ?>"  type="number" min="1" step="any" name="valor_doacao"><br><br>
        <span>Forma de pagamento</span><br>
        <select name="forma_pagamento">
            <?php foreach($formas as $forma){ ?>
            <option <?php if($doador->forma_pagamento->id == $forma->id){ echo "selected"; } ?> value="<?php echo $forma->id; ?>"><?php echo $forma->nome; ?></option>            
            <?php } ?>
        </select>
    </div>
        <br>
    <div>
        <h3>Endereco</h3><br>
        <input type="hidden" value="<?php echo $doador->endereco->id; ?>" name="id_endereco">
        <label>Cep:
        <input value="<?php echo $doador->endereco->cep; ?>" name="cep" type="text" id="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);"/></label><br />
        <label>Rua:
        <input value="<?php echo $doador->endereco->rua; ?>" name="rua" type="text" id="rua" size="60"/></label><br />
        <label>Bairro:
        <input value="<?php echo $doador->endereco->bairro; ?>" name="bairro" type="text" id="bairro" size="40"/></label><br />
        <label>Cidade:
        <input value="<?php echo $doador->endereco->cidade; ?>" name="cidade" type="text" id="cidade" size="40"/></label><br />
        <label>Estado:
        <input value="<?php echo $doador->endereco->estado; ?>" name="uf" type="text" id="uf" size="2"/></label><br />
    </div><br>
    <input type="submit" value="Atualizar">
</form>