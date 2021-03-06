<h2>Lista de doadores</h2><br>
<div>
    <?php if($doadores != null){ ?>
    <table>
        <tr>
            <th>Id</th><th>Nome</th><th>Data do Cadastro</th><th>Intervalo</th><th>Valor</th><th>Pagamento</th><th>Região</th>
        </tr>
        <?php foreach($doadores as $doador){ ?>
        <tr><td><?php echo $doador->nome; ?></td></tr>
        <?php } ?>
    </table>
    <?php }else{ ?>
        <h3>Não há nenhum doador cadastrado</h3>
    <?php } ?>
</div>