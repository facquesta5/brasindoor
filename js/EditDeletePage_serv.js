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
url: "../gerenciar/serv_assoc/delete_ajax_serv.php",
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

$("#t1_"+ID).hide();
$("#t2_"+ID).hide();
$("#t3_"+ID).hide();
$("#t4_"+ID).hide();
$("#t5_"+ID).hide();
$("#t6_"+ID).hide();
$("#t7_"+ID).hide();
$("#t8_"+ID).hide();
$("#t9_"+ID).hide();
$("#t10_"+ID).hide();
$("#t11_"+ID).hide();
$("#t12_"+ID).hide();
$("#t13_"+ID).hide();
$("#t14_"+ID).hide();
$("#t15_"+ID).hide();
$("#t16_"+ID).hide();
$("#t17_"+ID).hide();
$("#t18_"+ID).hide();
$("#t19_"+ID).hide();
$("#t20_"+ID).hide();
//$("#three_"+ID).hide();
//$("#four_"+ID).hide();

$("#t1_input_"+ID).show();
$("#t2_input_"+ID).show();
$("#t3_input_"+ID).show();
$("#t4_input_"+ID).show();
$("#t5_input_"+ID).show();
$("#t6_input_"+ID).show();
$("#t7_input_"+ID).show();
$("#t8_input_"+ID).show();
$("#t9_input_"+ID).show();
$("#t10_input_"+ID).show();
$("#t11_input_"+ID).show();
$("#t12_input_"+ID).show();
$("#t13_input_"+ID).show();
$("#t14_input_"+ID).show();
$("#t15_input_"+ID).show();
$("#t16_input_"+ID).show();
$("#t17_input_"+ID).show();
$("#t18_input_"+ID).show();
$("#t19_input_"+ID).show();
$("#t20_input_"+ID).show();
//$("#three_input_"+ID).show();
//$("#four_input_"+ID).show();


}).live('change',function(e)
{
var ID=$(this).attr('id');

var t1_val=$("#t1_input_"+ID).val();
var t2_val=$("#t2_input_"+ID).val();
var t3_val=$("#t3_input_"+ID).val();
var t4_val=$("#t4_input_"+ID).val();
var t5_val=$("#t5_input_"+ID).val();
var t6_val=$("#t6_input_"+ID).val();
var t7_val=$("#t7_input_"+ID).val();
var t8_val=$("#t8_input_"+ID).val();
var t9_val=$("#t9_input_"+ID).val();
var t10_val=$("#t10_input_"+ID).val();
var t11_val=$("#t11_input_"+ID).val();
var t12_val=$("#t12_input_"+ID).val();
var t13_val=$("#t13_input_"+ID).val();
var t14_val=$("#t14_input_"+ID).val();
var t15_val=$("#t15_input_"+ID).val();
var t16_val=$("#t16_input_"+ID).val();
var t17_val=$("#t17_input_"+ID).val();
var t18_val=$("#t18_input_"+ID).val();
var t19_val=$("#t19_input_"+ID).val();
var t20_val=$("#t20_input_"+ID).val();

//var three_val=$("#three_input_"+ID).val();
//var four_val=$("#four_input_"+ID).val();

var dataString = 'id='+ ID +'&t1='+ t1_val +'&t2='+ t2_val +'&t3='+ t3_val +'&t4='+ t4_val +'&t5='+ t5_val +'&t6='+ t6_val+'&t7='+ t7_val +'&t8='+ t8_val +'&t9='+ t9_val +'&t10='+ t10_val +'&t11='+ t11_val +'&t12='+ t12_val +'&t13='+ t13_val +'&t14='+ t14_val +'&t15='+ t15_val +'&t16='+ t16_val +'&t17='+ t17_val +'&t18='+ t18_val +'&t19='+ t19_val +'&t20='+ t20_val /*+'&price='+three_val+'&discount='+four_val */ ;
if(0 == 0 /*&& two_val.length>0 && three_val.length>0 && four_val.length>0*/)
{

$.ajax({
type: "POST",
url: "live_edit_ajax_serv.php",
data: dataString,
cache: false,
success: function(e)
{

$("#t1_"+ID).html(t1_val);
$("#t2_"+ID).html(t2_val);
$("#t3_"+ID).html(t3_val);
$("#t4_"+ID).html(t4_val);
$("#t5_"+ID).html(t5_val);
$("#t6_"+ID).html(t6_val);
$("#t7_"+ID).html(t7_val);
$("#t8_"+ID).html(t8_val);
$("#t9_"+ID).html(t9_val);
$("#t10_"+ID).html(t10_val);
$("#t11_"+ID).html(t11_val);
$("#t12_"+ID).html(t12_val);
$("#t13_"+ID).html(t13_val);
$("#t14_"+ID).html(t14_val);
$("#t15_"+ID).html(t15_val);
$("#t16_"+ID).html(t16_val);
$("#t17_"+ID).html(t17_val);
$("#t18_"+ID).html(t18_val);
$("#t19_"+ID).html(t19_val);
$("#t20_"+ID).html(t20_val);

//$("#three_"+ID).html(three_val);
//$("#four_"+ID).html(four_val);

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
url: "load_data_serv.php",
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