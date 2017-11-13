<?PHP
//var_dump($modeloruta->search_por_codigo($model->codigo)->getdata());
//$modelo=New VwHojaruta();
$this->widget('ext.groupgridview.GroupGridView', array(
	'id' => 'detallelista-grid',
     'filter'=>$modeloruta,
    'summaryText' => '',
	'dataProvider' => $modeloruta->search_por_codigo($model->codigo),
	'mergeColumns' => array('codtipo','nombrelista'),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
			'columns' => array(
                    array('name'=>'codtipo',
		
		'value'=>'$data->codtipo','htmlOptions'=>array('width'=>10),
                        'filter'=>  
              CHtml::listData(Tipolista::model()->findAll(),"codtipo","destipo"),   
		
		),
			array('name'=>'nombrelista','header'=>'Hoja de ruta','value'=>'$data->nombrelista','htmlOptions'=>array('width'=>300)),
                    'desum',
                    array('name'=>'cant','header'=>'Cant','value'=>'$data->cant','htmlOptions'=>array('width'=>10)),
                    array('name'=>'codart','header'=>'Cod Mat','value'=>'$data->codart','htmlOptions'=>array('width'=>10)),
                      array('name'=>'descripcion','header'=>'Material','value'=>'$data->descripcion','htmlOptions'=>array('width'=>300)),                   
                    
                    

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
							'url' => '$this->grid->controller->createUrl("/masterequipo/borradetalle", array("id"=>$data->idmasterlistamateriales))',
							'options' => array('ajax' => array('type' => 'GET', 'success' => 'js:function() { $.fn.yiiGridView.update("detallelista-grid");}', 'url' => 'js:$(this).attr("href")'),
								'onClick' => 'Loading.show();Loading.hide(); ',
							),
							'imageUrl' => '' . Yii::app()->getTheme()->baseUrl . Yii::app()->params['rutatemaimagenes'] . 'borrador.png',
							'label' => 'Ver detalle',
						),
				),
			),
		),
	));

$createUrl = $this->createUrl ( '/masterequipo/crealista' ,
	array (
		//"id"=>$model->n_direc,
		"asDialog" => 1 ,
		"gridId" => 'detalle-grid' ,
		"idcabeza" => $model->id ,
	)
);
echo CHtml::link ( 'Agregar ' , '#' , array ( 'onclick' => "$('#cru-frame3').attr('src','$createUrl '); $('#cru-dialog3').dialog('open');" ) );


?>