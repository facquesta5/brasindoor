<?php
session_start();
include 'config/config_1.php';

$obj = new Banco;

include 'topo.php';
?>

<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">
        Selo de Qualidade - Certificados
    </h4>
    <div class="conteudo">
        <ul>
            <li>
                <a href="<?php echo $_SESSION['host1']; ?>certificado_ambiente.php" target="_self">Ambientes</a>
            </li>
            <li>
                <a href="<?php echo $_SESSION['host1']; ?>certificado_servico.php" target="_self">Servi&ccedil;os</a>
            </li>
            <li>
                <a href="<?php echo $_SESSION['host1']; ?>certificado_produto.php" target="_self"> Produtos e Equipamentos</a>
            </li>
        </ul>
    </div>
</div>

<?php include 'footer.php'; ?>