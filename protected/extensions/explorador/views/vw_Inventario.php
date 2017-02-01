
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
	'method'=>'GET',
)); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'Inventario-grid',
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_celeste.css',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
						array(
									'class'=>'CCheckBoxColumn',
									'selectableRows' => 1,
									'value'=>'$data->codigoaf."_".$data->descripcion',
									'checkBoxHtmlOptions' => array(                
																'name' => 'checkselected[]',
																	),
           // 'id'=>'cajita' // the columnID for getChecked
							),
	
		
		'codigoaf',
		array(
			'name'=>'imagen',
			'type'=>'raw',
			'value'=>'(file_exists(Yii::getPathOfAlias(\'webroot.fotosinv\').DIRECTORY_SEPARATOR.$data->codpropietario.DIRECTORY_SEPARATOR.trim($data->idinventario).\'.JPG\'))?
						CHtml::image(Yii::app()->baseUrl.DIRECTORY_SEPARATOR.\'fotosinv\'.DIRECTORY_SEPARATOR.$data->codpropietario.DIRECTORY_SEPARATOR.trim($data->idinventario).\'.JPG\',$data->codigosap,array(\'width\'=>60,\'height\'=>50)):
						"--"'
		),
		'descripcion',
		/*'modelo',
		'serie',*/
		
		//'provincia',
		
		
	),
)); ?>


<div class="row buttons">
		<?php echo CHtml::submitButton('Seleccionar'); ?>
	</div>
<?php $this->endWidget(); ?>