
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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',
	'id'=>'maestrocompo-grid',
	'dataProvider'=>$model->search_aprobados(),
	'summaryText'=>'',
	'filter'=>$model,
	'columns'=>array(
		array(
									'class'=>'CCheckBoxColumn',
									'selectableRows' => 1,
									'value'=>'$data->numero."_".$data->numero',
									'checkBoxHtmlOptions' => array(                
																'name' => 'checkselected[]',
																	),
           // 'id'=>'cajita' // the columnID for getChecked
							),
		ARRAY('name'=>'numero','header'=>'Codigo','htmlOptions'=>array('width'=>'100')),
		'desum',
		'codart',
		ARRAY('name'=>'cant_pendiente','header'=>'Cant Pend','value'=>'(is_null($data->cant_pendiente))?$data->cant:$data->cant_pendiente','htmlOptions'=>array('width'=>'50')),
		ARRAY('name'=>'txtmaterial','header'=>'Descripcion','htmlOptions'=>array('width'=>'400')),
		//ARRAY('name'=>'marca','header'=>'Marca','htmlOptions'=>array('width'=>'10')),
		//ARRAY('name'=>'modelo','header'=>'Modelo','htmlOptions'=>array('width'=>'10')),
		/*
		'nparte',
		'codpadre',
		'um',		
		'detalle',
		'modificadopor',
		'modificadoel',
		'creadoel',
		'creadopor',
		'clase',
		'codmaterial',
		'flag',
		'codtipo',
		'id',
		*/
		
	),
)); ?>

<?php $this->endWidget(); ?>


</div>