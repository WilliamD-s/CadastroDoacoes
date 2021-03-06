<h2>pagina para cadastrar um novo doador</h2><br>
<form  class="formulario" action="#">
    <div class="inputs-formulario">        
        <h3>Doador</h3><br>
        <span>Nome </span><br>
        <input type="text" name="nome"><br>
        <span>Email:</span><br>
        <input type="email" name="email"><br>
        <span>CPF:</span><br>
        <input type="text" name="cpf"><br>
        <span>Telefone</span><br>
        <input type="text" name="telefone"><br>
        <span>Data de Nascimento</span><br>
        <input type="date" name="data_nascimento"><br>
        <span>Intervalo de doações</span><br><br>
        <select name="intervalo_doacoes" id="">
            <?php foreach($intervalos as $intervalo){ ?>
            <option value="<?php echo $intervalo->id; ?>"><?php echo $intervalo->nome; ?></option>            
            <?php } ?>
        </select><br><br>
        <span>Valor da doação</span><br>
        <input type="number"><br><br>
        <span>Forma de pagamento</span><br>
        <select name="" id="">
            <?php foreach($formas as $forma){ ?>
            <option value="<?php echo $forma->id; ?>"><?php echo $forma->nome; ?></option>            
            <?php } ?>
        </select>
        <br>
    </div>
</form>