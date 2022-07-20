<?php
session_start();
include 'config/config_1.php';
include 'topo.php';
$obj = new Banco;
?>

<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">
        Proposta de associação - Pessoa Jurídica</h4>
    <div class="conteudo">

        <form name="form_mxstudio" id="registerHere" method="post" action="formulario_PJ.php" 
        onsubmit="return valida()">

            <h5 class="mb-1">Dados de Cadastro</h5>
            <div class="row form-associacao">
                <div class="col-md-6 col-sm-6 mb-2">
                    <label class="form-label">Nome completo</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="col-md-6 col-sm-6 mb-2">
                    <label class="form-label">E-mail</label>
                    <input type="hidden" class="input" name="resultEmail" id="resultEmail">
                    <input type="text" class="form-control" id="email" name="email" 
                    onkeyup="timeMsg(this.value)" autocomplete="off">
                    <span id="span_email" class="hidd">Email já cadastrado em nosso sistema</span>
                </div>

                <div class="col-md-6 col-sm-6 mb-2">
                    <label class="form-label">Razão Social</label>
                    <input type="text" class="form-control" id="razao_social" name="razao_social">
                </div>
                <div class="col-md-6 col-sm-6 mb-2">
                    <label class="form-label">CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj">
                </div>

                <div class="col-md-6 col-sm-6 mb-2">
                    <label class="form-label">Inscrição Estadual</label>
                    <input type="text" class="form-control" id="inscricao_estadual" name="inscricao_estadual">
                </div>
            </div>
            <div class="row form-associacao">

                <div class="col-md-6 col-sm-6 mb-2">
                    <label class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco">
                </div>
                <div class="col-md-6 col-sm-6 mb-2">
                    <label class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro">
                </div>

                <div class="col-md-4 col-sm-4 mb-2">
                    <label class="form-label">UF</label>
                    <select class="form-select" id="uf" name="uf">
                        <option value="">Selecione</option>
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MS">MS</option>
                        <option value="MT">MT</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                    </select>
                </div>
                <div class="col-md-4 col-sm-4 mb-2">
                    <label class="form-label">cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade">
                </div>
                <div class="col-md-4 col-sm-4 mb-2">
                    <label class="form-label">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep">
                </div>

                <div class="col-md-6 col-sm-6 mb-2">
                    <label class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone">
                </div>
                <div class="col-md-6 col-sm-6 mb-2">
                    <label class="form-label">Site</label>
                    <input type="text" class="form-control" id="site" name="site">
                </div>

                <h5 class="mb-1 mt-2">Dados Adicionais</h5>

                <div class="col-md-6 col-sm-6 mb-2">
                    <label class="form-label">Cargo</label>
                    <input type="text" class="form-control" id="cargo" name="cargo">
                </div>
                <div class="col-md-6 col-sm-6 mb-2">
                    <label class="form-label">Ramo / Atividade</label>
                    <input type="text" class="form-control" id="ramo_atividade" name="ramo_atividade">
                </div>
                <div class="col-md-6 col-sm-6 mb-2">
                    <label class="form-label">Area de atuação</label>
                    <input type="text" class="form-control" id="area_atuacao" name="area_atuacao">
                </div>
                <div class="col-md-6 col-sm-6 mb-2">
                    <label class="form-label">Contato</label>
                    <input type="text" class="form-control" id="contato" name="contato">
                </div>

                <h5 class="mb-1 mt-2">Serviços Inclusos</h5>
                <div class="form-check">
                    <input name="t1" id="t1" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Analises Laboratoriais</label>
                </div>
                <div class="form-check">
                    <input name="t2" id="t2" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Consultoria em implantação de sistemas da qualidade ambiental</label>
                </div>
                <div class="form-check">
                    <input name="t3" id="t3" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Gerenciamento ambiental interior</label>
                </div>

                <div class="form-check">
                    <input name="t4" id="t4" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Higienização de áreas terciárias (ambientes)</label>
                </div>
                <div class="form-check">
                    <input name="t5" id="t5" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Higienização de componentes primários e secundários em centrais de ar condicionado</label>
                </div>
                <div class="form-check">
                    <input name="t6" id="t6" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Higienização de superfícies fixas</label>
                </div>
                <div class="form-check">
                    <input name="t7" id="t7" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Higienização de superfícies forradas</label>
                </div>
                <div class="form-check">
                    <input name="t8" id="t8" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Implantação de programas de qualidade em higienização de áreas terciárias</label>
                </div>
                <div class="form-check">
                    <input name="t9" id="t9" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Limpeza de dutos</label>
                </div>
                <div class="form-check">
                    <input name="t10" id="t10" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Limpeza de sistemas de exaustão e insuflamento (ar forçado)</label>
                </div>
                <div class="form-check">
                    <input name="t11" id="t11" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Manutenção de sistemas de ar condicionado central</label>
                </div>
                <div class="form-check">
                    <input name="t12" id="t12" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Manutenção de sistemas de ar condicionado compactos ou remotos</label>
                </div>
                <div class="form-check">
                    <input name="t13" id="t13" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Outros Serviços</label>
                </div>
                <div class="form-check">
                    <input name="t14" id="t14" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Serviços de coletas de materiais para análises</label>
                </div>

                <h5 class="mb-1 mt-2">Produtos Inclusos</h5>
                <div class="form-check">
                    <input name="t15" id="t15" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Equipamentos para tratamento do ar ambiental</label>
                </div>
                <div class="form-check">
                    <input name="t16" id="t16" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Produtos para higienização de ambientes climatizados</label>
                </div>
                <div class="form-check">
                    <input name="t17" id="t17" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Produtos para tratamento de sistemas de ar condicionado</label>
                </div>
                <div class="form-check">
                    <input name="t18" id="t18" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Produtos para higienização de superfícies fixas</label>
                </div>
                <div class="form-check">
                    <input name="t19" id="t19" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Equipamentos para testes e avaliações ambientais</label>
                </div>
                <div class="form-check">
                    <input name="t20" id="t20" type="checkbox" class="form-check-input" value="1" />
                    <label class="form-check-label">Outras áreas</label>
                </div>
                <h5 class="mb-1 mt-2">Condição única de Pagamento</h5>
                <p>parcelado em 12x</p>
                <input type="hidden" id="pagamento" name="pagamento" value="Condicao_unica_12x" />
            </div>

            <input type="hidden" name="id_nivel" value="4" />
            <input type="hidden" name="id_status" value="2" />
            <input type="hidden" name="tipo" value="PJ" />
            <input type="hidden" id="cadastro" name="cadastro" value="1" />
            <div class="form-group mt-1">
                <input type="submit" name="Submit" class="btn btn-success" rel="Enviar Proposta" 
                title="Enviar Proposta" value="Enviar Proposta">
            </div>

        </form>

    </div>
