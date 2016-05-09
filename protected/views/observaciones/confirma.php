<?php
/* @var $this ObservacionesController */
/* @var $model Observaciones */

$this->menu=array(
	
	array('label'=>'Ver observaciones', 'url'=>array('admin')),
);
?>


		<?php 
		 echo "Se han grabado la observacion ".CHtml::link(" regresar",Yii::app()->request->baseUrl."/index.php?r=obServaciones/update&id=".$id);
		 
      	 ?>  
  
