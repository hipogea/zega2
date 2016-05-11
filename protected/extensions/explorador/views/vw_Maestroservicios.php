
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
	'dataProvider'=>$model->search_window(),
	'summaryText'=>'',
	'filter'=>$model,
	'columns'=>array(
		array(
									'class'=>'CCheckBoxColumn',
									'selectableRows' => 1,
									'value'=>'$data->codserv."_".$data->codserv',
									'checkBoxHtmlOptions' => array(                
																'name' => 'checkselected[]',
																	),
           // 'id'=>'cajita' // the columnID for getChecked
							),
		ARRAY('name'=>'codserv','header'=>'Codigo','htmlOptions'=>array('width'=>'100')),
		ARRAY('name'=>'descripcion','header'=>'Descripcion','htmlOptions'=>array('width'=>'400')),
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