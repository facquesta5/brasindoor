<?php
session_start();
include 'config/config_1.php';

$obj = new Banco;
$id = $_GET['noticia_id'];
$oque = 'titulo, conteudo, autor';
$tabela = 'noticias';
$id_tabela = 'id_noticia';
$status = '';
$noticia = $obj->verStatements($tabela, $oque, $id, $id_tabela, $status);

include 'topo.php';
?>

<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">
        <?php
        foreach ($noticia as $key) {
            echo utf8_encode($key['titulo']);
        ?>
    </h4>
    <div class="conteudo noticia">
        <div class="row">
            <?php echo $key['conteudo']; ?>
        </div>
    <?php
        }
    ?>
    </div>
</div>

<?php include 'footer.php'; ?>