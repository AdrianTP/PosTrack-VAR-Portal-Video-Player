function Change_Video(folder,file,ext)
{
	var filename = file.replace(/_/g,' ');
	
	var filepath = 'video/' + folder + '/' + file + '.' + ext;
	
	var embed  = "<object type='application/x-shockwave-flash' width='640' height='480' id='flvPlayer'>";
		embed += "	<param name='allowFullScreen' value='true' />";
		embed += "	<param name='allowScriptAccess' value='always' />"; 
		embed += "	<param name='movie' value='OSplayer.swf?movie=" + filepath + "&btncolor=0x333333&accentcolor=0x31b8e9&txtcolor=0xdddddd&volume=30&autoload=on&autoplay=off&vTitle=title&showTitle=no' />";
		embed += "	<param name='wmode' value='transparent' />";
		embed += "	<embed src='OSplayer.swf?movie=" + filepath + "&btncolor=0x333333&accentcolor=0x31b8e9&txtcolor=0xdddddd&volume=30&autoload=on&autoplay=off&vTitle=title&showTitle=no' width='640' height='480' allowFullScreen='true' type='application/x-shockwave-flash' allowScriptAccess='always' />";
		embed += "	<img src='img/altimage.png' width='640' height='480' alt='' />";
		embed += "</object>";
		
	var altembed  = "<object type='application/x-shockwave-flash' width='640' height='480' id='flvPlayer'>";
		altembed += "	<param name='allowFullScreen' value='true' />";
		altembed += "	<param name='allowScriptAccess' value='always' />";
		altembed += "	<param name='movie' value='flvplayer.swf' />";
		altembed += "	<param name='quality' value='high' />";
		//altembed += "	<param name='salign' value='tl' />";
		//altembed += "	<param name='bgcolor' value='#ffffff' />";
		altembed += "	<param name='wmode' value='transparent' />";
		altembed += "	<param id='test1' NAME=FlashVars VALUE='file=" + filepath + "'>";
		altembed += "	<embed id='test2' src='flvplayer.swf' FlashVars='file=" + filepath + "' quality='high' salign='tl' bgcolor='#ffffff' width='640' height='480' name='fullscreen' align='middle' allowScriptAccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' />";
		altembed += "	<img src='img/altimage.png' width='640' height='480' alt='' />";
		altembed += "</object>"
	
	document.getElementById('player').innerHTML = embed;
	
	//document.getElementById('player').innerHTML = "<object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' codebase='http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0' width='640' height='480' id='fullscreen' align='middle'> <param name='allowScriptAccess' value='sameDomain' /> <param name='movie' value='flvplayer.swf' /> <param name='quality' value='high' /> <param name='salign' value='tl' /> <param name='bgcolor' value='#ffffff' /> <param name='wmode' value='transparent' /><param id='test1' NAME=FlashVars VALUE='file=video/" + folder + "/" + file + "." + ext + "'> <embed id='test2' src='flvplayer.swf' FlashVars='file=video/" + folder + "/" + file + "." + ext + "' quality='high' salign='tl' bgcolor='#ffffff' width='640' height='480' name='fullscreen' align='middle' allowScriptAccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' /> </object>";
	document.getElementById('nowPlaying').innerHTML = "Now Playing: " + folder + " > " + filename;
}

var elems;
function Hide_All_UL()
{
	elems = document.getElementsByTagName('ul');
	for (var i = 0; i < elems.length; i++)
	{
		var temp_name = 'list' + i;//(i+1); // remove +1 to cease accommodating Welcome.flv
		document.getElementById(temp_name).style.display = 'none';
	}
}

function Show_UL(id)
{
	Hide_All_UL();
	document.getElementById(id).style.display = 'block';
}

var menu,
	welcome_anim,
	interval,
	interval2,
	postrack_logo,
	welcome_text,
	choose_text;

