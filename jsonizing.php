<html>
<head>
<script>
function handleClick(){
alert(test.value);
var obj = jQuery.parseJSON('{"name":"John"}');
alert( obj.name );
var array = jQuery.parseJSON(test.value);
alert( "array.a = " + array.a );

}
</script>
</head>
<body>
<?php
$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

echo json_encode($arr);
?>

<input type=text name=test id=test value=
<?php
$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

echo json_encode($arr);
?>
>
<input type=button name=clickme id=clickme onclick="javascript:handleClick();" value="Test JSON"/>

<hr>
<?php
$arr = array();
$arr[0]="0 value";
$arr[1]="1 value";

echo json_encode($arr);
?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js"></script>

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.js"><\/script>')</script>

</body>
</html>