<h1>
	<?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'lock.png');  ?> Documentos bloqueados   ( <?php echo yii::app()->user->name;   ?> ) </h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuariosX-grid',
	'dataProvider'=>Bloqueos::model()->search_por_usuario(yii::app()->user->id),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
		array('name'=>'ima','type'=>'raw','value'=>'CHTml::link(CHTml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."35099.png"),$data->url,array("target"=>"_blank"))'),
		'codocu',
		array('name'=>'deima','type'=>'raw','value'=>'CHTml::link($data->documentos->desdocu,$data->url,array("target"=>"_blank"))'),

		//'documentos.desdocu',
		'fechabloqueo',
		'iddocu',
		'ip',
		//'url',
		'idsesion',

		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
			'buttons'=>array(
			'delete'=>
				array(
					'visible'=>'true',
					'url'=>'$this->grid->controller->createUrl("/usuariosfavoritos/borrabloqueo", array("id"=>$data->id))',
					'options' => array(
						'ajax' => array(
							'type' => 'GET',
							'success'=>"function(data) {
										$('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');

                                              $.fn.yiiGridView.update('usuariosX-grid'); return false;
                                        }",

							'url'=>'js:$(this).attr("href")'


						),

					) ,
					'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'borrador.png',
					'label'=>'Desbloquear',
				),
			)
		),
	),
)); ?>
