<form  class="formulario" action="#">
    <div class="inputs-formulario"> 
        <h3>Doador</h3><br>
        <span>Nome </span>
        <input value="<?php echo $doador->nome; ?>"><br>
        <span>Email:</span>
        <input value="<?php echo $doador->email; ?>"><br>
        <span>CPF:</span>
        <input value="<?php echo $doador->cpf; ?>"><br>
        <span>Telefone</span>
        <input value="<?php echo $doador->telefone; ?>"><br>
        <span>Data de Nascimento</span><br>
        <span><?php echo $doador->nascimento; ?></span><br>
        <span>Intervalo de doações:</span><br>
        <span><?php echo $doador->intervalo; ?></span><br>
        <span>Valor da doação</span><br>
        <input value="<?php echo $doador->valor; ?>" disabled><br><br>
        <span>Forma de pagamento</span><br>
        <span><?php echo $doador->pagamento; ?></span>
    </div>
        <br>
    <div>
        <h3>Endereco</h3><br>
        <label>Cep:
        <input value="<?php echo $doador->cep; ?>" disabled/></label><br />
        <label>Rua:
        <input value="<?php echo $doador->rua; ?>" disabled/></label><br />
        <label>Bairro:
        <input value="<?php echo $doador->bairro; ?>" disabled/></label><br />
        <label>Cidade:
        <input value="<?php echo $doador->cidade; ?>" disabled/></label><br />
        <label>Estado:
        <input value="<?php echo $doador->estado; ?>" disabled/></label><br />
    </div><br>
    <a href=""><span>Editar</span></a>&nbsp;&nbsp;<a href=""><span>Excluir</span></a>
</form>