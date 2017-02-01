

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
	'method'=>'GET',
)); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'documentos-grid',
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',

	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
						array(
									'class'=>'CCheckBoxColumn',
									'selectableRows' => 1,
									'value'=>'$data->codc."_".$data->desceco',
									'checkBoxHtmlOptions' => array(                
																'name' => 'checkselected[]',
																	),
           // 'id'=>'cajita' // the columnID for getChecked
							),
	
		'clasecolector'=>array(
		'name'=>'clasecolector',
		'value'=>'$data->clasecolector',
		 'filter'=> 
              CHtml::listData(Tipimputa::model()->findAll(),'codimpu','desimputa')
           
		),
		
		'codc',
		'desceco',
		
	),
)); ?>
<div class="row buttons">
		<?php echo CHtml::submitButton('Seleccionar  C'); ?>
	</div>
<?php $this->endWidget(); ?>