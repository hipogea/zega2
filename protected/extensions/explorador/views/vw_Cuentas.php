
<div style="width:95%;" >

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
									'value'=>'$data->codcuenta."_".$data->descuenta',
									'checkBoxHtmlOptions' => array(                
																'name' => 'checkselected[]',
										'width'=>'10'
																	),
           // 'id'=>'cajita' // the columnID for getChecked
							),
		ARRAY('name'=>'clase','header'=>'Clase','htmlOptions'=>array('width'=>'10')),
		ARRAY('name'=>'codcuenta','header'=>'Descripcion','htmlOptions'=>array('width'=>'80')),
		ARRAY('name'=>'descuenta','header'=>'Codigo','htmlOptions'=>array('width'=>'400')),
		ARRAY('name'=>'desclase','header'=>'Clase','htmlOptions'=>array('width'=>'400')),
		//'rucpro',
		
		
	),
)); ?>
<div class="row buttons">
		<?php echo CHtml::submitButton('Seleccionar'); ?>
	</div>
<?php $this->endWidget(); ?>

</div >