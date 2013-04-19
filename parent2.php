<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <title></title>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css" />

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>

		<script type="text/javascript">
		$(function() {
			$("#accordion,#accordion1sub,#accordion2sub,#accordion3sub").accordion({
				collapsible: true
				
			});
	
	
		});
		
		$(function() {
        	$( "#tabs" ).tabs();
    	});

$(document).ready(function() {
   $("a").click(function() {
     var category=$(this).attr("class");
	var $attrib=$(this).attr("title");
	if (typeof $attrib === "undefined") {
		// this means that the navigation is coming from the widgets only and not from an actual link - do nothing
	}
   	else{
   		// true link so actually process click
		changeContent(category,-1);
   		}
   		
   });
   
	$("#nextbutton").click(function() {

	// setup info from fields
	var category=$("#category").val();
	var qindex=$("#question_index").val();
	
	// first test the answer
	testAnswer();
	// now go to the next question
     changeContent(category,qindex);
   });

	//invoke the arithmeticv click the first time;
	$("#a_link").click();
	
 });
 
		$('#arithmetic_link').click(function(e) {
			e.preventDefault();
			// handling arithmetic link
			return false;
		});

		function changeContent(categoryValue,qindex){
			var valTabs=$(	"#tabs-1"	).html();
			
			//update the category
			$("#category").val(categoryValue);

			qindex=parseInt(qindex);
			if (qindex>0){
				qindex=qindex+1;
			}
			$("#question_index").val(qindex);
			
			// dispatch the form
			$.post("./locateContents.php", {category : categoryValue, question_index : qindex}, function(data){
			   if (data.length>0){ 
				 var $row = jQuery.parseJSON(data);
				 // put the content into the fields
				 $("#question").html($row.question);			
				 $("#question_index").val($row.question_index);

				 $("#choices").val($row.choices);
				 $("#answer").val($row.answer);
				 $choices=$row.choices;
				 var desired = $row.choices.split('~');
				 
				 $space=" ";
				 // now put it in the real fields for choices
				 $("#choiceavalue").html($space+desired[0]);
				 $("#choicebvalue").html($space+desired[1]);
				 $("#choicecvalue").html($space+desired[2]);
				 $("#choicedvalue").html($space+desired[3]);

				 $("#content").val(data);
				 				 
				 var $wikicontent=$row.wikicontent;
				 $("#wiki").html($wikicontent);
				 
				 //also set the related wikilink for completeness
				 $("#wikilink").prop("href",$row.wiki);
				 
				 var $concept=$row.concept;
				 $("#concept").html($concept);
				 				 
				 var $video=$row.videos;
				$("#youtube-player").prop("src","http://www.youtube.com/embed/JW5meKfy3fY");
				
				 if ($video!=""){
				var $yt_stem="http://www.youtube.com/embed/";
				$("#youtube-player").prop("src",$yt_stem+$video);
				 }
				 
			   } 
			   else{
			   	alert('no data');
			   }
			})
			
		}
				
		function testAnswer(){
			var choice = $('input:radio[name=choice]:checked').val();
			var answer=$("#answer").val();
			if(choice==answer){
				alert("Correct Answer");
			}
			else{
				alert("Wrong Answer!. Answer is: " + answer);
			}
			$('input:radio[name=choice]').prop('checked', false);
		}
		
		</script>
		
		<style type="text/css">

		#accordion .ui-widget-content {height:45%}

		.ui-accordion {font-size:.9em}
		#accordion1sub .ui-widget-content {height:100px}
		#accordion2sub .ui-widget-content {height:100px}
		#accordion3sub .ui-widget-content {height:100px}

		</style>

<style type="text/css">
    .pagecontainer {
      width:100%;
    }
    .left {
      width:25%;
      float:left;
    }
    .right {
      width:75%;
      float:right;
    }
    .contentcontainer {
    	height:350px;
    }
</style>
		
    <script>
    $(function() {
        $( "#menu" ).menu();
    });
    </script>
    <style>
    .ui-menu { 
    	width: 150px;
    	}
    </style>
												
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->


        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="index.html">Project Gyaan</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="index.html">Home</a></li>
                            <li><a href="#about">About Gyaan</a></li>
                            <li><a href="mailto:talk.to@truvelabs.com">Contact Us</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Nav header</li>
                                    <li><a href="#">Separated link</a></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form pull-right">
                            <input class="span2" type="text" placeholder="Email">
                            <input class="span2" type="password" placeholder="Password">
                            <button type="submit" class="btn">Sign in</button>
                        </form>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

	<form id="locateContent" method="post" action="locateContent.php" > 
		<input type="hidden" name="category" id="category" value=""/> 
		<input type="hidden" name="question_index" id="question_index" value="-1"/> 
	</form> 
	<input type="hidden" name="content" id="content" value="default content"/> 

	<hr>

		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Overview for the Hollister family</a></li>
				<li><a href="#tabs-2">John H.</a></li>
				<li><a href="#tabs-3">Sam H.</a></li>
				<li><a href="#tabs-4">Jane H.</a></li>
			</ul>
			<div id="tabs-1">
				<div class="contentcontainer">
					<label name="questionlabel"><b>Question</b></label>
					<label name="question" id="question">Some Question Text will go here</label>
					<input type=hidden name="choices" id="choices" value="Hidden later"/>
					<input type=hidden name="answer" id="answer" value="Hidden later"/>
					<label><b>The Answer is:</b></label>
					<fieldset>
					<input type=radio name="choice" value="a"><span id=choiceavalue> Option a</span></input><br/>
					<input type=radio name="choice" value="b"><span id=choicebvalue> Option b</span></input><br/>
					<input type=radio name="choice" value="c"><span id=choicecvalue> Option c</span></input><br/>
					<input type=radio name="choice" value="d"><span id=choicedvalue> Option d</span></input><br/>
					</fieldset>

					<br/>
					<input type=button id="nextbutton" name="next" id="next" value="Next"></input>
				</div>
			</div>
			<div id="tabs-2">
				<div id="concept" class="contentcontainer">
				<p>Will display the related content from Concept here</p>
				</div>
			</div>
			<div id="tabs-3">
				<div class="contentcontainer">
					<iframe id="youtube-player" class="youtube-player" type="text/html" width="640" height="365" src="" frameborder="0">
					</iframe>
				</div>
			</div>
			<div id="tabs-4">
				<figure>
				<div id="wiki" class="contentcontainer">
				<p>Will display the related content from Wikipedia here</p>
				</div>
				<figcaption>Click <a id="wikilink" href="#" target="_blank">here</a> for the complete Wikipedia article</figcaption>
				</figure>
			</div>

		</div>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>

    </body>
</html>
