<?php
session_start();
include 'config/config_1.php';

$obj = new Banco;

include 'topo.php';

$codigo = array(
    't1' => 'Analises Laboratoriais',
    't2' => 'Consultoria em implantação de sistemas da qualidade ambiental',
    't3' => 'Gerenciamento ambiental interior',
    't4' => 'Higienização de áreas terciárias (ambientes)',
    't5' => 'Higienização de componentes primários e secundários em centrais de ar condicionado',
    't6' => 'Higienização de superfícies fixas',
    't7' => 'Higienização de superfícies forradas',
    't8' => 'Implantação de programas de qualidade em higienização de �reas terciárias',
    't9' => 'Limpeza de dutos',
    't10' => 'Limpeza de sistemas de exaustão e insuflamento (ar forçado)',
    't11' => 'Manutenção de sistemas de ar condicionado central',
    't12' => 'Manutenção de sistemas de ar condicionado compactos ou remotos',
    't13' => 'Outros Serviços',
    't14' => 'Serviços de coletas de materiais para análises'
);
?>

<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">
        Empresas Associadas: Serviços
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