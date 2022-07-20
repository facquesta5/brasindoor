<?php
session_start();
include 'config/config_1.php';
include 'topo_copy.php';
$obj = new User;
?>
<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">Área de testes</h4>
    <div class="conteudo" >
    <p>
    <?php
    $emails = $obj->getMailing();
    // echo '<pre>';
    // print_r($emails);
    foreach ($emails as $value) {
        if($value['email'] != ''){
            echo $value['email'].", ";
        }
    }
    ?>
    </p>
    </div>
</div>
<?php include 'footer_copy.php'; ?>



<p>
<a href="https://materiais.abrava.com.br/iii-seminario-de-refrigeracao-comercial-e-industrial?utm_campaign=inscreva-se__iii_seminario_de_refrigeracao_comercial_e_industrial&utm_medium=email&utm_source=RD+Station" target="_blank">
    

</a>
<img id="lm-img-rcmfile209317780262b0948f97613e56bdc37ec40fec13b9075bbb0fc7474" src="blob:https://webmail-seguro.com.br/4354e4bf-4022-45bc-9519-17e69c90f560" /></p>
<div id="_rc_sig">&nbsp;</div>

III SEMINÁRIO DE REFRIGERAÇÃO COMERCIAL E INDUSTRIAL

width="800"



<p>
<a href="https://materiais.abrava.com.br/iii-seminario-de-refrigeracao-comercial-e-industrial?utm_campaign=inscreva-se__iii_seminario_de_refrigeracao_comercial_e_industrial&utm_medium=email&utm_source=RD+Station" target="_blank">


</a>    
</p>
<div id="_rc_sig">&nbsp;</div>