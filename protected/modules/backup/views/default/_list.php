<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'install-grid',
	'dataProvider' => $dataProvider,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns' => array(

		array(
			'class' => 'CButtonColumn',
			'template' => '{delete}{view}',
			'buttons'=>array
			(

				'delete' => array
				(
					'url'=>'Yii::app()->createUrl("backup/default/delete", array("file"=>$data["name"]))',
					'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'borrador.png',
					'label'=>'Borrar...',
				),

				'view' => array
				(
					'url'=>'Yii::app()->createUrl("backup/default/download", array("file"=>$data["name"]))',
					'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'arrow_down.png',
					'label'=>'Descargar...',
				),


			),
		),
		array('name'=>'name','header'=>'Nombre'),
		array('name'=>'size','header'=>'Tamaño'),
		array('name'=>'create_time','header'=>'Fecha Creacion'),
		//'create_time',
		/*array(
			'class' => 'CButtonColumn',
			'template' => ' {download} {restore}',
			  'buttons'=>array
			    (
			        'Download' => array
			        (
			            'url'=>'Yii::app()->createUrl("backup/default/download", array("file"=>$data["name"]))',
			        ),
			        'Restore' => array
			        (
			            'url'=>'Yii::app()->createUrl("backup/default/restore", array("file"=>$data["name"]))',
					),
			        'delete' => array
			        (
			            'url'=>'Yii::app()->createUrl("backup/default/delete", array("file"=>$data["name"]))',
			        ),
			    ),		
		),*/

	),
)); ?>