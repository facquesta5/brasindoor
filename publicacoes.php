<?php
session_start();
include 'config/config_1.php';

$obj = new Banco;

include 'topo.php';
?>

<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">
    Publicações
    </h4>
    <div class="conteudo">
        <ul class="list-group list-group-light">
            <li class="list-group-item"><a href="livros.php" target="_self">Livros</a></li>
            <li class="list-group-item"><a href="revistas.php" target="_self">Revistas</a></li>
            <li class="list-group-item"><a href="outras_publicacoes.php" target="_self">Outras</a></li>
        </ul>
    </div>
</div>

<?php include 'footer.php'; ?>