<?php
/* @var $this ObjetosClienteController */
/* @var $model ObjetosCliente */
/* @var $form CActiveForm */
?>
<?php
$this->menu=array(
	//array('label'=>'List ObjetosCliente', 'url'=>array('index')),
	array('label'=>'Listado', 'url'=>array('equipos')),
);

?>

<div class="form">
	<div class="division">
		<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'objetos-cliente-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row">
            <?php echo CHtml::label('Cliente',uniqid() ) ?>
            <?php 
            echo CHtml::textField(uniqid(),$model->objetoscliente->clipro->codpro,array("disabled"=>"disabled","size"=>6)); 
            echo CHtml::textField(uniqid(),$model->objetoscliente->clipro->despro,array("disabled"=>"disabled","size"=>30)); 
            ?>
	</div>
        <div class="row">
            <?php echo CHtml::label('Objetos Contenedor',uniqid()) ?>
            <?php 
             echo CHtml::textField(uniqid(),$model->objetoscliente->codobjeto,array("disabled"=>"disabled","size"=>3)); 
           
            echo CHtml::textField(uniqid(),$model->objetoscliente->nombreobjeto,array("disabled"=>"disabled","size"=>30)); 
            ?>
	</div>
        <div class="row">
            <?php echo CHtml::label('Clase',uniqid()) ?>
            <?php 
            echo CHtml::textField(uniqid(),$model->masterequipo->codigo,array("disabled"=>"disabled","size"=>8));
            echo CHtml::textField(uniqid(),$model->masterequipo->descripcion,array("disabled"=>"disabled","size"=>40));
            ?>
	</div>
           <div class="row">
               <?php if($model->parent_id >0){ ?> 
            <?php echo CHtml::label( 'Equipo padre ',uniqid()) ?>
            <?php echo CHtml::textField(uniqid(), VwObjetos::model()->findByPk($model->parent_id)->descripcion);  ?>
               
               <?php } ?> 
	</div>
              
             
                    
	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>
            
            <div class="row">
		<?php echo $form->labelEx($model,'identificador'); ?>
		<?php echo $form->textField($model,'identificador',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'identificador'); ?>
	</div>
            
            <div class="row">
		<?php echo $form->labelEx($model,'serie'); ?>
		<?php echo $form->textField($model,'serie',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'serie'); ?>
	</div>
            

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->checkBox($model,'activo'); ?>
		
	</div>
            <div class="row">
		<?php echo $form->labelEx($model,'esubicacion'); ?>
		<?php echo $form->checkBox($model,'esubicacion'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'textolargo'); ?>
		<?php echo $form->textArea($model,'textolargo',array('rows'=>3, 'cols'=>20)); ?>
		<?php echo $form->error($model,'textolargo'); ?>
	</div>	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

	</div>

	









<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog',
	'options'=>array(
		'title'=>'Objeto a Incorporar',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>500,
		'height'=>400,
	),
));
?>
	<iframe id="cru-frame" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>

<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'Material a Incorporar',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>500,
		'height'=>400,
	),
));
?>
	<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>
