// 9lessons programming blog
// Srinivas Tamada http://9lessons.info
$(document).ready(function()
{
	
$(".delete").live('click',function()
{
	
var id = $(this).attr('id');

var b=$(this).parent().parent();
var dataString = 'id='+ id;
if(confirm("Sure you want to delete this update? There is NO undo!"))
{
	$.ajax({
type: "POST",
url: "delete_ajax_dados.php",
data: dataString,
cache: false,
success: function(e)
{
b.hide();
e.stopImmediatePropagation();
}
		   });
	return false;
}
});
			

$(".edit_tr").live('click',function()
{
var ID=$(this).attr('id');

$("#nome_"+ID).hide();
$("#tipo_"+ID).hide();
$("#endereco_"+ID).hide();
$("#bairro_"+ID).hide();
$("#cep_"+ID).hide();
$("#cidade_"+ID).hide();
$("#uf_"+ID).hide();
$("#fone_"+ID).hide();
$("#fax_"+ID).hide();
$("#email_"+ID).hide();
$("#site_"+ID).hide();


$("#nome_input_"+ID).show();
$("#tipo_input_"+ID).show();
$("#endereco_input_"+ID).show();
$("#bairro_input_"+ID).show();
$("#cep_input_"+ID).show();
$("#cidade_input_"+ID).show();
$("#uf_input_"+ID).show();
$("#fone_input_"+ID).show();
$("#fax_input_"+ID).show();
$("#email_input_"+ID).show();
$("#site_input_"+ID).show();

}).live('change',function(e)
{
var ID=$(this).attr('id');


var nome_val=$("#nome_input_"+ID).val();
var tipo_val=$("#tipo_input_"+ID).val();
var endereco_val=$("#endereco_input_"+ID).val();
var bairro_val=$("#bairro_input_"+ID).val();
var cep_val=$("#cep_input_"+ID).val();
var cidade_val=$("#cidade_input_"+ID).val();
var uf_val=$("#uf_input_"+ID).val();
var fone_val=$("#fone_input_"+ID).val();
var fax_val=$("#fax_input_"+ID).val();
var email_val=$("#email_input_"+ID).val();
var site_val=$("#site_input_"+ID).val();

var dataString = 'id='+ ID +'&nome='+ nome_val +'&tipo='+ tipo_val +'&endereco='+ endereco_val+'&bairro='+ bairro_val+'&cep='+ cep_val+'&cidade='+ cidade_val+'&uf='+ uf_val +'&fone='+ fone_val +'&fax='+ fax_val+'&email='+ email_val+'&site='+ site_val;
if(0==0 /*&& two_val.length>0 && three_val.length>0 && four_val.length>0 */)
{

$.ajax({
type: "POST",
url: "live_edit_ajax_dados.php",
data: dataString,
cache: false,
success: function(e)
{


$("#nome_"+ID).html(nome_val);
$("#tipo_"+ID).html(tipo_val);
$("#endereco_"+ID).html(endereco_val);
$("#bairro_"+ID).html(bairro_val);
$("#cep_"+ID).html(cep_val);
$("#cidade_"+ID).html(cidade_val);
$("#uf_"+ID).html(uf_val);
$("#fone_"+ID).html(fone_val);
$("#fax_"+ID).html(fax_val);
$("#email_"+ID).html(email_val);
$("#site_"+ID).html(site_val);

e.stopImmediatePropagation();

}
});
}
else
{
alert('Enter something.');
}

});

// Edit input box click action
$(".editbox").live("mouseup",function(e)
{
e.stopImmediatePropagation();
});

// Outside click action
$(document).mouseup(function()
{

$(".editbox").hide();
$(".text").show();
});
			
			
//Pagination			
function loading_show(){
$('#loading').html("<img src='../images/loading.gif'/>").fadeIn('fast');
}
function loading_hide(){
$('#loading').fadeOut('fast');
}                
function loadData(page){
loading_show();                    
$.ajax
({
type: "POST",
url: "load_data_dados.php",
data: "page="+page,
success: function(msg)
{
$("#container").ajaxComplete(function(event, request, settings)
{
loading_hide();
$("#container").html(msg);
});
}
});
}
loadData(1);  // For first time page load default results
$('#container .pagination li.active').live('click',function(){
var page = $(this).attr('p');
loadData(page);
});           
$('#go_btn').live('click',function(){
var page = parseInt($('.goto').val());
var no_of_pages = parseInt($('.total').attr('a'));
if(page != 0 && page <= no_of_pages){
loadData(page);
}else{
alert('Enter a PAGE between 1 and '+no_of_pages);
$('.goto').val("").focus();
return false;
}
});
});