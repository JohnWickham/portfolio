<!doctype html>
<html>

<head>

<!-- These links attach icons for iOS devices to use as the favicon image. -->
	<link rel="apple-touch-icon" sizes="76x76" href="Images/Icon_76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="Images/Retina_Icon_114.png">
	<link rel="apple-touch-icon" sizes="114x114" href="Images/Retina_Icon_120.png">
	<link rel="apple-touch-icon" sizes="114x114" href="Images/Retina_Icon_152.png">
	
	<title>John Wickham.Write</title>
	<meta charset="UTF-8">
	<meta name="description" content=" .Write is John Wickham's blog about his learning experiences as a young professional.">
	<meta name="keywords" content="Wickham,WJWickham,WWickham,.write,dotwrite,dot write,blog,portfolio,John Wickham,web design,app,development,ios,iOS,javascript,jquery">
	<meta name="author" content="John Wickham">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://demos.flesler.com/jquery/scrollTo/js/jquery.scrollTo-min.js?1.4.11"></script>
	<script src="https://code.jquery.com/color/jquery.color-2.1.2.js"></script>
	<script type="text/javascript" src="https://wjwickham.com/Rotate.js"></script>

	<script type="text/javascript">
			
		function viewDidLoad() {
			
			toggleAccentFade();
			
		}
			
		function toggleAccentFade() {
			
			$("#imageAccent").fadeToggle("swing", function(){
				toggleAccentFade();
			});
			
		}
			
	</script>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	
</head>
	
