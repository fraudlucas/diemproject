<?php	
	require_once('../../src/config.php');
	require_once('../../src/Session.php');
	require_once (DIR_VIE.'managementContentView.php');
	$privacypolicyManagementContentView = new ManagementContentView();
	$privacypolicyManagementContent = $privacypolicyManagementContentView->searchContent('pageId','7','1');
?>
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
<div class="row">
	<div class="panel panel-default" style="margin-bottom:0px">
		<div class="panel-heading">
			Manage Page Content
			<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
		</div>
		<div class="panel-body">
			<div class="container" style="width:100%">
			  	<div class="hero-unit" >
					<!--
					Please read this before copying the toolbar:

					* One of the best things about this widget is that it does not impose any styling on you, and that it allows you 
					* to create a custom toolbar with the options and functions that are good for your particular use. This toolbar
					* is just an example - don't just copy it and force yourself to use the demo styling. Create your own. Read 
					* this page to understand how to customise it:
					* https://github.com/mindmup/bootstrap-wysiwyg/blob/master/README.md#customising-
					-->
					<div id="alerts"></div>
					<form action="../../src/handlers/managementContentHandler.php?a=updateContent&b=7&p=<?php echo $pageToReturn; ?>&param=t&t=7" method="post">
						<div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
						  <div class="btn-group" >
							<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font" ></i><b class="caret" ></b></a>
							  <ul class="dropdown-menu">
							  </ul>
						  </div>
						  <div class="btn-group">
							<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
							  <ul class="dropdown-menu">
							  <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
							  <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
							  <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
							  </ul>
						  </div>
						  <div class="btn-group">
							<a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
							<a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
							<a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
							<a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
						  </div>
						  <div class="btn-group">
							<a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="icon-list-ul"></i></a>
							<a class="btn" data-edit="insertorderedlist" title="Number list"><i class="icon-list-ol"></i></a>
							<a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i></a>
							<a class="btn" data-edit="indent" title="Indent (Tab)"><i class="icon-indent-right"></i></a>
						  </div>
						  <div class="btn-group">
							<a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
							<a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
							<a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
							<a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
						  </div>
						  <div class="btn-group">
							  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="icon-link"></i></a>
								<div class="dropdown-menu input-append">
									<input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
									<button class="btn" type="button">Add</button>
							</div>
							<a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="icon-cut"></i></a>

						  </div>
						  
						  <!-- <div class="btn-group">
							<a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
							<input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
						  </div> -->
						  <div class="btn-group">
							<a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
							<a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
						  </div>
						  <input type="text"  data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
						  <input type="hidden" name="content" id="privacypolicy_dash_new_shout_textarea_hidden" />
							<script type="text/javascript">
							setInterval(function () {
							  document.getElementById("privacypolicy_dash_new_shout_textarea_hidden").value = document.getElementById("privacypolicyflag").nextElementSibling.innerHTML;
							}, 5);
							</script>
						  <button type="submit" class="btn">Save</button>
						</div>
					</form>

					<div id="privacypolicyflag"></div>
					<div id="editor" contenteditable="true"><?php echo $privacypolicyManagementContent->getContent();?></div>
				</div>
		  	</div>
		  
		</div>
	</div>
</div>