<?php
$query_pag_data = "SELECT id,t1,t2,t3,t4,t5,t6,t7,t8,t9,t10,t11,t12,t13,t14,t15,t16,t17,t18,t19,t20  from socios LIMIT $start, $per_page";
$result_pag_data = mysql_query($query_pag_data) or die('MySql Error' . mysql_error());
$finaldata = "";
$tablehead="<tr><th>T1</th><th>T2</th><th>T3</th><th>T4</th><th>T5</th><th>T6</th><th>T7</th><th>T8</th><th>T9</th><th>T10</th><th>T11</th><th>T12</th><th>T13</th><th>T14</th><th>T15</th><th>T16</th><th>T17</th><th>T18</th><th>T19</th><th>T20</th><th>X</th></tr>";
while($row = mysql_fetch_array($result_pag_data)) 
{

$id=$row['id'];
$t1=htmlentities($row['t1']);
$t2=htmlentities($row['t2']);
$t3=htmlentities($row['t3']);
$t4=htmlentities($row['t4']);
$t5=htmlentities($row['t5']);
$t6=htmlentities($row['t6']);
$t7=htmlentities($row['t7']);
$t8=htmlentities($row['t8']);
$t9=htmlentities($row['t9']);
$t10=htmlentities($row['t10']);
$t11=htmlentities($row['t11']);
$t12=htmlentities($row['t12']);
$t13=htmlentities($row['t13']);
$t14=htmlentities($row['t14']);
$t15=htmlentities($row['t15']);
$t16=htmlentities($row['t16']);
$t17=htmlentities($row['t17']);
$t18=htmlentities($row['t18']);
$t19=htmlentities($row['t19']);
$t20=htmlentities($row['t20']);
 
 

$tabledata.="<tr id='$id' class='edit_tr'>

<td class='edit_td' width='20%'>
<span id='one_$id' class='text'>$nome</span>
<input type='text' value='$nome' class='editbox' id='one_input_$id' size='8' />
</td>

<td class='edit_td' width='2%'>
<span id='t1_$id' class='text'>$t1</span>
<input type='text' value='$tipo' class='editbox' id='t1_input_$id' size='1' />
</td>



<td><a href='#' class='delete' id='$id'> X </a></td>

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