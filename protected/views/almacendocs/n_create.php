<?php
/* @var $this AlmacendocsController */
/* @var $model Almacendocs */

$this->breadcrumbs=array(
	'Almacendocs'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Almacendocs', 'url'=>array('index')),
	array('label'=>'Movimientos', 'url'=>array('alkardex/admin')),
);
?>





<?php // echo "<br><br><br><br>  ".($model->isnewRecord)?"ES NUEVO - EN LA VISTA CREATE ":"YA NO ES NUVEO  VISATA CREATE";?>
<?php echo $this->renderPartial('n_form', array('model'=>$model)); ?>