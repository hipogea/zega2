

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
	'method'=>'POST',
)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'trabajadores-grid',
	'dataProvider'=>Trabajadores::model()->search(),
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',

	'filter'=>$model,
	'columns'=>array(
			array(
									'class'=>'CCheckBoxColumn',
									'selectableRows' => 20,
									'value'=>'$data->codigotra',
									'checkBoxHtmlOptions' => array(                
													'name' => 'cajita[]',
												),
           // 'id'=>'cajita' // the columnID for getChecked
							),
            'codigotra',
		'ap',
		'am',
		'nombres',
		
	),
)); ?>
<div class="row buttons">
		<?php echo CHtml::submitButton('Seleccionar'); ?>
	</div>
<?php $this->endWidget(); ?>