<?php
session_start();
include 'config/config_1.php';

$obj = new Banco;

include 'topo.php';
?>

<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">
        Certificados - Ambiente
    </h4>
    <div class="conteudo">
        <div class="subt&iacute;tuloInterno ms-3" id="foto"><img src="images/certificado_ambiente.jpg"></div>

        <ul class="mt-4">
            <?php
            $selos = array(
                array("ambiente" => "Condomínio Shopping Center Iguatemi - Campinas", "validade" => ""),
                array("ambiente" => "Condomínio Shopping Center Galleria", "validade" => ""),
                array("ambiente" => "Condomínio Shopping Center Alphaville", "validade" => ""),
                array("ambiente" => "Condom&iacute;nio Shopping Center Iguatemi - Porto Alegre", "validade" => ""),
                array("ambiente" => "Condom&iacute;nio Shopping Center Iguatemi - S&atilde;o Carlos", "validade" => "25/09/2013"),
                array("ambiente" => "Condomínio WTorre JK", "validade" => ""),
                array("ambiente" => "Shop Iguatemi São José do Rio Preto", "validade" => ""),
                array("ambiente" => "Condomínio Shopping Center Parque Dom Pedro", "validade" => ""),
                array("ambiente" => "Condom&iacute;nio Civil Shopping Center Iguatemi Bras&iacute;lia", "validade" => ""),
                array("ambiente" => "Condom&iacute;nio Shopping Center Iguatemi - S&atilde;o Paulo/SP", "validade" => ""),
                //array("ambiente"=>"Condomínio Shopping Center Galleria", "validade"=>""),
                //array("ambiente"=>"Condom&iacute;nio Shopping Center D", "validade"=>""),
                array("ambiente" => "Condom&iacute;nio do Conjunto Comercial Market Place", "validade" => "14/11/1982")
                //array("ambiente"=>"Editora Abril S/A", "validade"=>""),
                //array("ambiente"=>"Edif&iacute;cio Cetenco Plaza - Torre Norte", "validade"=>""),
                //array("ambiente"=>"Edif&iacute;cio Eloy Chaves", "validade"=>""),
            );
            sort($selos);
            $i = 0;
            foreach ($selos as $chave => $valor) {
            ?>
                <li>
                    <p><?php echo $selos[$i]["ambiente"];
                        /* 
                        if(isset($_SESSION['id_nivel']) && $_SESSION['id_nivel'] == 1){ ?>
                            - <?php echo $selos[$i]["validade"];    
                        }*/
                        ?>
                    </p>
                </li>
            <?php
                $i++;
            };
            ?>



        </ul>
    </div>
</div>

<?php include 'footer.php'; ?>