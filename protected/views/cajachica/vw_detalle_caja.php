
 <?php  $this->renderPartial('vw_detalle_grilla', array("idcabecera"=>$modelcabecera->id,'eseditable'=>$eseditable),false, true);
 ?>
	<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'cru-dialogdetalle',
		'options'=>array(
			'title'=>'Item',
			'autoOpen'=>false,
			'modal'=>true,
			'width'=>800,
			'height'=>500,
			'show'=>'Transform',
		),
	));
	?>
	<iframe id="cru-detalle" frameborder="0"  width="100%" height="100%" ></iframe>
	<?php
	$this->endWidget();	//--------------------- end new code --------------------------
	?>