</div>
<?php include 'footer.php'; ?>
<script>
    $(document).ready(function() {
        $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
        $("#cep").mask("99999-999");
        $('#telefone').mask("(99) 9999-99999");
    });
    var t3;
    var stremail;
    var flagErro = 0;

    function timeMsg(str) {
        stremail = str;
        clearTimeout(t3);
        t3 = setTimeout("showHint(stremail)", 2000);
    }

    function showHint(str) {
        var xmlhttp;

        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("resultEmail").value = xmlhttp.responseText;
                document.getElementById("resultEmail").value = xmlhttp.responseText.substring(1);
                var email = document.getElementById("resultEmail").value;
                if (email == 0) {//email already exist
                    $("#span_email").removeClass("show-error");
                    $("#span_email").addClass("hidd");
                    $("#boxEmail").removeClass("error");
                    flagErro = 0;
                } else {
                    $("#boxEmail").removeClass("success");
                    $("#boxEmail").addClass("error");
                    $("#span_email").removeClass("hidd");
                    $("#span_email").addClass("show-error");
                    flagErro = 1;
                }
            }
        }
        xmlhttp.open("GET", "ajaxConsultaEmail.php?q=" + str, true);
        xmlhttp.send();
    }

    function valida() {
        const retain = [];
        var nome = document.getElementById("nome");
        if ( nome.value == '') {
             retain.push(' Nome');
        }
        var email = document.getElementById("email");
        if ( email.value == '' || flagErro == 1) {
             retain.push(' Email');
        }
        var razao_social = document.getElementById("razao_social");
        if ( razao_social.value == '' ) {
             retain.push(' Razao social');
        }
        var cnpj = document.getElementById("cnpj");
        if ( cnpj.value == '' ) {
             retain.push(' CNPJ');
        }
        var endereco = document.getElementById("endereco");
        if ( endereco.value == '' ) {
             retain.push(' Endereço');
        }
        var bairro = document.getElementById("bairro");
        if ( bairro.value == '' ) {
             retain.push(' Bairro');
        }
        var uf = document.getElementById("uf");
        if ( uf.value == '' ) {
             retain.push(' UF');
        }
        var cidade = document.getElementById("cidade");
        if ( cidade.value == '' ) {
             retain.push(' Cidade');
        }
        var cep = document.getElementById("cep");
        if ( cep.value == '' ) {
             retain.push(' CEP');
        }
        var telefone = document.getElementById("telefone");
        if ( telefone.value == '' ) {
             retain.push(' Telefone');
        }


        if(retain.length === 0){
            return true;
        }
        var msg = retain.concat(); 
        msg = 'Preencha corretamente os campos obrigatórios:' + msg;
        toaster('vermelho', msg);
        return false;
    }
</script>