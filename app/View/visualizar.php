<form  class="formu-group" action="#">
    <div class="inputs-formulario"> 
        <h3>Doador</h3><br>
        <span>Nome </span>
        <input class="form-control" value="<?php echo $doador->nome; ?>" disabled><br>
        <span>Email:</span>
        <input value="<?php echo $doador->email; ?>" disabled><br>
        <span>CPF:</span>
        <input value="<?php echo $doador->cpf; ?>" disabled><br>
        <span>Telefone</span>
        <input value="<?php echo $doador->telefone; ?>" disabled><br>
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
    <a href="?metodo=editar&id=<?php echo $doador->id; ?>"><span class="btn btn-dark btn-hover">Editar</span></a>&nbsp;&nbsp;<a href="?metodo=excluir&id=<?php echo $doador->id; ?>"><span class="btn btn-danger btn-hover">Excluir</span></a>
</form>