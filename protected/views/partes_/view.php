<?php
/* @var $this PartesController */
/* @var $model Partes */



$this->menu=array(
	array('label'=>'Ver Los Partes', 'url'=>array('admin')),
	array('label'=>'Crear Parte', 'url'=>array('create')),
	//array('label'=>'Actualizar parte', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Borrar Parte', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Administar los partes', 'url'=>array('admin')),
);
?>




<DIV>
  <?php 	Echo "Parte de motorista creado  :".$model->codep."-".$model->numero ;?>
 </DIV>
 
<DIV>
  <?php 	Echo CHtml::link('Regresar a revisarlo',Yii::app()->createUrl('partes/update', array('id' => $model->id)) ); ?>
 </DIV>
  

