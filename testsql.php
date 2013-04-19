<?php
define(HOST, "localhost");
define(USER, "root");
define(PW, "root");
define(DB, "test");

$connect = mysql_connect(HOST,USER,PW)
or die('Could not connect to mysql server.' );

mysql_select_db(DB, $connect)
or die('Could not select database.');

//$term = strip_tags(substr($_POST['category'],0, 100));
$term = "Logic";
$term = mysql_escape_string($term); 

//$qindex = strip_tags(substr($_POST['question_index'],0, 100));
//$qindex = mysql_escape_string($qindex);

$qindex=2;

if ($qindex<0){
	$qindex=1;
}

$sql = "SELECT `id`, `category`, `question_index`, `question`, `choices`, `answer`, `videos`, `wiki`, `wikicontent`, `concept`
FROM `Content` 
WHERE category = '$term'
order by `question_index` asc";

$result = mysql_query($sql);

$string = '';

$arr=array();
$first=0;

if (mysql_num_rows($result) > 0){
	?>
	<table border="1" cellspacing="2" cellpadding="2">
	<tr>
	<td><font face="Arial, Helvetica, sans-serif">ID</font></td>
	<td><font face="Arial, Helvetica, sans-serif">Category</font></td>
	<td><font face="Arial, Helvetica, sans-serif">Question_Index</font></td>
	<td><font face="Arial, Helvetica, sans-serif">Question</font></td>
	<td><font face="Arial, Helvetica, sans-serif">Choices</font></td>
	<td><font face="Arial, Helvetica, sans-serif">Answer</font></td>
	<td><font face="Arial, Helvetica, sans-serif">Videos</font></td>
	<td><font face="Arial, Helvetica, sans-serif">wiki</font></td>
	<td><font face="Arial, Helvetica, sans-serif">wikicontent</font></td>	
	<td><font face="Arial, Helvetica, sans-serif">concept</font></td>		
	</tr>
	
	<?php	
  while($row = mysql_fetch_object($result)){
  	if ($first==0){
  	$lastrow = $row;
  	$first=1;
  	}
	?>
		<tr>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $row->id; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $row->category; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $row->question_index; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $row->question; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $row->choices; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $row->answer; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $row->videos; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $row->wiki; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $row->wikicontent; ?></font></td>	
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $row->concept; ?></font></td>		
	</tr>
	
  	<?php
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


//echo json_encode($lastrow);


?>