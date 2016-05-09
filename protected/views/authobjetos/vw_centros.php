
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'solpe-form',
	'enableAjaxValidation'=>false,
)); ?>


<?php
$comboList = array();
foreach(Yii::app()->user->um->listUsers() as $user){
	$comboList[$user->primaryKey] = $user->username;
}
ECHO CHTml::dropDownList('iduser','',$comboList, array('empty'=>'--Seleccione usuario--'));
?>


<?php
$prove=Centros::model()->search();
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',
	'dataProvider'=>$prove,
	//'filter'=>$model,
	//'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'summaryText'=>'->',
	'columns'=>array(
			

			array(
           'class'=>'CCheckBoxColumn',
		    'selectableRows' => 20,
		    'value'=>'$data->codcen',
			'checkBoxHtmlOptions' => array(                
				'name' => 'cajita[]',
			),

       ),

			array('name'=>'nomcen','header'=>'nombre','htmlOptions'=>array('width'=>125)),

	),
)); ?>

<?php echo CHtml::submitButton('Seleccionar');  ?>
<?php $this->endWidget(); ?>