<h1>Example 1: Page Blocking</h1>
<p>
	This page demonstrates several ways to block the page.
	Each button below activates blockUI and then makes a remote call to the server.
</p>
<?php
$widget=$this->widget('ext.blockui.JuiBlockUI');
$widget->addScriptLines(array("$(document).ajaxStop($.unblockUI);"));
$widget->addScriptLines(array(
	"function test() {",
	JuiBlockUI::ajax(array(
		'url'=>array('/blockUi/wait'),
		'cache'=>false
	)),
	"}",
));
$widget->registerScript(CClientScript::POS_HEAD);
?>

<p>
	<input id="pageDemo1" class="demo" value="Default Message" type="submit">
	<?php $widget->addEventHandler('#pageDemo1','click',array(
		JuiBlockUI::blockUI(),
		"test();",
	));?>
	<input id="pageDemo2" class="demo" value="Custom Message" type="submit">
	<?php $widget->addEventHandler('#pageDemo2','click',array(
		JuiBlockUI::blockUI(array(
			'message'=> '<h1><img src="'.$widget->getImage().'" /> Just a moment...</h1>'
		)),
		"test();",
	));?>
	<input id="pageDemo3" class="demo" value="Custom Style" type="submit">
	<?php $widget->addEventHandler('#pageDemo3','click',array(
		JuiBlockUI::blockUI(array(
			'css'=>array(
				'backgroundColor'=>'#f00'
			,'color'=> '#fff')
		)),
		"test();",
	));?>
	<input id="pageDemo4" class="demo" value="DOM Element as Message" type="submit">
	<?php $widget->addEventHandler('#pageDemo4','click',array(
		JuiBlockUI::blockUI(array(
			'message'=> "js:$('#domMessage')"
		)),
		"test();",
	));
	$widget->registerScript();
	?>
</p>
