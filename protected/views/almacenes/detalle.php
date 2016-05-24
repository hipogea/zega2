<div class="division">

	<?php

	$botones=array(


		'pack2'=>array(
			'type'=>'B',
			'ruta'=>array('almacenes/descargainventario',array('codal'=>$model->codalm,'exportacion'=>1)),
			'dialog'=>'cru-dialogdetalle',
			'frame'=>'cru-detalle',
			'visiblex'=>array('20'),

		),

		'abacus'=>array(
			'type'=>'C',
			'ruta'=>array('/conteofisico',array(
				'id'=>'',"cest"=>'01',
				//"id"=>$model->n_direc,
				"asDialog"=>1,
				"gridId"=>'detalle-grid',
			)
			),
			'dialog'=>'cru-dialogdetalle',
			'frame'=>'cru-detalle',
			'visiblex'=>array('20'),

		),

	);

	$this->widget('ext.toolbar.Barra',
		array(
			//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
			'botones'=>$botones,
			'size'=>24,
			'extension'=>'png',
			'status'=>'20',

		)
	);?>


</div>

<?php

$this->menu=array(
	//array('label'=>'List Almacenes', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	//array('label'=>'View Almacenes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

  <?php MiFactoria::titulo("Almacen  ". $model->codalm." : ".$model->nomal,'Explain'); ?></h1>

<?php echo $this->renderPartial('detalle_general', array('model'=>$model)); ?>


<div id="zonagrafo">



</div>