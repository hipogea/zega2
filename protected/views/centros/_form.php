<?php
/* @var $this CentrosController */
/* @var $model Centros */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'centros-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'codcen'); ?>
		<?php echo $form->textField($model,'codcen',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'codcen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codsoc'); ?>
		<?php echo $form->textField($model,'codsoc',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'codsoc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nomcen'); ?>
		<?php echo $form->textField($model,'nomcen',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'nomcen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descricen'); ?>
		<?php echo $form->textArea($model,'descricen',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descricen'); ?>
	</div>

	


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>

<?php MiFactoria::titulo("Parametros de Configuracion", "basket") ?>

<?php  $this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'settings-grid',      
      'mergeColumns' => array('codocu'),
	'dataProvider'=>$modeloconf->search_por_centro($model->codcen),
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'filter'=>$modeloconf,
	'columns'=>array(
             array('name'=>'codocu','header'=>'Documento','value'=>'$data->documentos->desdocu','filter'=>CHTml::listData(Documentos::model()->findAll(),'coddocu','desdocu'), 'htmlOptions'=>array('width'=>400),),
		 array('name'=> 'codparam','type'=>'raw','value'=>'CHtml::openTag("span",array("class"=>"label badge-success")).$data->codparam.CHtml::closeTag("span")'),
		array('name'=>'desparam','header'=>'Parametro','value'=>'$data->parametros->desparam', 'htmlOptions'=>array('width'=>400),),
		array('name'=>'valor','type'=>'raw','value'=>'substr(trim($data->valor),0,40)', 'htmlOptions'=>array('width'=>60)),
		  array('name'=>'id','type'=>'raw','header'=>'Id','value'=>'CHtml::link("editar",yii::app()->createUrl("configuracion/editar",array("id"=>$data->id )   )  )', 'htmlOptions'=>array('width'=>10),),
	
	),
)); ?>
