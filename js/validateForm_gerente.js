<script type="text/javascript">
$(function(){    

        $('input').checkBox();
        $('#check-all').click(function(){
                        $('#check_list input[type=checkbox]').checkBox('changeCheckStatus', true);
                        return false;
                });
                $('#uncheck-all').click(function(){
                        $('#check_list input[type=checkbox]').checkBox('changeCheckStatus', false);
                        return false;
         });
});
$(document).ready(function(){
    jQuery(function($){

    $('#cnpj').mask("99.999.999/9999-99");
    $("#uf").mask("aa");
    $("#cep").mask("99999-999");
    $('#telefone').mask("(99) 9999-9999");
    $('#fax').mask("(99) 9999-9999");
  });

  $('input').hover(function(){
  $(this).popover('show')
});




  $("#registerHere").validate({

    rules:{
      nome:"required",
      usuario:"required",
      email:{
          email: true
        },
      senha:{
        minlength: 6
      },
      csenha:{
        equalTo: "#senha"
      },
    },
    messages:{
      nome:"Digite seu nome completo.",
      usuario:"Digite um Login de usuario para logar no sistema.",
      email:{
        required:"Digite seu email",
        email:"Digite um entereço de email válido."
      },
      senha:{
        required:"Digite sua senha para logar no sistema.",
        minlength:"A senha deve ter no mínimo 6 characters."
      },
      csenha:{
        required:"Confirme sua senha para segurança.",
        equalTo:"A senha e a confirmação de senha devem ser iguais."
      },
      razao_social:"Digite a Razão Social.",
      cnpj:"Digite o CNPJ corretamente.",
      inscricao_estadual:"Digite a Incrição Estadual.",
      endereco:"Digite o endereço correspondete.",
      bairro:"Digite o bairro correspondete.",
      cidade:"Digite a cidade correspondete.",
      uf:"Digite a unidade federativa correspondete.",
      cep:"Digite o CEP correspondente.",
      telefone:"Digite um telefone correspondente.",
      gender:"Select Gender"
    },
    errorClass: "help-inline",
    errorElement: "span",
    highlight:function(element, errorClass, validClass) {
      $(element).parents('.control-group').addClass('error');
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).parents('.control-group').removeClass('error');
      $(element).parents('.control-group').addClass('success');
    }
  });
});

</script>