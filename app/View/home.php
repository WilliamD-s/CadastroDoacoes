<h2 class='titulo'>Lista de doadores</h2><br>
<div>
    <?php if($doadores != null){ ?>
    <table>
        <tr>
            <th>Id</th><th>Nome</th><th>Data do Cadastro</th><th>Intervalo</th><th>Valor</th><th>Pagamento</th><th>Região</th>
        </tr>
        <?php foreach($doadores as $doador){ ?>
        <tr>
        <td><?php echo $doador->id; ?></td>
        <td><?php echo $doador->nome; ?></td>
        <td><?php echo $doador->data_cadastro; ?></td>
        <td><?php echo $doador->intervalo_doacao; ?></td>
        <td><?php echo $doador->valor_doacao; ?></td>
        <td><?php echo $doador->forma_pagamento; ?></td>
        <td><?php echo $doador->uf; ?></td>
        </tr>
        <?php } ?>
    </table>
    <?php }else{ ?>
        <h3 class='aviso'>Não há nenhum doador cadastrado</h3>
    <?php } ?>
</div>