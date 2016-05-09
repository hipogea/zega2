<?php


$this->menu=array(
	array('label'=>'List Almacendocs', 'url'=>array('index')),
	array('label'=>'Create Almacendocs', 'url'=>array('create')),
	array('label'=>'View Almacendocs', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Almacendocs', 'url'=>array('admin')),
);
?>
<span class="summary-icon2">
           <img src="<?php echo Yii::app()->theme->baseUrl ;?>/img/cajamateriales.png" width="25" height="25" alt="">
</span>
                <h1>Editar vale de almacen </h1>




<?php

		echo $this->renderPartial('n_form', array('model'=>$model));



?>