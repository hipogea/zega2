<?php
/* @var $this InventarioController */
/* @var $model Inventario */



$this->menu=array(
	
	array('label'=>'Crear Activo', 'url'=>array('create')),
	array('label'=>'Modificar', 'url'=>array('update', 'id'=>$id)),
	//array('label'=>'Delete Inventario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idinventario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Ver activos', 'url'=>array('admin')),
);
?>


		<?php 
		 echo "Se han grabado los datos del Activo ".CHtml::link(" regresar",Yii::app()->request->baseUrl."/index.php?r=inventario/update&id=".$id);
		 
      	 ?>  
  
