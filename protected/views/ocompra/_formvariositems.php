<div>

	<?php $form=$this->beginWidget('CActiveForm', array(
		'enableAjaxValidation'=>true,
		'method'=>'POST',
	)); ?>
<div class="row">
		<?php echo $form->hiddenField($modelocabeza,'idguia');?>
</div>
	<div class="row">
		<div class='botones'>
			<?php echo CHtml::imageButton(Yii::app()->getTheme()->baseUrl.'/img/pin.png',array('width'=>25,'height'=>25,'value'=>'','onClick'=>'Loading.show();Loading.hide();'));?>
		</div>
	</div>


<div class="row">

</div>
<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',
	'id'=>'ocompra-grid',
	'filter'=>$model,
	//'dataProvider'=>$model->search_aprobados(),
	'dataProvider'=>($modelocabeza->tipologia=='W')?$model->search_servicio():$model->search(),
	'summaryText'=>'',

	'columns'=>array(
		array(
			'class'=>'CCheckBoxColumn',
			'selectableRows' => 20,
			'value'=>'$data->id',
			'checkBoxHtmlOptions' => array(
				'name' => 'cajita[]',
			),
			// 'id'=>'cajita' // the columnID for getChecked
		),
		ARRAY('name'=>'numero','header'=>'Num Solic','htmlOptions'=>array('width'=>'100')),
		'desum',
		'codart',
		//'escompra',
		//'externo',
		ARRAY('name'=>'cant_pendiente','header'=>'Cant Pend','value'=>'(is_null($data->cant_pendiente))?$data->cant:$data->cant_pendiente','htmlOptions'=>array('width'=>'50')),
		ARRAY('name'=>'txtmaterial','header'=>'Descripcion','htmlOptions'=>array('width'=>'400')),

	),
)); ?>

	<?php $this->endWidget(); ?>


</div>


