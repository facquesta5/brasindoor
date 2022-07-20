<?php
session_start();
include 'config/config_1.php';

$obj = new Banco;

include 'topo.php';
$codigo = array(
	't15' => 'Equipamentos para tratamento do ar ambiental',
	't16' => 'Produtos para higienização de ambientes climatizados',
	't17' => 'Produtos para tratamento de sistemas de ar condicionado',
	't18' => 'Produtos para higienização de superfícies fixas',
	't19' => 'Equipamentos para testes e avaliações ambientais',
	't20' => 'Outras áreas'
);
?>

<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">
        Empresas Associadas: Produtos
    </h4>
    <div class="conteudo">
        <ul class="list-group list-group-light">
        <?php
            foreach ($codigo as $k => $v) {
                $tabela = 'socios';
                $oque = 'nome';
                $id = 1;
                $id_tabela = $k;
                $status = 1;
                $dados = $obj->verStatements($tabela, $oque, $id, $id_tabela, $status);
                if (count($dados) >= 1) { ?>
                    <li class="list-group-item">
                        <a href="tipo.php?tipo=<?php echo $k; ?>" target="_self"><?php echo $v; ?></a>
                    </li>
            <?php
                }
            }
            ?>
        </ul>
    </div>
</div>

<?php include 'footer.php'; ?>