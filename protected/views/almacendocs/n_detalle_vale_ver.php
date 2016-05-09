
<?php
$this->renderPartial('n_vw_detalle_grilla_ver', array('model'=>$model, 'campoestado'=>$campoestado,"idcabecera"=>$model->id,'eseditable'=>$eseditable));
?>


<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialogdetalle',
	'options'=>array(
		'title'=>'Detalle',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>500,
		'height'=>500,
		'show'=>'Transform',
	),
));
?>
<iframe id="cru-detalle" frameborder="0"  width="100%" height="100%" >
	hola
</iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>
