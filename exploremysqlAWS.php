<?php

$dbhost = 'mysql.c5nmkifz2wfo.us-east-1.rds.amazonaws.com:3306';
$username = 'root';
$password = 'password';
$dbname = 'test';

$connect = mysql_connect($dbhost, $username, $password, $dbname);
mysql_select_db($dbname)
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