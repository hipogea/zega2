
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
	'method'=>'GET',
)); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'Inventario-grid',
	'dataProvider'=>$model->search(),
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_celeste.css',
	'filter'=>$model,
	'columns'=>array(
						array(
									'class'=>'CCheckBoxColumn',
									'selectableRows' => 1,
									'value'=>'$data->codigoaf."_".$data->descripcion',
									'checkBoxHtmlOptions' => array(                
																'name' => 'checkselected[]',
																	),
							'htmlOptions'=>array('width'=>10)
           // 'id'=>'cajita' // the columnID for getChecked
							),


		array('name'=>'codigoaf','htmlOptions'=>array('width'=>50)),
		array(
			'name'=>'idinventario',
			'type'=>'raw',
			'value'=>'(file_exists(Yii::getPathOfAlias(\'webroot.fotosinv\').DIRECTORY_SEPARATOR.$data->codpropietario.DIRECTORY_SEPARATOR.trim($data->idinventario).\'.JPG\'))?
						CHtml::image(Yii::app()->baseUrl.DIRECTORY_SEPARATOR.\'fotosinv\'.DIRECTORY_SEPARATOR.$data->codpropietario.DIRECTORY_SEPARATOR.trim($data->idinventario).\'.JPG\',$data->codigosap,array(\'width\'=>60,\'height\'=>50)):
						"--"',
			'htmlOptions'=>array('width'=>20)
		),
		array('name'=>'descripcion','htmlOptions'=>array('width'=>200)),
		/*'modelo',
		'serie',*/
		
		//'provincia',
		
		
	),
)); ?>


<div class="row buttons">
		<?php echo CHtml::submitButton('Seleccionar'); ?>
	</div>
<?php $this->endWidget(); ?>