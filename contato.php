<?php
session_start();
include 'config/config_1.php';
include 'topo.php';
$obj = new Banco;
?>
<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">Contato</h4>
    <div class="conteudo" id="coluna1">
        <p>
            Av. Rio Branco, 1492 - Campos Elíseos</br>
            CEP 01206-001</br>
            São Paulo - SP</br>
            Fone: (11) 9 9114-0332</br>
            E-mail: <a onClick="return top.js.OpenExtLink(window,event,this)" href="mailto:brasindoor@brasindoor.com.br" target="_blank">
                <strong>brasindoor@brasindoor.com.br</strong></a></br>
        </p>
        <form class="form-horizontal" data-toggle="validator" name="ajax_form" id="ajax_form"
         method="post" autocomplete="off" action="email.php" onsubmit="return valida()">
            <input type="hidden" name="email_cliente" value="brasindoor@brasindoor.com.br">
            <input type="hidden" name="senha_email" value="#Brasindoor1">
            <input type="hidden" name="tipo" value="1">
            <h5>Digite os seus dados</h5>
            </br>
            <div class="row col-sm-6 mb-3"  >
                <label class="form-label">Nome: *</label>
                <input name="nome" id="nome" type="text" id="" class="form-control form-control-sm" >
            </div>
            <div class="row col-sm-6 mb-3">
                <label class="form-label">Email: *</label>
                <input name="email" id="email" type="text" class="form-control form-control-sm">
            </div>
            <div class="row col-sm-6 mb-3">
                <label class="form-label">Telefone: </label>
                <input name="telefone" id="telefone" type="text" class="form-control form-control-sm">
            </div>
            <div class="row mb-3">
                <label class="form-label">Mensagem: *</label>
                <textarea name="observacoes" id="observacoes" class="form-control form-control-sm" 
                rows="4"></textarea>
            </div>
            <div class="g-recaptcha" data-sitekey="6LfcOlsfAAAAAPuK-c4uOjbhR1wLFBs9xj2bo__z"></div>

            <div class="row col-sm-2 mt-2 mb-2" >
                <button class="btn btn-primary btn-md" name="mensagem_contato" type="submit">Enviar</button>
            </div>

        </form>
    </div>
</div>
<?php include 'footer.php'; ?>
<script>
    function valida() {
        const retain = [];
        var nome = document.getElementById("nome");
        if ( nome.value == '') {
             retain.push('Nome');
        }
        var email = document.getElementById("email");
        if ( email.value == '') {
             retain.push('Email');
        }
        var observacoes = document.getElementById("observacoes");
        if ( observacoes.value == '') {
             retain.push('Mensagem');
        }
        if (grecaptcha.getResponse() == '') {
            retain.push('reCAPTCHA');
        }
        if(retain.length === 0){
            return true;
        }
        var msg = retain.concat(); 
        msg = 'Preencha os campos obrigatórios ' + msg;
        toaster('vermelho', msg);
        return false;
    }
</script>