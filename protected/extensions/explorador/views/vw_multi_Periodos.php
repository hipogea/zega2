
<div class="division">

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
	'method'=>'GET',
)); ?>
	<div>
		<div class='botones'>
			<?php echo CHtml::imageButton(Yii::app()->getTheme()->baseUrl.'/img/pin.png',array('width'=>25,'height'=>25));?>
		</div>
	</div>
<?php //echo isset(Yii::app()->session['codigoprov'])?Yii::app()->session['codigoprov']:'caramola'; ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'periodos-grid',
	'dataProvider'=>$model->search(),
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',
	'filter'=>$model,
	'summaryText'=>'',
	'columns'=>array(
						array(
									'class'=>'CCheckBoxColumn',
									'selectableRows' => 10,
									'value'=>'$data->id',
									'checkBoxHtmlOptions' => array(                
																'name' => 'checkselected[]',
																	),
           // 'id'=>'cajita' // the columnID for getChecked
							),
	
		'desperiodo',
		'mes',
		'anno',
		
		
	),
)); ?>

<?php $this->endWidget(); ?>

</div >