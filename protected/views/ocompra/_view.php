<?php


$this->menu=array(
	array('label'=>'Crear Oc', 'url'=>array('CreaDocumento')),
	array('label'=>'Actualizar Oc', 'url'=>array('EditaDocumento', 'id'=>$model->idguia)),
	array('label'=>'Opciones Oc', 'url'=>array('configuraop')),
	array('label'=>'Listado Oc', 'url'=>array('admin')),
	array('label'=>'Imprimir', 'url'=>array('imprimir', 'id'=>$model->idguia)),
);
?>


<?php echo $this->renderPartial('_form1', array('model'=>$model,'editable'=>$editable)); ?>

