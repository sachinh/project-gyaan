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

		<script src="/resources/demos/external/jquery.bgiframe-2.1.2.js"></script>

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
			$( "#dialog" ).hide();
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
//				alert("Correct Answer");
				$("#dialog").html("<p><b>Correct</b> Answer!</p>");
				$( "#dialog" ).dialog();
			}
			else{
				$("#dialog").html("<p>Wrong Answer!. Answer is: " + answer+".</p>");
				$( "#dialog" ).dialog();
//				alert("Wrong Answer!. Answer is: " + answer);
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
    .middle {
      width:55%;
      float:left;
    }
    .right {
      width:20%;
      float:right;
    }
    .contentcontainer {
    	height:350px;
    }
</style>

<!-- to add leaderboard -->
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['table']});
    </script>
    <script type="text/javascript">
    var visualization;
    var data;

    var options = {'showRowNumber': true};
    function drawVisualization() {
      // Create and populate the data table.
      var dataAsJson =
      {cols:[
        {id:'A',label:'Name',type:'string'},
        {id:'B',label:'Points',type:'number'},
        {id:'C',label:'Badge',type:'string'},
        {id:'D',label:'Last Logged In',type:'timeofday'}],
      rows:[
        {c:[{v:'Dave'},{v:159.0,f:'3005'},{v:'Coolness'},{v:[12,25,0,0],f:'12:25:00'}]},
      {c:[{v:'Peter'},{v:185.0,f:'3000'},{v:'Coolness'},{v:[13,15,0,0],f:'13:15:00'}]},
      {c:[{v:'John'},{v:145.0,f:'2500'},{v:'Smarty'},{v:[15,45,0,0],f:'15:45:00'}]},
      {c:[{v:'Moshes'},{v:198.0,f:'2450'},{v:'Smarty'},{v:[16,32,0,0],f:'16:32:00'}]},
      {c:[{v:'Karen'},{v:169.0,f:'2400'},{v:'Rad'},{v:[19,50,0,0],f:'19:50:00'}]},
      {c:[{v:'Phil'},{v:169.0,f:'2400'},{v:'Smarty'},{v:[18,10,0,0],f:'18:10:00'}]},
      {c:[{v:'Gori'},{v:159.0,f:'1900'},{v:'Smarty'},{v:[13,15,0,0],f:'13:15:00'}]},
      {c:[{v:'Bill'},{v:155.0,f:'1890'},{v:'Rad'},{v:[7,40,48,0],f:'7:40:48'}]},
      {c:[{v:'Valery'},{v:199.0,f:'1500'},{v:'Smarty'},{v:[6,0,0,0],f:'6:00:00'}]},
      {c:[{v:'Joey'},{v:187.0,f:'1400'},{v:'Newbie'},{v:[5,2,24,0],f:'5:02:24'}]},
      {c:[{v:'Karen'},{v:190.0,f:'1350'},{v:'Newbie'},{v:[6,14,24,0],f:'6:14:24'}]},
      {c:[{v:'Jin'},{v:169.0,f:'1200'},{v:'Rad'},{v:[5,45,36,0],f:'5:45:36'}]},
      {c:[{v:'Gili'},{v:178.0,f:'178'},{v:'Newbie'},{v:[6,43,12,0],f:'6:43:12'}]},
      {c:[{v:'Harry'},{v:172.0,f:'172'},{v:'Newbie'},{v:[6,14,24,0],f:'6:14:24'}]},
      {c:[{v:'Handerson'},{v:175.0,f:'175'},{v:'Newbie'},{v:[6,57,36,0],f:'6:57:36'}]},
      {c:[{v:'Vornoy'},{v:170.0,f:'170'},{v:'Newbie'},{v:[13,12,0,0],f:'13:12:00'}]}]};
      data = new google.visualization.DataTable(dataAsJson);
    
      // Set paging configuration options
      // Note: these options are changed by the UI controls in the example.
      options['page'] = 'enable';
      options['pageSize'] = 10;
      options['pagingSymbols'] = {prev: 'prev', next: 'next'};
      options['pagingButtonsConfiguration'] = 'auto';
    
      // Create and draw the visualization.
      visualization = new google.visualization.Table(document.getElementById('table'));
      draw();
    }
    
    function draw() {
      visualization.draw(data, options);
    }
    

    google.setOnLoadCallback(drawVisualization);

    // sets the number of pages according to the user selection.
    function setNumberOfPages(value) {
      if (value) {
        options['pageSize'] = parseInt(value, 10);
        options['page'] = 'enable';
      } else {
        options['pageSize'] = null;
        options['page'] = null;  
      }
      draw();
    }

    // Sets custom paging symbols "Prev"/"Next"
    function setCustomPagingButtons(toSet) {
      options['pagingSymbols'] = toSet ? {next: 'next', prev: 'prev'} : null;
      draw();  
    }

    function setPagingButtonsConfiguration(value) {
      options['pagingButtonsConfiguration'] = value;
      draw();
    }
    
    </script>
												
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
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Change Mode<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.html">Student Mode</a></li>
                                    <li><a href="parent.php">Parent Mode</a></li>
                                </ul>
                            </li>                                                        
                            <li><a href="#about">About Gyaan</a></li>
                            <li><a href="mailto:talk.to@truvelabs.com">Contact Us</a></li>
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

