<?php
define(HOST, "mysql.c5nmkifz2wfo.us-east-1.rds.amazonaws.com:3306");
define(USER, "root");
define(PW, "password");
define(DB, "test");

$connect = mysql_connect(HOST,USER,PW)
or die('Could not connect to mysql server.' );

mysql_select_db(DB, $connect)
or die('Could not select database.');

$term = strip_tags(substr($_POST['category'],0, 100));
$term = mysql_escape_string($term); 

$qindex = strip_tags(substr($_POST['question_index'],0, 100));
$qindex = mysql_escape_string($qindex);

if ($qindex<0){
	$qindex=1;
}

$sql = "SELECT `id`, `category`, `question_index`, `question`, `choices`, `answer`, `videos`, `wiki`, `wikicontent`, `concept`
FROM `Content` 
WHERE category = '$term' and question_index=$qindex
order by `question_index` asc";

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
//  	$arr[]=$row;	
    $string .= "<b>".$row->category."</b> - ";
    $string .= $row->question_index." - ";
    $string .= $row->question." - ";
    $string .= $row->choices." - ";
    $string .= $row->answer." - ";
    $string .= $row->videos." - ";
    $string .= $row->wiki." .";
    $string .= "<br/>\n";
  }

}else{
  $string = "No matches!";
} 

//$string = $term;

//echo $string;
//echo $lastrow->wikicontent ;

echo json_encode($lastrow);
//echo json_encode($row);

//echo json_encode($arr);


//$term = strip_tags(substr($_POST['question_index'],0, 100));
//echo $term;

/*
$qindex = strip_tags(substr($_POST['question_index'],0, 100));
$qindex = mysql_escape_string($qindex);

if ($qindex<0){
	$qindex=1;
}

$sql = "SELECT `id`, `category`, `question_index`, `question`, `choices`, `answer`, `videos`, `wiki`
FROM `Content` 
WHERE category = '$term' and question_index=$qindex
order by `question_index` asc";

echo $sql;

//echo "value is: " + $qindex ;
*/


?>