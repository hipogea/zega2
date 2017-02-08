<h1> <?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'lock.png');  ?> Documentos bloqueados</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuariosX-grid',
	'dataProvider'=>Bloqueos::model()->search(),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
		array('name'=>'usuario','type'=>'html','value'=>'CHTml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."user_business_boss.png").strtoupper(yii::app()->user->um->LoadUserById($data->iduser)->username)'),
		'fechabloqueo',
		array('name'=>'dexima','header'=>'Tiempo Bloq','type'=>'raw','value'=>'CHTml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."clock.png").MiFactoria::tiempopasado($data->fechabloqueo)'),
		array('name'=>'deima','type'=>'raw','value'=>'CHTml::link($data->documentos->desdocu,$data->url,array("target"=>"_blank"))'),
		//'documentos.desdocu',

		//array('name'=>'ima','type'=>'raw','value'=>'CHTml::link(CHTml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."35099.png"),$data->url,array("target"=>"_blank"))'),
		'codocu',

		'iddocu',
		array('name'=>'deximax','header'=>'IP','type'=>'raw','value'=>'CHTml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."computer.png").$data->ip'),

		//'url',
		//'idsesion',

		array(
			'class'=>'CButtonColumn',
			'template'=>'{}',
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


<?PHP  $this->widget('CTreeView',array(
	'id'=>'unit-treeview',
	'url'=>array('request/llenaEquipos'),
	'htmlOptions'=>array(
'class'=>'treeview-red'
	)
));  ?>





