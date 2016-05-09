<div class="division">


<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
	'method'=>'GET',
)); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'lugares-grid',
	'dataProvider'=>$model->search(),
	//'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/g.css'),
     'cssFile' => Yii::app()->getTheme()->baseUrl. '/css/style-grid-busqueda.css',       
	'filter'=>$model,
	'summaryText'=>'',
	'columns'=>array(
						array(
									'class'=>'CCheckBoxColumn',
									'selectableRows' => 1,
									'value'=>'$data->codlugar."_".$data->deslugar',
									'checkBoxHtmlOptions' => array(                
																'name' => 'checkselected[]',
																	),
           // 'id'=>'cajita' // the columnID for getChecked
							),
	
		'codlugar',
		'despro',
		'c_direc',
		'deslugar',
		'provincia',
		
		
	),
)); ?>
<div class="row buttons">
		<?php echo CHtml::submitButton('Seleccionar'); ?>
	</div>
<?php $this->endWidget(); ?>
</div>