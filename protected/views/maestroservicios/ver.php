<?php


$this->menu=array(
	//array('label'=>'List Almacendocs', 'url'=>array('index')),
	array('label'=>'Movimientos', 'url'=>array('admin')),
	array('label'=>'Visualizar', 'url'=>array('ver')),
);
?>



<?php MiFactoria::titulo('Visualizar  conformidad','package');// echo "<br><br><br><br>  ".($model->isnewRecord)?"ES NUEVO - EN LA VISTA CREATE ":"YA NO ES NUVEO  VISATA CREATE";?>
<?php echo $this->renderPartial('n_form', array('model'=>$model)); ?>



