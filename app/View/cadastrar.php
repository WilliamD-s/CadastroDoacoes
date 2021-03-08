<script src="app/assets/viacep.js"></script>
<h2>pagina para cadastrar um novo doador</h2><br>
<form  class="formulario" action="?metodo=insert" method="post">
    <div class="inputs-formulario">        
        <h3>Doador</h3><br>
        <span>Nome </span>
        <input type="text" name="nome"><br>
        <span>Email:</span>
        <input type="email" name="email"><br>
        <span>CPF:</span>
        <input type="text" name="cpf"><br>
        <span>Telefone</span>
        <input type="text" name="telefone"><br>
        <span>Data de Nascimento</span>
        <input type="date" name="data_nascimento"><br>
        <span>Intervalo de doações</span><br>
        <select name="intervalo_doacao">
            <?php foreach($intervalos as $intervalo){ ?>
            <option value="<?php echo $intervalo->id; ?>"><?php echo $intervalo->nome; ?></option>            
            <?php } ?>
        </select><br><br>
        <span>Valor da doação</span><br>
        <input type="number" min="1" step="any" name="valor_doacao"><br><br>
        <span>Forma de pagamento</span><br>
        <select name="forma_pagamento">
            <?php foreach($formas as $forma){ ?>
            <option value="<?php echo $forma->id; ?>"><?php echo $forma->nome; ?></option>            
            <?php } ?>
        </select>
    </div>
        <br>
    <div>
        <h3>Endereco</h3><br>
        <label>Cep:
        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);"/></label><br />
        <label>Rua:
        <input name="rua" type="text" id="rua" size="60"/></label><br />
        <label>Bairro:
        <input name="bairro" type="text" id="bairro" size="40"/></label><br />
        <label>Cidade:
        <input name="cidade" type="text" id="cidade" size="40"/></label><br />
        <label>Estado:
        <input name="uf" type="text" id="uf" size="2"/></label><br />
    </div><br>
    <input type="submit" value="Cadastrar">
</form>