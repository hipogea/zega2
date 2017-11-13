<?php
/* @var $this FondofijoController */
/* @var $model Fondofijo */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fondofijo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row">


		<?php echo $form->labelEx($model,'socio'); ?>


		<?php  $datos1 = CHtml::listData(Sociedades::model()->findAll(array('order'=>'dsocio')),'socio','dsocio');
		echo $form->DropDownList($model,'socio',$datos1, array('empty'=>'--Seleccione un emisor--')  )  ;
		?>
		<?php echo $form->error($model,'socio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desfondo'); ?>
		<?php echo $form->textField($model,'desfondo',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'desfondo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codtra'); ?>
		<?php
		$this->widget('ext.matchcode.MatchCode',array(
			'nombrecampo'=>'codtra',
			'ordencampo'=>1,
			'controlador'=>$this->id,
			'relaciones'=>$model->relations(),
			'tamano'=>6,
			'model'=>$model,
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
			'nombreframe'=>'cru-frame3',
			'nombrearea'=>'fhdfa34jfdfdf',
		)); ?>
		<?php echo $form->error($model,'codtra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codcen'); ?>
		<?php $datos1 = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		echo $form->DropDownList($model,'codcen',$datos1, array('empty'=>'--Seleccione un centro--',
		) ) ; ?>
		<?php echo $form->error($model,'codcen'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'fondo'); ?>
		<?php echo $form->textField($model,'fondo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'fondo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codmon'); ?>
		<?php
		$this->widget('ext.matchcode.MatchCode',array(
			'nombrecampo'=>'codmon',
			'ordencampo'=>1,
			'controlador'=>$this->id,
			'relaciones'=>$model->relations(),
			'tamano'=>6,
			'model'=>$model,
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
			'nombreframe'=>'cru-frame3',
			'nombrearea'=>'fhdfxx34a34',
		)); ?>
		<?php echo $form->error($model,'codmon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codarea'); ?>
		<?php $datos1 = CHtml::listData(Areas::model()->findAll(array('order'=>'area')),'codarea','area');
		echo $form->DropDownList($model,'codarea',$datos1, array('empty'=>'--Seleccione un Dpto--',
		) ) ; ?>
		<?php echo $form->error($model,'codarea'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numerodias'); ?>
		<?php echo $form->textField($model,'numerodias'); ?>
		<?php echo $form->error($model,'numerodias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ejercicio'); ?>
		<?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			//'name'=>'my_date',
			'model'=>$model,
			'attribute'=>'ejercicio',
			'language'=>Yii::app()->language=='es' ? 'es' : null,
			'options'=>array(
				'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
				'showOn'=>'button', // 'focus', 'button', 'both'
				'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
				'buttonImageOnly'=>true,
				'changeYear'=>true,
				'dateFormat'=>'yy',
			),
			'htmlOptions'=>array(
				'style'=>'width:60px;vertical-align:top',
				'readonly'=>'readonly',
			),
		)); ?>
		<?php echo $form->error($model,'ejercicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gastomax'); ?>
		<?php echo $form->textField($model,'gastomax',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'gastomax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'porctolerancia'); ?>
		<?php echo $form->textField($model,'porctolerancia',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'porctolerancia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rojo'); ?>
		<?php echo $form->textField($model,'rojo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rojo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'naranja'); ?>
		<?php echo $form->textField($model,'naranja',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'naranja'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'azul'); ?>
		<?php echo $form->textField($model,'azul',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'azul'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
</div>


<div class="division">
<div class="wide form">
<?php
Yii::app()->clientScript->registerScript('search', "
$('.activados-form form').submit(function(){
	$('#fondofijo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
    <div class="activados-form">
       <?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
            )); ?> 
  




	<div class="row">
		<?php echo $form->labelEx($modelito,'serie'); ?>
		<?php echo $form->textField($modelito,'serie',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($modelito,'serie'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($modelito->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>
        

<?php $this->endWidget(); ?>
    </div>
    
    
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'fondofijo-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'id',
		'desfondo',
		'codtra',
		'codcen',
		'iduser',
		'fondo',
		/*
		'codmon',
		'numerodias',
		'gastomax',
		'rojo',
		'naranja',
		'azul',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{view}'
		),
	),
)); ?>
    
    
</div>
</div>


















<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'Explorador',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>800,
		'height'=>600,
	),
));
?>
	<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>