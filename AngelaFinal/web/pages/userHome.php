<?php
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	$session = new Session();
?>
<html lang="en">
<head>
	<?php include( DIR_LAY.'headPages.php');?>
</head>
<body>
<?php include( DIR_LAY.'modalBook.php');?>
	<div id="wrapper">
		<?php 
		if (!$session->isLoggedIn()){
			header('Location: ../../index.php') ;
		}else{
			include( DIR_LAY.'headerUserPages.php') ;
		}
		?>
		<div class="row" style="margin-top:30px">
			<?php include( DIR_LAY.'userDash.php') ;?>
			<div class="row">
				<div class="container">
					<div class="col-xs-18 col-md-12">
						<h4>Tab</h4>
						<ul class="nav nav-tabs">
							<li class="active"><a href="#one" data-toggle="tab"><i class="icon-briefcase"></i>News</a></li>
							<li><a href="#two" data-toggle="tab">Events</a></li>
							<li><a href="#three" data-toggle="tab">Messages</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="one">
								<p>
									<strong>Augue iriure</strong> dolorum per ex, ne iisque ornatus veritus duo. Ex nobis integre lucilius sit, pri ea falli ludus appareat. Eum quodsi fuisset id, nostro patrioque qui id. Nominati eloquentiam in mea.
								</p>
								<p>
									 No eum sanctus vituperata reformidans, dicant abhorreant ut pro. Duo id enim iisque praesent, amet intellegat per et, solet referrentur eum et.
								</p>
							</div>
							<div class="tab-pane" id="two">
								<p>
									 Tale dolor mea ex, te enim assum suscipit cum, vix aliquid omittantur in. Duo eu cibo dolorum menandri, nam sumo dicit admodum ei. Ne mazim commune honestatis cum, mentitum phaedrum sit et.
								</p>
							</div>
							<div class="tab-pane" id="three">
								<p>
									 Cu cum commodo regione definiebas. Cum ea eros laboramus, audire deseruisse his at, munere aeterno ut quo. Et ius doming causae philosophia, vitae bonorum intellegat usu cu.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>		
	<?php include( DIR_LAY.'footerPages.php') ?>
	<?php include( DIR_LAY.'jsIncludesPages.php') ?>
</body>
</html>
 