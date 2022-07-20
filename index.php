<?php
session_start();
include 'config/config_1.php';
include 'topo.php';
$obj = new Banco;
?>

<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">Ultimas notícias</h4>
    <!-- noticias start -->
    <div class="row noticias-index">
        <?php
        $oque = "id_noticia, titulo";
        $tabela = 'noticias';
        $id_tabela = "id_noticia";
        $limit = 3;
        $dados = $obj->listarStatements($oque, $tabela, $id_tabela, $limit);
        foreach ($dados as $noticia) { ?>


            <a href="noticia.php?noticia_id=<?php echo $noticia['id_noticia']; ?>" class="list-group-item list-group-item-action py-1 lh-tight">
                <div class="mb-1"><?php echo utf8_encode($noticia['titulo']); ?></div>
            </a>

        <?php } ?>
    </div>
    <!-- noticias end -->
    <div class="conteudo">
        <div class="row cards-index">
            <div class="col-sm-6">
                <div class="card alto">
                    <img class="img-fluid" src="images/index_cards/002.jpg">
                    <div class="card-body">
                        <p class="card-text">Informartivo Técnico - Dicas de proteção para ar poluído</p>
                        <a href="pdf/informativo_tecnico_09072022.pdf" target="_blank" class="btn btn-primary">Saiba Mais</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card alto">
                    <img class="img-fluid" src="images/index_cards/001.jpg">
                    <div class="card-body">
                        <p class="card-text">Fatos Marcantes - Qualidade do ar em ambientes interiores</p>
                        <a href="pdf/Qualidade_do_ar_em_ambientes_interiores.pdf" target="_blank" class="btn btn-primary">Saiba Mais</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- cards -->
        <!-- <div class="row cards-index">

            <div class="col-sm-4">
                <div class="card amarelo">
                    <img src="images/icoAmarelo.gif" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">A Brasindoor indica à você as melhores empresas.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card azul">
                    <img src="images/icoAzul.gif" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">Área e atendimento exclusivo para associados.</p>

                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card verde">
                    <img src="images/icoVerde.gif" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">Obtenha vantagens associe-se agora!</p>
                    </div>
                </div>
            </div>

        </div> -->
    </div>
</div>





<?php include 'footer.php'; ?>