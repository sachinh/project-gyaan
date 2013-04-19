<html> 
<head> 
<title>Welcome to the Concept Detail Screen!</title> 

</head> 

<body> 
<h1>Test Page for now</h1> 
<p>
<?php
$term="default value";
$term = strip_tags(substr($_POST['which_topic'],0, 100));

echo $term;
?>
</p>
</body> 
</html> 