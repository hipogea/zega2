
<div class="division">

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
	'method'=>'GET',
)); ?>
	<div>
		<div class='botones'>
			<?php echo CHtml::imageButton(Yii::app()->getTheme()->baseUrl.'/img/pin.png',array('width'=>25,'height'=>25,'value'=>'','onClick'=>'Loading.show();Loading.hide();'));?>
		</div>
	</div>
<?php //echo isset(Yii::app()->session['codigoprov'])?Yii::app()->session['codigoprov']:'caramola'; ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'clipro-grid',
	'dataProvider'=>$model->search(),
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',
	'filter'=>$model,
	'columns'=>array(
						array(
									'class'=>'CCheckBoxColumn',
									'selectableRows' => 1,
									'value'=>'$data->codcatval."_".$data->descat',
									'checkBoxHtmlOptions' => array(                
																'name' => 'checkselected[]',
																	),
           // 'id'=>'cajita' // the columnID for getChecked
							),
	
		'codcatval',
		'descat',
		//'rucpro',
		
		
	),
)); ?>
<div class="row buttons">
		<?php echo CHtml::submitButton('Seleccionar'); ?>
	</div>
<?php $this->endWidget(); ?>

</div >