<!--
Not really needed now since we are just going to display the default view.
Eventually, we'll need this to navigate the tree auto to the point selected in the launchpad

<p>Visiting Concept Detail from: 
<?php
$term="default value";
$term = strip_tags(substr($_POST['which_topic'],0, 100));

echo $term;
?>
</p>
-->
	<form id="locateContent" method="post" action="locateContent.php" > 
		<input type="hidden" name="category" id="category" value=""/> 
		<input type="hidden" name="question_index" id="question_index" value="-1"/> 
	</form> 
	<input type="hidden" name="content" id="content" value="default content"/> 
			
	<div class="pagecontainer">
		<div class="left">
<!--
Not really needed now since we are just going to display the default view.
Eventually, we'll need this to allow user context and navigation ease
			<h2>Breadcrumbs here</h2>-->
			
				<div class="demo">
	
					<div id="accordion">
						<h3><a href="#">Learn By Topic</a></h3>
						<div>
							<div id="accordion1sub">
									<h3><a href="#">Arithmetic</a></h3>
										<div>
											<p><a id="a_link" class="Arithmetic" href="#" title="true_link">Click here to see the Arithmetic Content</a></p>
										</div>
									<h3><a href="#">Science</a></h3>
										<div>
											<p>Not Yet Implemented</p>
										</div>
									<h3><a href="#">Physics</a></h3>
										<div>
											<p>Not Yet Implemented</p>
										</div>
							</div>	
						</div>
						
						<h3><a href="#">Learn By Grade Level</a></h3>
						<div>
							<div id="accordion2sub">
									<h3><a href="#">Grade 1</a></h3>
										<div>
											<p>Not Yet Implemented</p>
										</div>
									<h3><a href="#">Grade 2</a></h3>
										<div>
											<p>Not Yet Implemented</p>
										</div>
									<h3><a href="#">Grade 3</a></h3>
										<div>
											<p>Not Yet Implemented</p>
										</div>
							</div>	
						</div>
						
						<h3><a href="#">Learn By Interests</a></h3>
						<div>
							<div id="accordion3sub">
									<h3><a href="#">Logic</a></h3>
										<div>
											<p><a class="Logic" href="#" title="true_link">Click here to see the Logic Content</a></p>
										</div>
									<h3><a href="#">Puzzlers</a></h3>
										<div>
											<p><a class="Puzzler" href="#" title="true_link">Click here to see the Puzzlers Content</a></p>											
										</div>
									<h3><a href="#">Critical Thinking</a></h3>
										<div>
											<p><a class="Critical Thinking" href="#" title="true_link">Click here to see the Critical Thinking Content</a></p>
										</div>
							</div>	
						</div>
						
					</div>
					
					</div><!-- End demo -->
				</div>
		</div>		
		
		<div class="middle">
<!--
Not really needed now since we are just going to display the default view.
			<h2>Placeholder only!</h2>-->
			
			<div id="tabs">
				<ul>
					<li><a href="#tabs-1">Exercise</a></li>
					<li><a href="#tabs-2">Concept</a></li>
					<li><a href="#tabs-3">Videos</a></li>
					<li><a href="#tabs-4">Wikipedia</a></li>
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
		</div>
		<div class="right">
			<h5>Leaderboard</h5>
			<div id="table">Test stuff</div>
		</div>
	</div>

	</div>

<hr>

<div id="dialog" title="Answer Check">
    <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
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
