 <?php  $this->renderPartial('vw_detalle_grilla', array("idcabecera"=>$modelcabecera->id,'eseditable'=>$eseditable),false, false);
 ?>
	<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'cru-dialogdetalle',
		'options'=>array(
			'title'=>'Item',
			'autoOpen'=>false,
			'modal'=>true,
			'width'=>900,
			'height'=>800,
			'show'=>'Transform',
		),
	));
	?>
	<iframe id="cru-detalle" frameborder="0"  width="100%" height="100%" ></iframe>
	<?php
	$this->endWidget();	//--------------------- end new code --------------------------
	?>