<style>

	body {
		background: white;
		color: #343747;
		
		-webkit-tap-highlight-color: rgba(0,0,0,0);
		
		text-align:center;
		margin-top:50px;
		margin-left: 0px;
		margin-right: 0px;
	}
	
	.UISeparatorView {
		
		height: 1px;
		width: 80%;
		margin: auto auto;
		
		background: rgba(0,0,0,0.15);
		
	}
	
	.UIPostContainer {
	
		position: relative;
		overflow: hidden;
		width: 70%;
		max-width: 900px;
		left: 15%;
						
	}
	
	.UIPreviewContainer {
		
		width: 80%;
		padding-left: 10%;
		
		padding-top: 30px;
		border-left: 0px solid transparent;
	
		overflow: hidden;
		
		/*Control state animations*/
		transition-property: border-left;
	  	transition-duration: 0.15s;
		transition-timing-function:linear;
		
		-webkit-transition-property: border-left;
	  	-webkit-transition-duration: 0.15s;
		-webkit-transition-timing-function:linear;
		
		-moz-transition-property: border-left;
	  	-moz-transition-duration: 0.15s;
		-moz-transition-timing-function:linear;
		
		-o-transition-property: border-left;
	  	-o-transition-duration: 0.15s;
		-o-transition-timing-function:linear;
		
		-webkit-touch-callout: none;
		-webkit-user-select: none;
						
	}
	
	.UIPreviewContainer:last-child {
		
		background: white;
		
	}
	
	.UIPreviewContainer:hover {
		
		border-left: 5px solid #e06841;
		cursor: pointer;
					
	}
	
	.UIDetailsContainer {
		
		width: 100%;
								
	}
	
	h1 {
		
		font-family: -apple-system, "HelveticaNeue", "Helvetica", "Arial", sans-serif;
		font-weight: 400;
		font-size: 15px;
		color: rgba(0,0,0,0.30);
		
		margin-bottom: 50px;
		
	}
	
	h2 {
		
		font-family: -apple-system, "Helvetica", "Arial", sans-serif;
		font-weight: 400;
		font-size: 25px;
		text-align: left;
					
		color: #e06841;
		
		width: 100%;	
		float: left;		
		margin-left: 0px;
		margin-bottom: 10px;
					
	}
	
	h3 {
		
		font-family: -apple-system, "HelveticaNeue", "Helvetica", "Arial", sans-serif;
		font-weight: 300;
		font-size: 15px;
		text-align: left;
		color: rgba(0, 0, 0, 0.35);
					
		width: 100%;
					
	}
	
	h4 {
		
		float: left;
		text-align: left;
		width: 100%;
		margin-left: 0;
		margin-bottom: 50px;
		
		font-family: -apple-system, "Helvetica", "Arial", sans-serif;
		font-weight: 300;
		font-size: 15pt;
		color: gray;
					
	}
	
	h5 {
   
	   text-align: right;
	   color: white;
	   font-family: -apple-system, "HelveticaNeue", "Helvetica", "Arial", sans-serif;
	   font-weight: 700;
	   
	   float: left;
	   margin-left: 0px;
	   top: 5px;
	   border-radius: 4px;
	   padding: 3px 7px 3px 7px;
	   
	   width: auto;
	   margin-bottom: 30px;
	   margin-top: 0px;
	  
	   
	   background: #e06841;
	   	   
   }
   
   h5.nofloat {
	   
	   text-align: left;
	   line-height: 29px;
	   
	   border-bottom-left-radius: 16px;
	   border-top-left-radius: 16px;
	   border-bottom-right-radius: 3px;
	   border-top-right-radius: 3px;
	   padding: 0px 13px 0px !important;
	   background: #e06841;
	   cursor: pointer;
	   
	   float: left;
	   width: auto;
	   height: 30px;
	   
	   user-select: none;
	   -webkit-user-select: none;
	   -moz-user-select: none;
	   
   }
   
   h5.nofloat::before {
	   
	   content: '\2022';
	   float: left;
	   font-size: 50px;
	   line-height: 29px;
	   margin-left: -7px;
	   margin-right: 5px;
	   
   }
   
   #default.nofloat {
	   		   
	   border: 1px solid gray; 
	   border-bottom-left-radius: 16px;
	   border-top-left-radius: 16px;
	   border-bottom-right-radius: 3px;
	   border-top-right-radius: 3px;
	   padding: 5px 10px; 
	   
	   font-weight: 700; 
	   font-size: 15px; 
	   color: gray; 
	   
	   user-select: none; 
	   -webkit-user-select: none; 
	   -moz-user-select: none;
	   
	   cursor: pointer; 
	   background: white;
	   
	   /*Control state animations*/
		transition-property: background, color;
	  	transition-duration: 0.15s;
		
		-webkit-transition-property: background, color;
	  	-webkit-transition-duration: 0.15s;
		
		-moz-transition-property: background, color;
	  	-moz-transition-duration: 0.15s;
		
		-o-transition-property: background, color;
	  	-o-transition-duration: 0.15s;
	   
   }
   
   h5#default.nofloat:hover {
	   		   
	   background: gray;
	   color: white;
	   
   }
   
   .pushed {
	   
	   margin-left: 3px;
	   
   }
   
   #OFFTOPIC {
	   
	   background: #e06841;
	   
   }
   
   #WEBDESIGN {
	   
	   background: #248ad3;
	   
   }
   
   #PROTOTASK {
	   
	   background: #67c635;
	   
   }
   
   #APPLE {
	   
	   background: #cdcdcd;
	   
	   
   }
   
   #FEATURES {
	   
	   background: #f25656;
	   
   }
   
   #APPLEWATCH {
	   
	   background: #4d4d4d;
	   
   }
   
   #WWDC15 {
	   
	   background: #621fce;
	   
   }
	
	tr {
		
		height: 60px;
		
		text-align: center;
		
	}
	
	td {
		
		text-align: center;
		
	}
	
	p1 {
		
		float: left;
		text-align: left;
		line-height: 30px;
		margin-left: 0;
		margin-top: -35px;
		width: 100%;
		padding-bottom: 50px;
		padding-top: 0px;
									
		font-weight: 300;
		letter-spacing: 50%;
		font-family: -apple-system, "Helvetica", "Arial", sans-serif;
		font-size: 18px;
		
		-webkit-tap-highlight-color: #e06841;
		
	}
	
	b {
		
		font-family: -apple-system, "HelveticaNeue", "Helvetica", "Arial", sans-serif;
		font-weight: 500;
		font-size: 18px;
		
	}
	
	code {
		
		font-family: monospace;
		
		background: #f3f1ed;
		padding-left: 5px;
		padding-right: 5px;
		-webkit-border-radius: 3px;
		
	}
	
	.caption {
		
		color: gray;
		font-size: 15px;
		font-style: italic;
		text-align: center;
		margin-top: 15px;
		
		display: block;
		margin: auto auto;
		
	}
	
	#headerImage {
   
	   width: 200px;
	   height: 100px;
	   margin-top: 40px; 
	   display: inline;
	   
   }
	
	#imageAccent {
		
		width: 5px;
		height: 75px;
		
		background: #e06841;
		
		display: inline-block;
		margin-bottom: 15px;
		
	}
	
	.noselect {
		
		user-select: none;
		-webkit-user-select: none;
		-moz-user-select: none;
		-webkit-touch-callout: none;
		
	}
	
	.page-header {

		position:fixed;
		
		background: white;
		width:100%;	
		margin-top:-50px;
		height: 50px;
		
		z-index:10;
		
		box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.10);
		
	}
	
	.UINavigationButton {
		
		height: 25px;
		width: auto;
		
		border: 1px solid gray;
		-webkit-border-radius: 4px;
		
		position: absolute;
		margin-top: 11px;
		margin-right: 15px;
		padding-top: -20px;
		padding: 0px 10px 0px 10px;
		
		font-family: -apple-system, "HelveticaNeue", "Helvetica", sans-serif;
		font-size: 15pt;
		letter-spacing: 0px;
		line-height: 1px;
		text-align: center;
		text-decoration:none;
		-webkit-font-smoothing: antialiased;
		color: gray;
		
	}
	
	.UINavigationCallout {
		
		background: white;
		-webkit-border-radius: 10px;
		box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.20);
					
		position: fixed;
		width: 50vw;
		height: auto;
		top: 50%;
		left: 50%;  
		transform: translate(-50%, -50%);
		-webkit-transform: translate(-50%, -50%);
		-moz-transform: translate(-50%, -50%);
		-o-transform: translate(-50%, -50%);
		
		font-family: -apple-system, "HelveticaNeue", "Helvetica", "Arial", sans-serif;
		font-weight: 500;
		font-size: 18px;
		
		padding-top: 40px;
		
		vertical-align: middle;
		
		z-index: 200;
		
		overflow: hidden;
		
	}
	
	.static {
		
		-webkit-user-drag: none;
		user-drag: none;
					
	}
	
	#DWHeaderImage {
		
		float: left; 
		margin-left: calc(50% - 44px); 
		margin-left: -webkit-calc(50% - 66px);
		margin-top: 3px;
		cursor: pointer;
		
	}
	
	#navigationButton.UINavigationButton {
		
		right: 0px;
		line-height: 25px;
		font-size: 15px;
		font-weight: 700;
		color: gray;
		cursor: default;
		
	}
	
	#navigationButton.UINavigationButton:hover {
		
		cursor: pointer;
		
	}
	
	.page-headerSeparator {
		
		background:#E1E1E1;
		height:1px;
		width:auto;
		margin-top:50px;	
		
	}
	
	#UINavigationEmblem {

		display: block;
		float: left;
		margin-top: 5px;
		margin-left: 10px;
		
		cursor: default;
		
	}
	
	#UINavigationEmblemUnder {
		
		display: block;
		float: left;
		margin-top: 5px;
		margin-left: 10px;
		
	}
	
	#UINavigationEmblemOver {
		
		position: absolute;
		display: block;
		float: left;
		margin-top: 5px;
		margin-left: 10px;
		opacity: 0;
		
		-webkit-transition-property: opacity;
		-webkit-transition-duration: 200ms;
		
	}
	
	#UINavigationEmblemOver:hover {
		
		opacity: 100;
		
	}
	
	#UINavigationEmblem:hover {
		
		cursor: pointer;
		
	}
	
	.UIShareField {
		
		width: 100%; 
		height: 44px; 
		margin-top: 10px;
		
		resize: none; 
		border: none;
		border-bottom: 1px solid rgba(0, 0, 0, 0.15);
					
		font-family: -apple-system, 'Helvetica', 'Arial', sans-serif; 
		font-size: 25px; 
		font-weight: 300; 
		line-height: 40px; 
		text-align: center;
		
	}
	
	.UIShareField:focus {
		
		outline: none;
					
	}

