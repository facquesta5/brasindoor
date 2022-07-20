<?php
session_start();
require("../config/config_2.php");
include 'config/db.php';
$uid = $_SESSION['id'];
$message = $_SESSION['msg_done'];

if (empty($_SESSION['id']) || $_SESSION['id_nivel'] == 4) {
    header("location:login.php");
}

if (!$user->get_session()) {
    header("location:login.php");
}

if (isset($_GET['q'])) {
    if ($_GET['q'] == 'logout') {
        $user->user_logout();
        header("location:login.php");
    }
}
include 'topo.php';
?>
<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">
        Alterar Associados
    </h4>
    <div class="conteudo">
        <?php
        $obj = new Banco;
        $objUser = new User;
        if (!empty($_POST['alterar']) && $_POST['alterar'] == 1) {
            $tel = $objUser->separaTelefone($_POST["telefone"]);
            $fax = $objUser->separaTelefone($_POST["fax"]);
            $cep = $objUser->separaCep($_POST["cep"]);

            $t = 't';
            for ($n = 0; $n <= 20; $n++) {
                $t = "t" . $n;
                if (!empty($_POST["$t"])) {
                    ${'t' . $n} = $_POST["$t"];
                } else {
                    ${'t' . $n} = 0;
                }
            }
            $oque = array(
                'nome' => utf8_decode($_POST['nome']),
                'tipo' => $_POST['tipo'],
                'cnpj' => $_POST['cnpj'],
                'cpf' => $_POST['cpf'],
                'razao_social' => utf8_decode($_POST['razao_social']),
                'rg' => $_POST['rg'],
                'endereco' => utf8_decode($_POST['endereco']),
                'bairro' => utf8_decode($_POST['bairro']),
                'cep' => $cep,
                'cidade' => utf8_decode($_POST['cidade']),
                'uf' => $_POST['uf'],
                'email' => utf8_decode($_POST['email']),
                'email_financeiro' => utf8_decode($_POST['email_financeiro']),
                'foneddd' => $tel[0],
                'fone' => $tel[1],
                'faxddd' => $fax[0],
                'fax' => $fax[1],
                'site' => $_POST['site'],
                't1' => $t1,
                't2' => $t2,
                't3' => $t3,
                't4' => $t4,
                't5' => $t5,
                't6' => $t6,
                't7' => $t7,
                't8' => $t8,
                't9' => $t9,
                't10' => $t10,
                't11' => $t11,
                't12' => $t12,
                't13' => $t13,
                't14' => $t14,
                't15' => $t15,
                't16' => $t16,
                't17' => $t17,
                't18' => $t18,
                't19' => $t19,
                't20' => $t20,
                'id_status' => $_POST['id_status']
            );
            $onde = 'socios';
            $id = $_GET['id_assoc'];
            $id_tabela = "id";
            $dados = $obj->alterarStatements($oque, $onde, $id, $id_tabela);
            $redirect = "alterar_assoc.php?id_assoc=$id";
            $pagina = $obj->redirectTo($redirect);
        } else {
            $oque = "*";
            $tabela = 'socios';
            $id = $_GET['id_assoc'];
            $id_tabela = "id";
            $status = "";
            $variable = $obj->verStatements($tabela, $oque, $id, $id_tabela, $status);
        } ?>
        <form method="post" name="alterar_assoc">
            <?php foreach ($variable as $dados) { ?>
                <div class="row form-associacao">
                    <div class="col-md-6 col-sm-6 mb-2">
                        <label class="form-label">Nome</label>
                        <input class="form-control" type="text" name="nome" value="<?php echo utf8_encode($dados['nome']); ?>" size="80" />
                    </div>
                    <div class="col-md-6 col-sm-6 mb-2">
                        <label class="form-label">Tipo</label>
                        <select class="form-select" id="tipo" name="tipo">
                            <?php
                            $tipo_array = array(
                                'Pessoa Jurídica' => 'PJ',
                                'Professor' => 'PFE',
                                'Profissional' => 'PFA',
                                'Estudante' => 'ES',
                                'Pesquisador' => 'PSQ'
                            );
                            foreach ($tipo_array as $key => $value) {
                            ?>
                                <option <?php if ($value == $dados['tipo']) {
                                            echo 'selected';
                                        } ?> value="<?php echo $value; ?>">
                                    <?php echo $key; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <?php if ($dados['tipo'] != 'PJ') { ?>
                        <div class="col-md-6 col-sm-6 mb-2">
                            <label class="form-label">CPF</label>
                            <input class="form-control" type="text" name="cpf" value="<?php echo utf8_encode($dados['cpf']); ?>" size="30" />
                        </div>
                        <div class="col-md-6 col-sm-6 mb-2">
                            <label class="form-label">RG</label>
                            <input class="form-control" type="text" name="rg" value="<?php echo utf8_encode($dados['rg']); ?>" size="30" />
                        </div>
                    <?php } ?>
                    <?php if ($dados['tipo'] == 'PJ') { ?>
                    <div class="col-md-6 col-sm-6 mb-2">
                        <label class="form-label">Razão Social</label>
                        <input class="form-control" type="text" name="razao_social" value="<?php echo utf8_encode($dados['razao_social']); ?>" size="30" />
                    </div>
                    <div class="col-md-6 col-sm-6 mb-2">
                        <label class="form-label">CNPJ</label>
                        <input class="form-control" type="text" name="cnpj" value="<?php echo utf8_encode($dados['cnpj']); ?>" size="30" />
                    </div>
                    <?php } ?>
                    <div class="col-md-6 col-sm-6 mb-2">
                        <label class="form-label">Endereço</label>
                        <input class="form-control" type="text" name="endereco" value="<?php echo utf8_encode($dados['endereco']); ?>" size="60" />
                    </div>
                    <div class="col-md-6 col-sm-6 mb-2">
                        <label class="form-label">Bairro</label>
                        <input class="form-control" type="text" name="bairro" value="<?php echo utf8_encode($dados['bairro']); ?>" size="30" />
                    </div>
                    <div class="col-md-6 col-sm-6 mb-2">
                        <label class="form-label">CEP</label>
                        <input class="form-control" type="text" name="cep" value="<?php echo $dados['cep']; ?>" size="10" />
                    </div>
                    <div class="col-md-6 col-sm-6 mb-2">
                        <label class="form-label">Cidade</label>
                        <input class="form-control" type="text" name="cidade" value="<?php echo utf8_encode($dados['cidade']); ?>" size="30" />
                    </div>
                    <div class="col-md-6 col-sm-6 mb-2">
                        <label class="form-label">UF</label>
                        <input class="form-control" type="text" name="uf" value="<?php echo $dados['UF']; ?>" size="2" />
                    </div>
                    <div class="col-md-6 col-sm-6 mb-2">
                        <label class="form-label">Telefone</label>
                        <input class="form-control" type="text" name="telefone" value="<?php echo '(' . $dados['foneddd'] . ') ' . $dados['fone']; ?>" size="14" />
                    </div>
                    <div class="col-md-6 col-sm-6 mb-2">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="text" name="email" value="<?php echo utf8_encode($dados['email']); ?>" size="50" />
                    </div>
                    <div class="col-md-6 col-sm-6 mb-2">
                        <label class="form-label">Email financeiro</label>
                        <input class="form-control" type="text" name="email_financeiro" value="<?php echo utf8_encode($dados['email_financeiro']); ?>" size="50" />
                    </div>
                    <div class="col-md-6 col-sm-6 mb-2">
                        <label class="form-label">Site</label>
                        <input class="form-control" type="text" name="site" value="<?php echo $dados['site']; ?>" size="50" />
                    </div>
                </div>
                <?php if ($dados['tipo'] == 'PJ') { ?>
                <h5>Serviços Inclusos</h5>
                <div class="form-check">
                    <input class="form-check-input" name="t1" id="t1" type="checkbox" <?php echo ($dados['t1'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Analises Laboratoriais</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t2" id="t2" type="checkbox" <?php echo ($dados['t2'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Consultoria em implantação de sistemas da qualidade ambiental</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t3" id="t3" type="checkbox" <?php echo ($dados['t3'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Gerenciamento ambiental interior</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t4" id="t4" type="checkbox" <?php echo ($dados['t4'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Higienização de áreas terciárias (ambientes)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t5" id="t5" type="checkbox" <?php echo ($dados['t5'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Higienização de componentes primários e secundários em centrais de ar condicionado</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t6" id="t6" type="checkbox" <?php echo ($dados['t6'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Higienização de superfícies fixas</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t7" id="t7" type="checkbox" <?php echo ($dados['t7'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Higienização de superfícies forradas</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t8" id="t8" type="checkbox" <?php echo ($dados['t8'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Implantação de programas de qualidade em higienização de áreas terciárias</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t9" id="t9" type="checkbox" <?php echo ($dados['t9'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Limpeza de dutos</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t10" id="t10" type="checkbox" <?php echo ($dados['t10'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Limpeza de sistemas de exaustão e insuflamento (ar forçado)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t11" id="t11" type="checkbox" <?php echo ($dados['t11'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Manutenção de sistemas de ar condicionado central</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t12" id="t12" type="checkbox" <?php echo ($dados['t12'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Manutenção de sistemas de ar condicionado compactos ou remotos</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t13" id="t13" type="checkbox" <?php echo ($dados['t13'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Outros Serviços</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t14" id="t14" type="checkbox" <?php echo ($dados['t14'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Serviços de coletas de materiais para análises</label>
                </div>
                <h3>Produtos Inclusos</h3>
                <div class="form-check">
                    <input class="form-check-input" name="t15" id="t15" type="checkbox" <?php echo ($dados['t15'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Equipamentos para tratamento do ar ambiental</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t16" id="t16" type="checkbox" <?php echo ($dados['t16'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Produtos para higienização de ambientes climatizados</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t17" id="t17" type="checkbox" <?php echo ($dados['t17'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Produtos para tratamento de sistemas de ar condicionado</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t18" id="t18" type="checkbox" <?php echo ($dados['t18'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Produtos para higienização de superfícies fixas</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t19" id="t19" type="checkbox" <?php echo ($dados['t19'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Equipamentos para testes e avaliações ambientais</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="t20" id="t20" type="checkbox" <?php echo ($dados['t20'] == 1) ? "checked='checked'" : ""; ?> value="1" />
                    <label class="form-check-label">Outras áreas</label>
                </div>
                <?php } ?>
                <?php
                if ($dados['id_status'] == 1) {
                    $ativo = "selected";
                } else {
                    $ativo = "";
                }
                if ($dados['id_status'] == 2) {
                    $inativo = "selected";
                } else {
                    $inativo = "";
                }
                ?>
                <div class="col-md-6 col-sm-6 mt-3 mb-4">
                    <label class="form-label"><b>Status</b></label>
                    <select class="form-select" name="id_status">
                        <option value="1" <?php echo $ativo ?>>Ativo</option>
                        <option value="2" <?php echo $inativo ?>>Inativo</option>
                    </select>
                </div>
                <input type="hidden" name="alterar" value="1" />
            <?php } ?>
            <input class="btn btn-success" type="submit" value="Alterar" />
        </form>
    </div>
</div>
<?php include 'footer.php'; ?>