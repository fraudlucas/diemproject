<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Colorpicker demo</title>
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
</head>
<body>
<!-- Color Picker Script - ColorCodeHex.COM 
<div style="font-family:Arial,Helvetica,sans-serif;border:solid 1px #cccccc;position:absolute;width:240px;height:326px;background: #ffffff;-moz-box-shadow:0 0 6px rgba(0,0,0,.25);-webkit-box-shadow: 0 0 6px rgba(0,0,0,.25);box-shadow:0 0 6px rgba(0,0,0,.25);-moz-border-radius: 5px;-webkit-border-radius:5px;border-radius:5px;"><div style="background-color:#2d6ab4;position:absolute;top:0px;left:0px; width:100%; height:22px;text-align:center;padding-top:2px;font-weight:bold;border-top-right-radius:5px;border-top-left-radius:5px;"><a style="text-decoration:none;color:#ffffff;" target="_blank" href="http://www.colorcodehex.com/">HTML Color Picker</a></div><script src="http://widget.colorcodehex.com/color-picker/abcdef.html" type="text/javascript"></script></div>-->
<script type="text/javascript" src="../assets/js/jscolor/jscolor.js"></script><!-- End of Color Picker Script --> 

<div class="colorr">
<form name="colorSelec" action="./src/handlers/mangementContentHandler.php?a=changeColor" method="post">
Select a bacground color: <input class="color {hash:true}" value="#917E7E">
<br>
<input type="submit" value="submit">

</form>

</div>

</body>
</html>