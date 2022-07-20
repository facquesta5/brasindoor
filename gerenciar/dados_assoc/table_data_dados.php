<?php
$query_pag_data = "SELECT id, nome, tipo, endereco, bairro, cep, cidade, uf, fone, fax, email, site  from socios LIMIT $start, $per_page";
$result_pag_data = mysql_query($query_pag_data) or die('MySql Error' . mysql_error());
$finaldata = "";

$tablehead="<tr><th>Nome</th><th>Tipo</th><th>Endereco</th><th>Bairro</th><th>Cep</th><th>Cidade</th><th>UF</th><th>Fone</th><th>Fax</th><th>Email</th><th>Site</th><th>X</th></tr>";
$muda = "";
$tabledata = "";
while($row = mysql_fetch_array($result_pag_data)) 
{

$id=$row['id'];
$nome=htmlentities($row['nome']);
$tipo=htmlentities($row['tipo']);
$endereco=htmlentities($row['endereco']);
$bairro=htmlentities($row['bairro']);
$cep=htmlentities($row['cep']);
$cidade=htmlentities($row['cidade']);
$uf=htmlentities($row['uf']);
$fone=htmlentities($row['fone']);
$fax=htmlentities($row['fax']);
$email=htmlentities($row['email']);
$email_show = substr($email,0,20);
$site=htmlentities($row['site']);
$site_show = substr($site,0,20);
$cores = array('#1b2a3b','#303030');


$muda = $muda +1;
$cor = $cores[$muda%2];

$tabledata.="<tr id='$id' class='edit_tr' bgcolor='$cor'>

<td class='edit_td' width='20%'>
<span id='nome_$id' class='text'>$nome</span>
<input type='text' value='$nome' class='editbox' id='nome_input_$id' size='20' />
</td>

<td class='edit_td' width='8%'>
<span id='tipo_$id' class='text'>$tipo</span>
<input type='text' value='$tipo' class='editbox' id='tipo_input_$id' size='1' />
</td>

<td class='edit_td' width='16%'>
<span id='endereco_$id' class='text'>$endereco</span>
<input type='text' value='$endereco' class='editbox' id='endereco_input_$id' size='1' />
</td>

<td class='edit_td' width='8%'>
<span id='bairro_$id' class='text'>$bairro</span>
<input type='text' value='$bairro' class='editbox' id='bairro_input_$id' size='1' />
</td>

<td class='edit_td' width='6%'>
<span id='cep_$id' class='text'>$cep</span>
<input type='text' value='$cep' class='editbox' id='cep_input_$id' size='1' />
</td>

<td class='edit_td' width='6%'>
<span id='cidade_$id' class='text'>$cidade</span>
<input type='text' value='$cidade' class='editbox' id='cidade_input_$id' size='1' />
</td>

<td class='edit_td' width='6%'>
<span id='uf_$id' class='text'>$uf</span>
<input type='text' value='$uf' class='editbox' id='uf_input_$id' size='1' />
</td>

<td class='edit_td' width='9%'>
<span id='fone_$id' class='text'>$fone</span>
<input type='text' value='$fone' class='editbox' id='fone_input_$id' size='6' />
</td>

<td class='edit_td' width='9%'>
<span id='fax_$id' class='text'>$fax</span>
<input type='text' value='$fax' class='editbox' id='fax_input_$id' size='6' />
</td>

<td class='edit_td' width='6%'>
<span id='email_$id' class='text'>$email_show</span>
<input type='text' value='$email' class='editbox' id='email_input_$id' size='15' />
</td>

<td class='edit_td' width='6%'>
<span id='site_$id' class='text'>$site_show</span>
<input type='text' value='$site' class='editbox' id='site_input_$id' size='15' />
</td>


<td  width='1%'><a href='#' class='delete' id='$id'> X </a></td>

</tr>";
}
$finaldata = "<table border='0' width='100%'>". $tablehead . $tabledata . "</table>"; // Content for Data

/* Total Count */
$query_pag_num = "SELECT COUNT(*) AS count FROM socios";
$result_pag_num = mysql_query($query_pag_num);
$row = mysql_fetch_array($result_pag_num);
$count = $row['count'];
$no_of_paginations = ceil($count / $per_page);

?>