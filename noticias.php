<?php
session_start();
include 'config/config_1.php';
$obj = new Banco;
include 'topo.php';
?>

<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">Ultimas notícias</h4>

    <!-- noticias -->
    <div class="row noticias-index">
        <?php
        $oque = "id_noticia, titulo";
        $tabela = 'noticias';
        $id_tabela = "id_noticia";
        $limit = "";
        $dados = $obj->listarStatements($oque, $tabela, $id_tabela, $limit);
        foreach ($dados as $noticia) { ?>
            <a href="noticia.php?noticia_id=<?php echo $noticia['id_noticia']; ?>" class="list-group-item list-group-item-action py-1 lh-tight">
                <div class="mb-1 small"><?php echo utf8_encode($noticia['titulo']); ?></div>
            </a>
        <?php } ?>
    </div>

    

</div>





<?php include 'footer.php'; ?>