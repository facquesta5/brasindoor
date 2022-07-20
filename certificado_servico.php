<?php
session_start();
include 'config/config_1.php';

$obj = new Banco;

include 'topo.php';
?>

<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">
        Certificados - Serviço
    </h4>
    <div class="conteudo">
        <div class="ms-3">
            <img src="images/certificado_servico.jpg">
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>