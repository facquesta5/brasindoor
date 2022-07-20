<?php
session_start();
include 'config/config_1.php';
include 'topo.php';
$obj = new Banco;
?>

<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">
        Proposta de associação - Pessoa Física</h4>
    <div class="conteudo">
        <form name="form_mxstudio" id="registerHere" method="post" action="formulario_PF.php" onsubmit="return valida()">
            <h5 class="mb-1 mt-2">Categoria</h5>
            <div class="col-md-6 col-sm-6 mb-2">
                <select class="form-select" id="tipo" name="tipo">
                    <option value="">Selecione</option>
                    <option value="PSQ">Pesquisador</option>
                    <option value="PFE">Professor</option>
                    <option value="PFA">Profissional</option>
                    <option value="ES">Estudante</option>
                </select>
            </div>
            <h5 class="mb-1">Dados de Cadastro</h5>
            <div class="row form-associacao">
                <div class="col-md-6 col-sm-6 mb-2">
                    <label class="form-label">Nome completo</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="col-md-6 col-sm-6 mb-2">
                    <label class="form-label">E-mail</label>
                    <input type="hidden" class="input" name="resultEmail" id="resultEmail">
                    <input type="text" class="form-control" id="email" name="email" onkeyup="timeMsg(this.value)" autocomplete="off">
                    <span id="span_email" class="hidd">Email já cadastrado em nosso sistema</span>
                </div>

                <div class="col-md-6 col-sm-6 mb-2">
                    <label class="form-label">RG</label>
                    <input type="text" class="form-control" id="rg" name="rg">
                </div>
                <div class="col-md-6 col-sm-6 mb-2">
                    <label class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf">
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

                <h5 class="mb-2 mt-2" id="titulo_condicao">Condições de Pagamento</h5>
                <div class="col-md-12 col-sm-12 mb-2">
                    <select class="form-select" id="pagamento" name="pagamento">
                        <option value="">Selecione</option>
                        <option value="1x">à vista</option>
                        <option value="2x">parcelado em 2x</option>
                    </select>

                    <div class="form-check hidd" id="pesquisador_condicao">
                        <input name="psq_condicao" id="psq_condicao" type="checkbox" class="form-check-input" value="1" />
                        <label class="form-check-label">Você concorda com os termos de associação para pesquisadores, sendo gratuíta, porém que
                            o Pesquisador se comprometa a enviar por email no mínimo um artigo ciêntifico por ano.</label>
                    </div>
                </div>
            </div>

            <input type="hidden" name="id_nivel" value="4" />
            <input type="hidden" name="id_status" value="2" />
            <input type="hidden" id="cadastro" name="cadastro" value="1" />
            <div class="form-group mt-1">
                <input type="submit" name="Submit" class="btn btn-success" rel="Enviar Proposta" title="Enviar Proposta" value="Enviar Proposta">
            </div>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <p>A associação para pesquisadores é gratuíta, porém a condição é de que
                            o Pesquisador se comprometa a enviar no mínimo um artigo ciêntifico por ano.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Fechar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script>
    $(document).ready(function() {
        $('#cpf').mask('000.000.000-00', {
            reverse: true
        });
        $("#cep").mask("99999-999");
        $('#telefone').mask("(99) 9999-99999");
    });

    var t3;
    var stremail;
    var flagErro = 0;

    function timeMsg(str) {
        stremail = str;
        clearTimeout(t3);
        t3 = setTimeout("showHint(stremail)", 1500);
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
                if (email == 0) { //email already exist
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

    $("#tipo").on("change", function() {
        pesquisador();
    });

    function pesquisador() {
        if (tipo.value == 'PSQ') {
            $('#myModal').modal('show');
            $("#pagamento").removeClass("show");
            $("#pagamento").addClass("hidd");
            $("#pesquisador_condicao").removeClass("hidd");
            $("#pesquisador_condicao").addClass("show");
            $("#titulo_condicao").text("Termos e condições");
        }
        if (tipo.value != 'PSQ') {
            $("#pagamento").removeClass("hidd");
            $("#pagamento").addClass("show");
            $("#pesquisador_condicao").removeClass("show");
            $("#pesquisador_condicao").addClass("hidd");
            $("#titulo_condicao").text("Condições de Pagamento");
        }
    }
    $("#close").on("click", function() {
        $('#myModal').modal('hide');
    });

    function valida_pesquisador() {
        var tipo = document.getElementById("tipo");
        if (tipo.value == 'PSQ') {
            if ($("#psq_condicao").is(":checked")) {
                pagamento.value = 'gratuito';
            } else {
                toaster('vermelho', 'você precisa aceitar os termos de associação para se associar como pesquisador');
                return false;
            }
        }
    }

    function valida() {
        const retain = [];
        var tipo = document.getElementById("tipo");
        if (tipo.value == '') {
            retain.push(' Categoria');
        }
        var nome = document.getElementById("nome");
        if (nome.value == '') {
            retain.push(' Nome');
        }
        var email = document.getElementById("email");
        if (email.value == '' || flagErro == 1) {
            retain.push(' Email');
        }
        var rg = document.getElementById("rg");
        if (rg.value == '') {
            retain.push(' RG');
        }
        var cpf = document.getElementById("cpf");
        if (cpf.value == '') {
            retain.push(' CPF');
        }
        var endereco = document.getElementById("endereco");
        if (endereco.value == '') {
            retain.push(' Endereço');
        }
        var bairro = document.getElementById("bairro");
        if (bairro.value == '') {
            retain.push(' Bairro');
        }
        var uf = document.getElementById("uf");
        if (uf.value == '') {
            retain.push(' UF');
        }
        var cidade = document.getElementById("cidade");
        if (cidade.value == '') {
            retain.push(' Cidade');
        }
        var cep = document.getElementById("cep");
        if (cep.value == '') {
            retain.push(' CEP');
        }
        var telefone = document.getElementById("telefone");
        if (telefone.value == '') {
            retain.push(' Telefone');
        }
        var pagamento = document.getElementById("pagamento");
        if (tipo.value != 'PSQ') {
            if (pagamento.value == '') {
                retain.push(' Forma de pagamento');
            }
        };

        if (retain.length === 0) {
            if (valida_pesquisador() != 0) {
                return true;
            } else {
                valida_pesquisador();
                return false;
            }
        }
        valida_pesquisador();
        var msg = retain.concat();
        msg = 'Preencha corretamente os campos obrigatórios:' + msg;
        toaster('vermelho', msg);

        return false;
    }
</script>