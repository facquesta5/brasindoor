<?php
$query_pag_data = "SELECT id,nome,t1,t2,t3,t4,t5,t6,t7,t8,t9,t10,t11,t12,t13,t14,t15,t16,t17,t18,t19,t20  from socios LIMIT $start, $per_page";
$result_pag_data = mysql_query($query_pag_data) or die('MySql Error' . mysql_error());
$finaldata = "";
$tablehead="<tr><th>Nome</th><th>T1</th><th>T2</th><th>T3</th><th>T4</th><th>T5</th><th>T6</th><th>T7</th><th>T8</th><th>T9</th><th>T10</th><th>T11</th><th>T12</th><th>T13</th><th>T14</th><th>T15</th><th>T16</th><th>T17</th><th>T18</th><th>T19</th><th>T20</th></tr>";
$muda = '';
$tabledata = '';
while($row = mysql_fetch_array($result_pag_data)) 
{

$id=$row['id'];
$nome=htmlentities($row['nome']);
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
$cores = array('#1b2a3b','#303030');
$muda = $muda +1;
$cor = $cores[$muda%2];

$tabledata.="<tr id='$id' class='edit_tr' bgcolor='$cor'>

<td class='edit_td' width='25%'>
<span id='one_$id' class='text'>$nome</span>

</td>


<td class='edit_td' width='2%'>
<span id='t1_$id' class='text'>$t1</span>
<input type='text' value='$t1' class='editbox' id='t1_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t2_$id' class='text'>$t2</span>
<input type='text' value='$t2' class='editbox' id='t2_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t3_$id' class='text'>$t3</span>
<input type='text' value='$t3' class='editbox' id='t3_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t4_$id' class='text'>$t4</span>
<input type='text' value='$t4' class='editbox' id='t4_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t5_$id' class='text'>$t5</span>
<input type='text' value='$t5' class='editbox' id='t5_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t6_$id' class='text'>$t6</span>
<input type='text' value='$t6' class='editbox' id='t6_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t7_$id' class='text'>$t7</span>
<input type='text' value='$t7' class='editbox' id='t7_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t8_$id' class='text'>$t8</span>
<input type='text' value='$t8' class='editbox' id='t8_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t9_$id' class='text'>$t9</span>
<input type='text' value='$t9' class='editbox' id='t9_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t10_$id' class='text'>$t10</span>
<input type='text' value='$t10' class='editbox' id='t10_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t11_$id' class='text'>$t11</span>
<input type='text' value='$t11' class='editbox' id='t11_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t12_$id' class='text'>$t12</span>
<input type='text' value='$t12' class='editbox' id='t12_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t13_$id' class='text'>$t13</span>
<input type='text' value='$t13' class='editbox' id='t13_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t14_$id' class='text'>$t14</span>
<input type='text' value='$t14' class='editbox' id='t14_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t15_$id' class='text'>$t15</span>
<input type='text' value='$t15' class='editbox' id='t15_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t16_$id' class='text'>$t16</span>
<input type='text' value='$t16' class='editbox' id='t16_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t17_$id' class='text'>$t17</span>
<input type='text' value='$t17' class='editbox' id='t17_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t18_$id' class='text'>$t18</span>
<input type='text' value='$t18' class='editbox' id='t18_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t19_$id' class='text'>$t19</span>
<input type='text' value='$t19' class='editbox' id='t19_input_$id' size='1' />
</td>

<td class='edit_td' width='1%'>
<span id='t20_$id' class='text'>$t20</span>
<input type='text' value='$t20' class='editbox' id='t20_input_$id' size='1' />
</td>



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