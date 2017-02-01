
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
	'method'=>'GET',
)); ?>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'Inventario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
						array(
									'class'=>'CCheckBoxColumn',
									'selectableRows' => 1,
									'value'=>'$data->codc',
									'checkBoxHtmlOptions' => array(                
																'name' => 'checkselected[]',
																	),
           // 'id'=>'cajita' // the columnID for getChecked
							),
	
		
		'clasecolector',
		'desceco',
		'desimputa',
		
	),
)); ?>


<div class="row buttons">
		<?php echo CHtml::submitButton('Seleccionar X'); ?>
	</div>
<?php $this->endWidget(); ?>