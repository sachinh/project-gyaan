<?php
define(HOST, "localhost");
define(USER, "root");
define(PW, "root");
define(DB, "test");

$connect = mysql_connect(HOST,USER,PW)
or die('Could not connect to mysql server.' );

mysql_select_db(DB, $connect)
or die('Could not select database.');

$sql = "SELECT `id`, `stuff`, `stuff2`
FROM `exp` 
order by `id` asc";

$result = mysql_query($sql);

$string = '';

$arr=array();
$first=0;

if (mysql_num_rows($result) > 0){
  while($row = mysql_fetch_object($result)){
  	if ($first==0){
  	$lastrow = $row;
  	$first=1;
  	}

    $string .= "<b>".$row->id."</b> - ";
    $string .= $row->stuff." ------- ";
    $string .= $row->stuff2." .";
    $string .= "<br/>\n";
  }

}else{
  $string = "No matches!";
} 

echo $string;
//echo json_encode($lastrow);

?>