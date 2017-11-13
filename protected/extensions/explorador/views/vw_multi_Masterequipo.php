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
	'id'=>'inventario-grid',
	'dataProvider'=>$model->search(),
    'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',

    'summaryText'=>'',
    'filter'=>$model,
	'columns'=>array(
						array(
									'class'=>'CCheckBoxColumn',
									'selectableRows' => 10,
									'value'=>'$data->codigo',
									'checkBoxHtmlOptions' => array(                
																'name' => 'checkselected[]',
										'width'=>'10'
																	),
           // 'id'=>'cajita' // the columnID for getChecked
							),
	
		ARRAY('name'=>'codigo','header'=>'Codigo','htmlOptions'=>array('width'=>'40')),
		ARRAY('name'=>'descripcion','header'=>'Descripcion','htmlOptions'=>array('width'=>'200')),
		ARRAY('name'=>'marca','header'=>'Marca','htmlOptions'=>array('width'=>'100')),
		ARRAY('name'=>'modelo','header'=>'Modelo','htmlOptions'=>array('width'=>'100')),
		
		
	),
)); ?>

<?php $this->endWidget(); ?>