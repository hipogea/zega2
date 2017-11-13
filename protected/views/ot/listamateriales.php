
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
	'method'=>'GET',
)); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'Inventario-grid',
	'dataProvider'=>$model->search(),
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranaja.css',
	'filter'=>$model,
	'columns'=>array(
						array(
									'class'=>'CCheckBoxColumn',
									'selectableRows' => 1,
									'value'=>'$data->id."_".$data->nombrelista',
									'checkBoxHtmlOptions' => array(                
																'name' => 'checkselected[]',
																	),
							'htmlOptions'=>array('width'=>10)
           // 'id'=>'cajita' // the columnID for getChecked
							),

                array(
		'name'=>'codtipo',
		'value'=>'$data->codtipo',
		 'filter'=> 
              CHtml::listData(Tipolista::model()->findAll(),'codtipo','destipo')
           
		),
		'nombrelista',
            'comentario',
		
	),
)); ?>


<div class="row buttons">
		<?php echo CHtml::submitButton('Seleccionar'); ?>
	</div>
<?php $this->endWidget(); ?>