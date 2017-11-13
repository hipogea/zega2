<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
	'method'=>'GET',
)); ?>
<div>
		<div class='botones'>
			<?php echo CHtml::imageButton(Yii::app()->getTheme()->baseUrl.'/img/pin.png',array('width'=>25,'height'=>25,'value'=>'','onClick'=>'Loading.show();Loading.hide();'));?>
		</div>
	</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'lugares-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',
	'columns'=>array(
						array(
									'class'=>'CCheckBoxColumn',
									'selectableRows' => 1,
									'value'=>'$data->id."_".$data->textocorto',
									'checkBoxHtmlOptions' => array(                
																'name' => 'checkselected[]',
																	),
           // 'id'=>'cajita' // the columnID for getChecked
							),
	
		'numero',
		'codpro',
		'despro',
		'rucpro',
            'textocorto',
		//'textoactividad',
		'despro',
		
	),
)); ?>
<div class="row buttons">
		<?php echo CHtml::submitButton('Seleccionar'); ?>
	</div>
<?php $this->endWidget(); ?>