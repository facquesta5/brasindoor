<?php
session_start();
include 'config/config_1.php';

$obj = new Banco;

include 'topo.php';
?>

<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">Artigos</h4>

    <div class="conteudo">
        <ul>
            <li>
                <a href="artigo1.php" target="_self">A qualidade do ar e a
                    contribui&ccedil;&atilde;o do sistema de ar condicionado</a>
            </li>
            <li>
                <a href="artigo2.php" target="_self">Aspectos relevantes na
                    concep&ccedil;&atilde;o de sistemas de esquadrias na regi&atilde;o norte do RS</a>
            </li>
            <li>
                <a href="artigo3.php" target="_self">Ambientes climatizados
                    e riscos a sa&uacute;de</a>
            </li>
            <li>
                <a href="artigo4.php" target="_self">A qualidade do ar de
                    interiores e a química</a>
            </li>
            <li>
                <a href="pdf/QualidadedoAr_em_Shopping_e_cinemas.pdf" target="_blank">Qualidade do ar em shoppings e cinemas</a>
            </li>
        </ul>
    </div>
</div>

<?php include 'footer.php'; ?>