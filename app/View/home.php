<h2 class='titulo'>Lista de doadores</h2><br>
<div>
    <?php if($doadores != null){ ?>
    <table class="table">
        <tr>
            <th>Id</th><th>Nome</th><th>Data do Cadastro</th><th>Intervalo</th><th>Valor</th><th>Pagamento</th><th>Região</th><th>Visualizar</th><th>Editar</th><th>Excluir</th>
        </tr>
        <?php foreach($doadores as $doador){ ?>
        <tr>
        <td><?php echo $doador->id; ?></td>
        <td><?php echo $doador->nome; ?></td>
        <td><?php echo $doador->data_cadastro; ?></td>
        <td><?php echo $doador->intervalo; ?></td>
        <td>R$: <?php echo $doador->valor_doacao; ?></td>
        <td><?php echo $doador->pagamento; ?></td>
        <td><?php echo $doador->uf; ?></td>
        <td><a href="?metodo=vizualizar&id=<?php echo $doador->id; ?>"><i class="fas fa-eye"></i></a></td>
        <td><a href="?metodo=editar&id=<?php echo $doador->id; ?>"><i class="fas fa-edit"></i></a></td>
        <td><a href="?metodo=excluir&id=<?php echo $doador->id; ?>"><i class="fas fa-user-times"></i></a></td>
        </tr>
        <?php } ?>
    </table>
    <?php }else{ ?>
        <h3 class='alert alert-danger'>Não há nenhum doador cadastrado</h3>
    <?php } ?>
</div>