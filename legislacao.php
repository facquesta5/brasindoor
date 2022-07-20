<?php
session_start();
include 'config/config_1.php';

$obj = new Banco;

include 'topo.php';
?>

<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">Legislação</h4>

    <div class="conteudo">
        <div class="subtítuloInterno"><a href="pdf/Portaria3[1]523de1998-MS-PMOC.pdf" target="_blank"><strong>Minist&eacute;rio da Sa&uacute;de - Portaria 3.523 de 1998 - MS - PMOC</strong></a></div>
        <div class="subtítuloInterno"><strong>Minist&eacute;rio do Trabalho:<br>
                <a href="pdf/NR 15 - Insalubridade.pdf" target="_blank">- NR 15 - Insalubridade</a><br>
                <a href="pdf/CLT.pdf" target="_blank">- CLT</a></strong></div>
        <div class="subtítuloInterno"> ANVISA<br>
            <a href="pdf/Resolução RE 09-2003 ANVISA - Padrões Referenciais.pdf" target="_blank">- <strong>Resolu&ccedil;&atilde;o RE 09-2003 ANVISA - Padr&otilde;es Referenciais</strong></a><strong></strong><br>
            <a href="pdf/Lei 6[1].437 - Infrações Sanitárias.pdf" target="_blank">- <strong>Lei 6.437 - Infra&ccedil;&otilde;es Sanit&aacute;rias</strong></a><strong></strong><br>
            <a href="pdf/Lei 9[1].695-98 - Infrações Sanitárias e Crimes Hediondos.pdf" target="_blank">- <strong>Lei 9.695-98 - Infra&ccedil;&otilde;es Sanit&aacute;rias e Crimes Hediondos</strong></a><strong></strong><br>
            <a href="pdf/Portaria 15-88 ANVISA - Registro de Saneantes.pdf" target="_blank">- <strong>Portaria 15-88 ANVISA - Registro de Saneantes</strong></a><strong></strong><br>
            <a href="pdf/RDC 02 ANVISA.pdf" target="_blank">- <strong>RDC 02 ANVISA</strong></a><strong></strong><br>
            <a href="pdf/Resolução 336-99 - ANVISA - Saneantes Domissanitários.pdf" target="_blank">- <strong>Resolu&ccedil;&atilde;o 336-99 - ANVISA - Saneantes Domissanit&aacute;rios</strong></a><strong></strong><br>
            <a href="
     pdf/Resolucao RDC 02-2003 ANVISA - Aeroportos e Aeronaves.pdf" target="_blank">- <strong>Resolu&ccedil;&atilde;o RDC 02-2003 ANVISA - Aeroportos e Aeronaves</strong></a><strong></strong><br>
            <a href="pdf/Resolução RDC 50 de 2002 - proj fisicos de estab assist saúde.pdf" target="_blank">- <strong>Resolu&ccedil;&atilde;o RDC 50 de 2002 - proj fisicos de estab assist sa&uacute;de</strong></a><strong></strong>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>