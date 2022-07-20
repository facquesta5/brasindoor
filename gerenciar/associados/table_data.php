<?php
$query_pag_data = "SELECT id,nome,category,price,discount from socios LIMIT $start, $per_page";
$result_pag_data = mysql_query($query_pag_data) or die('MySql Error' . mysql_error());
$finaldata = "";
$tablehead="<tr><th>Product Name</th><th>Edit</th></tr>";
while($row = mysql_fetch_array($result_pag_data)) 
{

$id=$row['id'];
$nome=htmlentities($row['nome']);

$tabledata.="<tr id='$id' class='edit_tr'>

<td class='edit_td' >
<span id='one_$id' class='text'>$nome</span>
<input type='text' value='$nome' class='editbox' id='one_input_$id' />
</td>


<td><a href='#' class='delete' id='$id'> X </a></td>

</tr>";
}
$finaldata = "<table width='100%'>". $tablehead . $tabledata . "</table>"; // Content for Data


/* Total Count */
$query_pag_num = "SELECT COUNT(*) AS count FROM socios";
$result_pag_num = mysql_query($query_pag_num);
$row = mysql_fetch_array($result_pag_num);
$count = $row['count'];
$no_of_paginations = ceil($count / $per_page);




?>