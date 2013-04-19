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
        	$( "#tabs" ).tabs();
    	});
   	
		</script>
		
<style type="text/css">
    .pagecontainer {
      width:100%;
    }
    .left {
      width:50%;
      float:left;
    }
    .right {
      width:50%;
      float:right;
    }
    .contentcontainer {
    	height:350px;
    }
</style>
		
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <script type="text/javascript">
      function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
          ['Child', 'Math', 'Science', 'Logic', 'Critical Thinking'],
          ['John H.',  10,    5,    6,   2],
          ['Sam H.',  6,    4,    8,   5],
          ['Jane H.',  8,    7,    2,    10]
        ]);

/*
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Austria', 'Bulgaria', 'Denmark', 'Greece'],
          ['2003',  1336060,    400361,    1001582,   997974],
          ['2004',  1538156,    366849,    1119450,   941795],
          ['2005',  1576579,    440514,    993360,    930593],
          ['2006',  1600652,    434552,    1004163,   897127],
          ['2007',  1968113,    393032,    979198,    1080887],
          ['2008',  1901067,    517206,    916965,    1056036]
        ]);
*/
      
        // Create and draw the visualization.
        new google.visualization.ColumnChart(document.getElementById('visualization')).
            draw(data,
                 {title:"Usage Patterns by Child",
                  width:600, height:400,
                  vAxis: {title: "Child"},
                  hAxis: {title: "Time Spent"}}
            );
            
        //now draw the pie chart to display no. of questions taken that were answered correctly
	  // Create and populate the data table.
	  var data = google.visualization.arrayToDataTable([
		['Student', 'Questions Answered Correctly'],
		['John', 51],
		['Sam', 34],
		['Jane', 67]
	  ]);
	
	  // Create and draw the visualization.
	  new google.visualization.PieChart(document.getElementById('visualization-pie')).
		  draw(data, {title:"Questions Answered Correctly"});        

	// -------------- for 1st Child i.e. tab2 --------------------------------------------

	//now draw the pie chart to display usage for every topic
	// Create and populate the data table.
	  var data2 = google.visualization.arrayToDataTable([
		['Topic', 'Time Spent (in mins)'],
		['Math', 51],
		['General Science', 34],
		['Physics', 67],
		['Chemistry', 24],
		['Biology', 52]
	  ]);

	  // Create and draw the visualization.
	  new google.visualization.PieChart(document.getElementById('visualization-pie2')).
		  draw(data2, {title:"Breakdown of Time Spent by John"});        

	 // Create and populate the data table.
     var data2 = google.visualization.arrayToDataTable([
          ['Topic', 'Total Attempted', 'Answered Correctly', 'Answered Wrong'],
          ['Math',  50,    30,    20],
          ['General Science',  15,    9,    6],
          ['Physics',  10,    7,    3],
          ['Chemistry',  20,    17,    3],
          ['Biology',  15,    7,    8]
        ]);
      
	// Create and draw the visualization.
    new google.visualization.ColumnChart(document.getElementById('visualization2')).
            draw(data2,
                 {title:"How well did John do?",
                  width:600, height:400,
                  hAxis: {title: "Topic"},
                  vAxis: {title: "Questions Attempted"}}
            );

	// -------------- for 2nd Child i.e. tab3 --------------------------------------------

	//now draw the pie chart to display usage for every topic
	// Create and populate the data table.
	  var data2 = google.visualization.arrayToDataTable([
		['Topic', 'Time Spent (in mins)'],
		['Math', 31],
		['General Science', 44],
		['Physics', 37],
		['Chemistry', 14],
		['Biology', 32]
	  ]);

	  // Create and draw the visualization.
	  new google.visualization.PieChart(document.getElementById('visualization-pie3')).
		  draw(data2, {title:"Breakdown of Time Spent by Sam"});        

	 // Create and populate the data table.
     var data2 = google.visualization.arrayToDataTable([
          ['Topic', 'Total Attempted', 'Answered Correctly', 'Answered Wrong'],
          ['Math',  30,    20,    10],
          ['General Science',  25,    19,    6],
          ['Physics',  20,    17,    3],
          ['Chemistry',  30,    17,    13],
          ['Biology',  25,    17,    8]
        ]);
      
	// Create and draw the visualization.
    new google.visualization.ColumnChart(document.getElementById('visualization3')).
            draw(data2,
                 {title:"How well did Sam do?",
                  width:600, height:400,
                  hAxis: {title: "Topic"},
                  vAxis: {title: "Questions Attempted"}}
            );

	// -------------- for 3rd Child i.e. tab4 --------------------------------------------

	//now draw the pie chart to display usage for every topic
	// Create and populate the data table.
	  var data2 = google.visualization.arrayToDataTable([
		['Topic', 'Time Spent (in mins)'],
		['Math', 41],
		['General Science', 54],
		['Physics', 27],
		['Chemistry', 74],
		['Biology', 22]
	  ]);

	  // Create and draw the visualization.
	  new google.visualization.PieChart(document.getElementById('visualization-pie4')).
		  draw(data2, {title:"Breakdown of Time Spent by Jane"});        

	 // Create and populate the data table.
     var data2 = google.visualization.arrayToDataTable([
          ['Topic', 'Total Attempted', 'Answered Correctly', 'Answered Wrong'],
          ['Math',  20,    10,    10],
          ['General Science',  5,    2,    3],
          ['Physics',  15,    7,    8],
          ['Chemistry',  40,    17,    23],
          ['Biology',  5,    2,    3]
        ]);
      
	// Create and draw the visualization.
    new google.visualization.ColumnChart(document.getElementById('visualization4')).
            draw(data2,
                 {title:"How well did Jane do?",
                  width:600, height:400,
                  hAxis: {title: "Topic"},
                  vAxis: {title: "Questions Attempted"}}
            );

      }
      

      google.setOnLoadCallback(drawVisualization);
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

		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Overview for the Hollister family</a></li>
				<li><a href="#tabs-2">John H.</a></li>
				<li><a href="#tabs-3">Sam H.</a></li>
				<li><a href="#tabs-4">Jane H.</a></li>
			</ul>
			<div id="tabs-1">
			    <div class="left" id="visualization" style="width: 600px; height: 400px;">
			    	<p> Just a placeholder for the charts.
			    </div>
			    <div class="right" id="visualization-pie" style="width: 600px; height: 400px;">
			    	<p> Just a placeholder for the charts.
			    </div>
			</div>
			<div id="tabs-2">
			    <div class="left" id="visualization-pie2" style="width: 600px; height: 400px;">
			    	<p> Just a placeholder for the charts.
			    </div>
			    <div class="right" id="visualization2" style="width: 600px; height: 400px;">
			    	<p> Just a placeholder for the charts.
			    </div>
			</div>
			<div id="tabs-3">
			    <div class="left" id="visualization-pie3" style="width: 600px; height: 400px;">
			    	<p> Just a placeholder for the charts.
			    </div>
			    <div class="right" id="visualization3" style="width: 600px; height: 400px;">
			    	<p> Just a placeholder for the charts.
			    </div>
			</div>
			<div id="tabs-4">
			    <div class="left" id="visualization-pie4" style="width: 600px; height: 400px;">
			    	<p> Just a placeholder for the charts.
			    </div>
			    <div class="right" id="visualization4" style="width: 600px; height: 400px;">
			    	<p> Just a placeholder for the charts.
			    </div>
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