@media screen and (max-device-width: 736px) {

   body {
   	
   		width: auto;
   		overflow: hidden;
   
   }  
   
   #headerImage {
	   
	   width: 200px;
	   height: 100px;
	   margin-top: 20px; 
	   display: inline;
	   
   }
   
   .page-headerSeparator {
	   
	   height: 0.5px;
	   
   }
   
   .UISeparatorView {
	   
	   width: 100%;
	   height: 0.5px;
	   margin: auto auto;
	   
   } 
   
   h1 {
	   
	   width: 50%;
	   margin: auto auto;
	   margin-bottom: 25px;
	   
   }
   
   h2 {
	   
	   width: 90%;
	   float: left;
	   clear: both;
	   margin-left: 5%;
	   margin-bottom: 5px;	   
	   text-align: left;
	   
   }
   
   h3 {
	   
	   width: 90%;
	   float: left;
	   margin-left: 5%;
	   margin-right: 5%;
	   margin-top: 0px;
	  
	   text-align: left;	   
   }
   
   h4 {
	   
	   width: 90%;
	   float: left;
	   margin-left: 5%;
	   margin-right: 5%;
	   margin-top: 10px;
	   
	   text-align: left;
   }
   
   h5 {
	   	   
	   float: left;
	   margin-left: 5%;
	   font-weight: 700;
	   
   }
   
   p1 {
	   
	   width: 90%;
	   margin-left: 5%;
	   margin-right: 5%;
	   margin-top: 10px;
	   	   
	   font-size: 14pt;
	   
   }
   
   b {
			
		font-family: -apple-system, "HelveticaNeue", "Helvetica", "Arial", sans-serif;
		font-weight: 700;
		font-size: 18px;
			
	}
   
   .UIDetailsContainer {
	   
	   float: left;
	   clear: both;
				
	   width: 100%;
	   margin-left: 0px;
	   overflow: hidden;
	   
   }
   
   .UIPreviewContainer {
	   
	   border-bottom: 0.5px solid rgba(0, 0, 0, 0.10);
	   background: white;
	   
   }
   
   .UIPreviewContainer:hover {
	   
	   border-left: none;
	   background: #eff0f3;
	   
   }
   
   .UIPostContainer {
	   
	   overflow: hidden;	
	   width: 90%;
	   left: 5%;
	   
   }
   
   .UIShareContainer {
			
		width: 34px;
		height: 34px;
		float: right;
		margin-top: 20px;
		margin-right: 20px;
					
		background-image: url('/blog/Images/Share@2x.png');
		background-size: cover;
			
	}
   
   #DWHeaderImage {
			
	   opacity: 0; 
	   float: left; 
	   margin-left: 32%; 
	   margin-top: 3px;
			
	}
	
	.page-header {
		
		-webkit-touch-callout: none;
        -webkit-text-size-adjust: none;
        -webkit-tap-highlight-color: rgba(0,0,0,0);
        -webkit-user-select: none; 
		
	}
   
	.UINavigationButton {
		
	}
	
	.UINavigationCallout {
		
		-webkit-touch-callout: none;
        -webkit-text-size-adjust: none;
        -webkit-tap-highlight-color: rgba(0,0,0,0);
        -webkit-user-select: none; 
			
		background: white;
		box-shadow: none;
			
		position: fixed;
		width: 100vw;
		height: 100vh;
		margin: 0;
		left: 0;
		top: 51px;
		right: 0;
		
		transform: none;
		-webkit-transform: none;
		-moz-transform: none;
		-o-transform: none;
					
	}
   
}
		
		
@font-face {
	font-family: fontAwesome;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: antialiased;
	src: url(https://wjwickham.com/Fonts/Fontawesome.woff);
}

@font-face {
	font-family: Thin;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: antialiased;
	src: url(https://wjwickham.com/Fonts/Thin.ttf);
}

@font-face {
	font-family: Black;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: antialiased;
	src: url(https://wjwickham.com/Fonts/Black.ttf);
}

@font-face {
	font-family: Light;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: antialiased;
	src: url(https://wjwickham.com/Fonts/Light.ttf);
}

	a:link {
    	color: #e06841;
	}
	a:visited {
	    color: #7d412d;
	}
	.nocolor:link {
		color: #e06841;
	}
	.nocolor:visited {
		color: #e06841;
	}

	*::selection {
	    background: #e06841;
	    color: #FAFAFA;
	}
	*::-moz-selection {
	    background: #e06841;
	    color: #FAFAFA;
	}
	*::-webkit-selection {
	    background: #e06841;
	    color: #FAFAFA;
	}
						
	</style>

</head>

<body onload="viewDidLoad();">
    
    <div id="masterContentContainer">
	    
	    <?php
		
			require("libSQL.php");
			
			$mobile = isMobile();
			
			if (isset($_GET["post"])) {
				
				$identifier = htmlspecialchars($_GET["post"]);
				$draftsQuery = query("SELECT * FROM content WHERE identifier='$identifier'");
				if (isset($draftsQuery["result"]) && count($draftsQuery["result"]) > 0) {
					
					$aPost = $draftsQuery["result"][0];
				
					?>
				
						<div style="width: 100vw; height: 100px; text-align: left; width: auto; margin-left: <?php echo($mobile ? "9" : "15"); ?>%;">
							<a href="https://wjwickham.com/blog/dotWrite.php"><img src="Images/dotWrite_Small.png" width="34" height="34"/></a>
					    </div>
					    					
					<?php
				
					$newRow = '<div class="UIPostContainer" id="post' . $aPost["identifier"] . '">';
					$newRow .= '<div class="UIDetailsContainer">';
					$newRow .= '<div class="UIDetailsContainer">';
					$newRow .= '<h2>' . $aPost["title"] . '</h2>';
					
					$date = strtotime($aPost["date"]);
					$newRow .= '<h3>' . date("D", $date) . ". " . date("j F Y", $date) . '</h3>';
					
					//Tag processing
					
					$body = str_replace("\\", "", $aPost["body"]);
					$body = str_replace("WICK-PERCENT-ESCAPE", "%", $body);
					
					$newRow .= '</div>';
					$newRow .= '<h4>' . $aPost["subtitle"] . '</h4>';
					$newRow .= '<p1>' . $body . '</p1></div>';
					echo($newRow);
				}
				else {
					echo(".Write couldn't find the post you're looking for.");
				}
				
					?>
					
					<footer><a href="https://wjwickham.com/"><img src="https://wjwickham.com/Images/Emblem/Hover_220.png" width="44" style="margin-bottom: 25px;"/></a></footer>
					
					<?
				
			}
			else {
				
				?>
			    
			    <img src="Images/dotWrite_Medium.png" id="headerImage"/>
			    <div id="imageAccent"></div>
			    
			    <h1>A blog by John Wickham</h1>
			    
			    <div class="UISeparatorView"></div>
			    
			    <?php
				
				$multiplier = 1;//(isset($_GET['page'])) ? ($_GET['page']) : 1;
				$limiter = (15 * $multiplier);
				$postsQuery = query("SELECT * FROM content ORDER BY date DESC LIMIT $limiter");
			
				$posts = $postsQuery["result"];
				
				foreach ($posts as $key => $aPost) { 
					
					$body = str_replace("\\", "", $aPost["body"]);
					$body = str_replace("WICK-PERCENT-ESCAPE", "%", $body);
					
					$previewString = (strlen($body) > 13) ? substr($body, 0, 200).'…' : $body;
					
					$newRow = '<div class="UIPreviewContainer" onclick="location.assign(\'https://wjwickham.com/blog/dotWrite.php?post=' . $aPost["identifier"] . '\');" id="post' . $aPost["identifier"] . '">';
					$newRow .= '<div class="UIDetailsContainer">';
					$newRow .= '<h2>' . $aPost["title"] . '</h2>';
					
					$date = strtotime($aPost["date"]);
					$newRow .= '<h3>' . date("D", $date) . ". " . date("j F Y", $date) . '</h3>';
												
					//Tag processing
					
					$newRow .= '</div>';
					$newRow .= '<h4>' . $aPost["subtitle"] . '</h4>';
					if (!$mobile) {
						$newRow .= '<p1>' . $previewString . '</p1>';
					}
					$newRow .= '</div>';
									
					if (($key != count($posts) - 1) && !$mobile) {
						$newRow .= '<div class="UIPostContainerSeparator" style="width: 80%; height: 1px; margin-left: 10%; background: rgba(0, 0, 0, 0.15);">';
					}
					$newRow .= '</div>';
									
					echo($newRow);
				}
				
				?>
					
					<!--
<div style="">
						<a style="background: #E06841; color: white; font-family: -apple-system, 'Helvetica', Arial, sans-serif; text-decoration: none; margin-top: 30px; margin-bottom: 30px; padding: 7px 10px;" href="dotWrite.php?page=2">Load More</a>	
					</div>
-->
				
					<footer id="UIPageFooter" style="border-top: 1px solid rgba(0,0,0,0.15);">
						<p style="color: rgba(0,0,0,0.30); font-weight: 300; font-family: -apple-system, 'Helvetica', 'Arial', sans-serif; font-size: 15px;">&copy; 2015 John Wickham.</p>
	    			</footer>
    			
    			<?php
				
			}
			
			function isMobile() {
				return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
			}
					    
		?>
	    
    </div>
    
</body>