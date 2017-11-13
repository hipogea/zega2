<?PHP
	$this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'detalle-grid',
		'itemsCssClass' => 'table table-striped table-bordered table-hover',
		'dataProvider' => Masterrelacion::model()->search_por_hijo($model->codigo),
		// 'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file
		'summaryText' => '->',
		'columns' => array(
			 array('header'=>'Cod','value'=>'$data->hidhijo','htmlOptions'=>array('width'=>10)),
                    'cant',
                    array('header'=>'Descripcion','value'=>'$data->hijo->descripcion','htmlOptions'=>array('width'=>500)),
                    array('header'=>'Marca','value'=>'$data->hijo->marca','htmlOptions'=>array('width'=>200)),
                    array('header'=>'Modelo','value'=>'$data->hijo->modelo','htmlOptions'=>array('width'=>200)),
                  

			array(
				'htmlOptions' => array('width' => 50),
				'class' => 'CButtonColumn',
				'template' => '{update}{delete}',
				'buttons' => array(
					'update' => array(
						'visible' => 'true',
						'url' => '$this->grid->controller->createUrl("/masterequipo/modificadetalle/",
	   array("id"=>$data->id,
	   "asDialog"=>1,
	   "gridId"=>$this->grid->id,
	   )
	   )',
						'click' => ('function(){
	   $("#cru-frame3").attr("src",$(this).attr("href"));
	   $("#cru-dialog3").dialog("open");
	   return false;
	   }'),
						'imageUrl' => '' . Yii::app()->getTheme()->baseUrl . Yii::app()->params['rutatemaimagenes'] . 'lapicito.png',
						'label' => 'Actualizar Item',
					),


					'delete' =>

						array(
							'visible' => 'true',
							'url' => '$this->grid->controller->createUrl("/masterequipo/borrahijo", array("id"=>$data->id))',
							'options' => array('ajax' => array('type' => 'GET', 'success' => 'js:function() { $.fn.yiiGridView.update("detalle-grid");}', 'url' => 'js:$(this).attr("href")'),
								'onClick' => 'Loading.show();Loading.hide(); ',
							),
							//'imageUrl' => '' . Yii::app()->getTheme()->baseUrl . Yii::app()->params['rutatemaimagenes'] . 'borrador.png',
							'label' => 'Ver detalle',
						),
				),
			),
		),
	));



$createUrl = $this->createUrl ( '/masterequipo/creaadicional' ,
	array (
		//"id"=>$model->n_direc,
		"asDialog" => 1 ,
		"gridId" => 'detalle-grid' ,
		"idcabeza" => $model->id ,
	)
);
echo CHtml::link ( 'Agregar ' , '#' , array ( 'onclick' => "$('#cru-frame3').attr('src','$createUrl '); $('#cru-dialog3').dialog('open');" ) );









 


?>