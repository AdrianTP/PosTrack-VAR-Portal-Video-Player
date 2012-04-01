<?php	require('./php/getdir.php');?>
<html>
	<!--PosTrack VAR Portal Video Player
	Created for PosTrack Technologies, Inc. by Adrian Thomas-Prestemon.
	Copyright 2011 PosTrack Technologies, Inc.-->
	<head>
		<title>PosTrack University Video Player</title>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
		<meta name="viewport" content="width=device-width,user-scalable=0,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0"> 
		<link rel='stylesheet' type='text/css' href='./css/style.css' />
		<link rel='stylesheet' type='text/css' href='./css/html5reset.css' />
		<!--[if IE]><script type='text/javascript' src='http://html5shiv.googlecode.com/svn/trunk/html5.js'></script><![endif]-->
		<script type='text/javascript' src='./js/events.js'></script>
		<script type='text/javascript' src='./js/js.js'></script>
	</head>
	
	<body>
		
		<div id='container'>
			
			<header id='header'>
				
				<div id='menu'>
					
					<a href='#'><div id='menuButton'><span id='menuLabel'>Select Video</span><div id='circleButton'></div></div></a>
					
					<nav id='videoList'>
						
						<h1 class='hide'>Videos</h1>
						<?php	require('./php/generatelist.php');?>
						
					</nav>
					
				</div>
				
				<div id='title'><h1><span class='pos'>Pos</span><span class='track'>Track University</span> Video Player</h1></div>
				
			</header>
			
			<article id='player'>
				
				<h1 class='hide'>Player</h1>
				
				<!--Remove this section to cease accommodating Welcome.flv-->
				<!--<object type='application/x-shockwave-flash' width='640' height='480' id='flvPlayer'>
					<param name='allowFullScreen' value='true' />
					<param name='allowScriptAccess' value='always' /> 
					<param name='movie' value='OSplayer.swf?movie=video/Introduction.flv&btncolor=0x333333&accentcolor=0x31b8e9&txtcolor=0xdddddd&volume=30&autoload=on&autoplay=on&vTitle=blank&showTitle=no' />
					<param name='wmode' value='transparent' />
					<embed src='OSplayer.swf?movie=video/Introduction.flv&btncolor=0x333333&accentcolor=0x31b8e9&txtcolor=0xdddddd&volume=30&autoload=on&autoplay=on&vTitle=blank&showTitle=no' width='640' height='480' allowFullScreen='true' type='application/x-shockwave-flash' allowScriptAccess='always' />
					<img src='img/altimage.png' width='640' height='480' alt='' />
				</object>-->
				<!--End remove-->
				
				<div id='postrackLogo'></div>
				
				<div id='welcomeText'>Welcome.</div>
				
				<div id='chooseText'> Please select a video from the menu.</div>
				
			</article>
			
			<footer id='footer'>
				
				<h1><span id='nowPlaying'></span></h1>
				
			</footer>
			
		</div>
		
	</body>
	<script>
		Init();
	</script>
	
</html>
