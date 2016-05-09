<?php

$this->menu=array(
	//array('label'=>'List Solpe', 'url'=>array('index')),
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
	array('label'=>'Visualizar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Listado ', 'url'=>array('admin')),
);
?>




<h1> <?php echo ($model->estado=='99')?'Crear':'Actualizar';  ?> Solicitud de material 
<?php ECHO ($model->estado=='99')?' 2 de 3':''; ?> <?php ECHO '  '.$model->numero; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