function Init()
{
	menu = document.getElementById('menu');
	menu.onmouseover = function onmouseover() {document.getElementById('videoList').style.display = 'block';document.getElementById('circleButton').style.backgroundImage = "url('./img/clicked_button.png')";};
	menu.onselectstart = function onselectstart() {return false;};
	menu.ondragstart = function ondragstart() {return false;};
	menu.onmouseout = function onmouseout() {document.getElementById('videoList').style.display = 'none';document.getElementById('circleButton').style.backgroundImage = "url('./img/circle_button.png')";};
	
	Hide_All_UL();
	welcome_anim = new Welcome_Animation();
	interval2 = setInterval("welcome_anim.Anim_1();",50);
	//Start_Anim();
}

function Animate()
{
	//welcome_anim.Logo_Bounce();
	welcome_anim.Fade_In();
}

function Start_Anim()
{
	//interval = setInterval("welcome_anim.Logo_Bounce();",1000/60);
	interval2 = setInterval("welcome_anim.Fade_1();",50);
}

function Stop_Anim()
{
	//clearInterval(interval);
}

function Welcome_Animation()
{
	this.screen_width = 640;
	this.screen_height = 480;
	this.width = 294;
	this.height = 65;
	this.x = 320 - (this.width / 2);
	this.y = 240 - (this.height / 2);
	this.dx = -1;
	this.dy = 1;
	
	this.welcome_o = 0;
	this.welcome_ox = 1;
	this.welcome_x = 200;
	this.welcome_y = 0;
	this.welcome_dx = 0.5;
	this.welcome_dy = 0;
	
	this.choose_o = 0;
	this.choose_ox = 1;
	this.choose_x = 120;
	this.choose_y = 300;
	this.choose_dx = -0.5;
	this.choose_dy = 0;
	
	postrack_logo = document.getElementById('postrackLogo');
	postrack_logo.style.width = this.width;
	postrack_logo.style.height = this.height;
	postrack_logo.style.left = this.x;
	postrack_logo.style.top = this.y;
	
	welcome_text = document.getElementById('welcomeText');
	choose_text = document.getElementById('chooseText');
	
	this.Anim_1 = function()
	{
		welcome_text.style.display = 'block';
		welcome_text.style.opacity = this.welcome_o/100;
		welcome_text.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity=" + this.welcome_o + ")"; /* IE 8 */
		welcome_text.style.filter = "alpha(opacity=" + this.welcome_o + ")"; /* IE 4, 5, 6 and 7 */
		welcome_text.style.left = this.welcome_x;
		
		this.welcome_o += this.welcome_ox;
		this.welcome_x += this.welcome_dx;
		
		if (this.welcome_o >= 100)
		{
			this.welcome_ox = -this.welcome_ox;
		}
		else if (this.welcome_o <= 0)
		{
			welcome_text.style.display = 'none';
			clearInterval(interval2);
			interval2 = setInterval("welcome_anim.Anim_2();",50);
		}
		
		//console.log(this.welcome_o);
	}
	
	this.Anim_2 = function()
	{
		choose_text.style.display = 'block';
		choose_text.style.opacity = this.choose_o/100;
		choose_text.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity=" + this.choose_o + ")"; /* IE 8 */
		choose_text.style.filter = "alpha(opacity=" + this.choose_o + ")"; /* IE 4, 5, 6 and 7 */
		choose_text.style.left = this.choose_x;
		
		this.choose_o += this.choose_ox;
		this.choose_x += this.choose_dx;
		
		if (this.choose_o >= 100)
		{
			this.choose_ox = -this.choose_ox;
		}
		else if (this.choose_o <= 0)
		{
			choose_text.style.display = 'none';
			clearInterval(interval2);
			//interval = setInterval("welcome_anim.Logo_Bounce();",1000/60);
		}
		
		//console.log(this.choose_o);
	}
	
	this.Logo_Bounce = function()
	{
		this.x += this.dx;
		
		if (this.x <= 0)
		{
			this.dx = -this.dx;
		}
		else if (this.x >= 640 - this.width)
		{
			this.dx = -this.dx;
		}
		
		this.y += this.dy;
		if (this.y <= 0)
		{
			this.dy = -this.dy;
		}
		else if (this.y >= 480 - this.height)
		{
			this.dy = -this.dy;
		}
		
		postrack_logo.style.left = this.x;
		postrack_logo.style.top = this.y;
	}
	
	
}
