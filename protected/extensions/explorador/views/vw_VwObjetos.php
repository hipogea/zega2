<br>
<br>
<br>
<br>
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
	'method'=>'GET',
)); ?>


<?php 

/*
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'objetos-grid',
	'dataProvider'=>$model->search(),
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',

	'filter'=>$model,
	'columns'=>array(
						array(
									'class'=>'CCheckBoxColumn',
									'selectableRows' => 1,
									'value'=>'$data->id."_".$data->descripcion',
									'checkBoxHtmlOptions' => array(                
																'name' => 'checkselected[]',
																	),
           // 'id'=>'cajita' // the columnID for getChecked
							),
	
		'serie',
		'descripcion',
		'codigo',
		'nombreobjeto',
		'despro',
		'rucpro',
		
		
		
	),
)); */
//var_dump(yii::app()->session['codpro']);die();
$identificador=Clipro::model()->findBYpk(yii::app()->session['codpro'])->creaarboltabla(true);
 //echo " el idnetiifcaor ".$identificador; die();
$this->widget('CTreeView',array(
    'id'=>'menu-treeview',
    'data'=> Arbolobjetosmaster::model()->getTreeItems($identificador,false),
    'control'=>'#treecontrol',   
    'animated'=>'fast',
    'collapsed'=>true,
    'htmlOptions'=>array(
        'class'=>'filetree'
    )
));




?>
<div class="row buttons">
		<?php echo CHtml::submitButton('Seleccionar'); ?>
	</div>
<?php $this->endWidget(); ?>