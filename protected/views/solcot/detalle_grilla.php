

	<?PHP
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'detalle-grid',
		'itemsCssClass'=>'table table-striped table-bordered table-hover',
		'dataProvider'=>Desolcot::model()->search_por_solcot($model->id),
		//'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file
		'summaryText'=>'->',
		'columns'=>array(
			'desolpe.codart',
			'cant',
			'desolpe.maestro.maestro_ums.desum',
			'desolpe.txtmaterial',

			array(
				'htmlOptions'=>array('width'=>400),
				'class'=>'CButtonColumn',
				'template'=>'{delete}',
				'buttons'=>array(



					'delete'=>

						array(
							'visible'=>'true',
							'url'=>'$this->grid->controller->createUrl("/solcot/ajaxborramaterial", array("id"=>$data->id))',
							'options' => array( 'ajax' => array('type' => 'GET', 'success'=>'js:function() { $.fn.yiiGridView.update("detalle-grid");}' ,'url'=>'js:$(this).attr("href")'),
								'onClick'=>'Loading.show();Loading.hide(); ',
							) ,
							'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'borrador.png',
							'label'=>'Borrar material',
						),
				),
			),
		),
	)); ?>

