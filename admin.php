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
				<li><a href="#tabs-1">Data Entry</a></li>
				<li><a href="#tabs-2">Other Settings</a></li>
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
			    	<p> Just a placeholder for the charts. Tab2
			    </div>
			    <div class="right" id="visualization2" style="width: 600px; height: 400px;">
			    	<p> Just a placeholder for the charts. Tab2
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
