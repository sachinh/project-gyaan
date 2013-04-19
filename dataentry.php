<?php /*
Copyright (c) 2007, Gur� Sistemas and/or Gustavo Adolfo Arcila Trujillo
All rights reserved.
www.gurusistemas.com

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

    * Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
    * Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer
	  in the documentation and/or other materials provided with the distribution.
    * Neither the name of the Gur� Sistemas Intl nor Gustavo Adolfo Arcila Trujillo nor the names of its contributors may be used to
	  endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS  "AS IS"  AND ANY EXPRESS  OR  IMPLIED WARRANTIES, INCLUDING, 
BUT NOT LIMITED TO,  THE IMPLIED WARRANTIES  OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.  IN NO EVENT
SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT,  INDIRECT,  INCIDENTAL, SPECIAL, EXEMPLARY,  OR CONSEQUENTIAL 
DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF  USE, DATA, OR PROFITS;  OR BUSINESS 
INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE 
OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. 

Please remember donating is one way to show your support, copy and paste in your internet browser the following link to make your donation
https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=tavoarcila%40gmail%2ecom&item_name=phpMyDataGrid%202007&no_shipping=0&no_note=1&tax=0&currency_code=USD&lc=US&bn=PP%2dDonationsBF&charset=UTF%2d8

For more info, samples, tips, screenshots, help, contact, forum, please visit phpMyDataGrid site  
http://www.gurusistemas.com/indexdatagrid.php

For contact author: tavoarcila at gmail dot com or info at gurusistemas dot com
*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>phpMyDatagrid - Sample file</title>

<?php

	include ("phpmydatagrid.class.php");
	
	$objGrid = new datagrid;
	
	$objGrid -> friendlyHTML();

	$objGrid -> pathtoimages("./images/");

	$objGrid -> closeTags(true);  
	
	$objGrid -> form('educontent', true);
	
	$objGrid -> methodForm("post"); 
	
	$objGrid -> total("salary,workeddays");
	
	$objGrid -> searchby("id,category");
	
	$objGrid -> linkparam("sess=".$_REQUEST["sess"]."&username=".$_REQUEST["username"]);	 
	
	$objGrid -> decimalDigits(2);
	
	$objGrid -> decimalPoint(",");
	
//	$objGrid -> conectadb("localhost", "root", "root", "test");
	
	//To connect with the AWS DB instance directly
	$objGrid -> conectadb("localhost", "root", "root", "test");
		
	$objGrid -> tabla ("educontent");

	$objGrid -> buttons(true,true,true,true);
	
	$objGrid -> keyfield("id");

	$objGrid -> salt("Some Code4Stronger(Protection)");

	$objGrid -> TituloGrid("phpMyDataGrid Sample page");

	$objGrid -> FooterGrid("<div style='float:left'>&copy; 2007 Gurusistemas.com</div>");

	$objGrid -> datarows(5);
	
	$objGrid -> paginationmode('links');

//	$objGrid -> orderby("category", "DESC");

	$objGrid -> noorderarrows();
	
	$objGrid -> FormatColumn("id", "ID", 5, 5, 1, "50", "center", "integer");
	$objGrid -> FormatColumn("edusystem", "Educational System", 30, 30, 0, "150", "left","select:0_All:1_India:2_Singapore:3_Finland");
	
	$objGrid -> FormatColumn("grade", "Grade", 30, 30, 0, "150", "left","select:1_Grade1:2_Grade2:3_Grade3:4_Grade4:5_Grade5");
	
	/* Text Links: Displaying a text link is only available to show values stored in fields */
	/* Note: inputtype must be set to 4 */
	$objGrid -> FormatColumn("subject","Subject", 50, 50,0,100,"left","select:1_Math:2_Science:3_Logic");	

	$objGrid -> FormatColumn("chapterno", "Chapter No", 30, 30, 0, "150", "left","select:1_Chapter1:2_Chapter2:3_Chapter3:4_Chapter4:5_Chapter5");
	$objGrid -> FormatColumn("chaptername", "Chapter Name", 50, 50, 0, "50", "right");
	
	$objGrid -> FormatColumn("topicno", "Topic No", 30, 30, 0, "150", "left","select:1_Topic1:2_Topic2:3_Topic3:4_Topic4:5_Topic5");
	$objGrid -> FormatColumn("topicname", "Topic Name", 100, 100, 0, "100", "center");

	$objGrid -> FormatColumn("category", "Category", 5, 5, 0, "60", "left");

	$objGrid -> FormatColumn("question_index", "Question No.", 2, 2, 0,"300", "center", "integer");
	$objGrid -> FormatColumn("question", "Question", 2, 2, 0,"300", "center");
	$objGrid -> FormatColumn("choices", "Choices", 10, 10, 0, "200", "left");  
	$objGrid -> FormatColumn("answer", "Answer", 5, 2, 0, "50", "right");

//	$objGrid -> FormatColumn("videos", "Videos", 5, 2, 0, "125", "right");


	/* Dynamic image: Displaying an image link with a value stored in a field */
	/* Note: The %s in the image name will be replaced by the selected field, in this example by photo field */
	$objGrid -> FormatColumn("artwork","Art Work", "25", "0","0","150","center","imagelink:images/%s:updatepicture(%s%s%s),id,name,lastname");	

	/* Static image: Displaying an image link with an unique name */
	/* Note: inputtype must be set to 3 */
	// $objGrid -> FormatColumn("image_1","Img", "25", "0", "3","20","center","imagelink:images/money.png:updatepicture(%s%s%s),id,name,lastname");	

	$objGrid -> where ("question_index > '1'");

	$objGrid -> setHeader();
?>

<!-- /* Sample Script to execute when user click over the photo link */ -->
<script type="text/javascript">
	function updatepicture(	code, name, lastname ){
		alert ("SAMPLE SCRIPT\n\nHere must go a process to update the picture or something else for:\n\nRecord ID:"+code+
				"\nName: "+ name +
				"\nLast name: "+ lastname );
	}
</script>
</head>

<body>
<?php 
	$objGrid -> ajax("silent");

	$objGrid -> grid();
	
	$objGrid -> desconectar();
?>
</body>
</html>
