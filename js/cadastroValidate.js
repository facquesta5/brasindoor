function a(){
	nome = document.form.txtNome.value;
	
	endereco = document.form.txtEndereco.value;
	bairro = document.form.txtBairro.value;
	cep = document.form.txtCep.value;
	cidade = document.form.txtCidade.value;
	nascimento = document.form.txtNascimento.value;
	celular = document.form.txtCelular.value;
	email = document.form.txtEmail.value;
	conEmail = document.form.txtConEmail.value;
	login = document.form.txtLogin.value;
	senha = document.form.txtSenha.value;
	conSenha = document.form.txtConSenha.value;
	
		
	if( nome.length < 3 ){
	alert ("Digite o seu nome corretamente");
	return false;
	}
	
	if(  endereco.length < 5 ){
	alert ("Digite o seu endereço corretamente");
	return false;
	}
	
	if(  bairro.length < 3 ){
	alert ("Digite o seu bairro corretamente");
	return false;
	}
	
	if( cep.length < 8 ){
	alert ("Digite o seu cep corretamente");
	return false;
	}
	if( cidade.length < 2 ){
	alert ("Digite a sua cidade corretamente");
	return false;
	}
	
	if( nascimento.length < 8 ){
	alert ("Digite a sua data de nascimento corretamente");
	return false;
	}
	if( celular.length < 2 ){
	alert ("Digite o seu Telefone corretamente");
	return false;
	}
	if( email.length < 6 || email.indexOf ('@')== -1 || email.indexOf ('.')==-1 ){
	alert ("Digite o seu email correntamente");
	return false;
	}
	if( conEmail.length < 6 || conEmail.indexOf ('@')== -1 || conEmail.indexOf ('.')==-1 || conEmail != email ){
	alert ("Email não confirmado");
	return false;
	}
	if( senha.length < 6 ){
	alert ("A senha deve conter no mínimo 6 caracteres");
	return false;
	}
	if( senha.length > 8 ){
	alert ("A senha deve conter no maximo 8 caracteres");
	return false;
	}
	if( senha.indexOf (' ') >= 1 ){
	alert ("A senha não pode conter espaços em branco");
	return false;
	}
	if( conSenha != senha ){
	alert ("Senha não confirmada");
	return false;
	}	

	else{
	confirm("Confirma os dados?");
	return true;
	}
}
