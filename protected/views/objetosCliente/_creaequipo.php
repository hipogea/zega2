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
<?php echo $form->labelEx($model2,'codpro'); ?>

		<?php $this->widget('ext.matchcode.MatchCode',array(
			'nombrecampo'=>'codpro',
			'ordencampo'=>1,
			'controlador'=>$this->id,
			'relaciones'=>$model2->relations(),
			'tamano'=>8,
			'model'=>$model2,
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
			'nombreframe'=>'cru-frame3',
			'nombrearea'=>'f677hdfssesj',
		));
		?>
	

	<?php echo $form->error($model,'codpro'); ?>
	</div>
              
                    
                    <div class="row">
        <?php echo $form->labelEx($model,'hidobjeto'); ?>
      <?php
		if(!$model->isNewRecord){
                    $criterio=new CDbCriteria;
		$criterio->addcondition("codpro='".$model->clipro->codpro."'");
		$datos1 = CHtml::listData(ObjetosCliente::model()->findAll($criterio),'id','nombreobjeto');
		
                }else{
                    $datos1=array();
                }
             echo Chtml::ajaxLink(
			Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."filter.png"),
			CController::createUrl($this->id.'/ajaxobjetosporclipro'), array(
				'type' => 'POST',
				'url' => CController::createUrl($this->id.'/ajaxobjetosporclipro'), //  la acción que va a cargar el segundo div
				'update' => '#Objetosmaster_hidobjeto', // el div que se va a actualizar
				'data'=>array('identidad'=>'js:ObjetosCliente_codpro.value'),
			)

		);
		echo $form->DropDownList($model,'hidobjeto',$datos1, array('empty'=>'--Seleccione Emplazamiento--' ) ) ;



		?>
           
               <?php echo $form->error($model,'hidobjeto'); ?>     
                    </div>       
                    
                    
                    
                    
                    
                    
                    
                    
          	<div class="row">
        <?php echo $form->labelEx($model,'hcodobmaster'); ?>

		<?php $this->widget('ext.matchcode.MatchCode',array(
			'nombrecampo'=>'hcodobmaster',
                    'nombrecamporemoto'=>'codigo',
			'ordencampo'=>3,
			'controlador'=>$this->id,
			'relaciones'=>$model->relations(),
			'tamano'=>8,
			'model'=>$model,
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
			'nombreframe'=>'cru-frame3',
			'nombrearea'=>'f6ghhghdfssesj',
		));
		?>
	

	<?php echo $form->error($model,'hcodobmaster'); ?>
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

	 <div class="row">
	  
		
		<?php echo $form->labelEx($model,'parent_id'); ?>
             <?php
		if(!$model->isNewRecord){
                    $criterio=new CDbCriteria;
		$criterio->addcondition("hidobjeto='".$model->codpro."'");
		$datos1 = CHtml::listData(Contactos::model()->findAll($criterio),'id','c_nombre');
		
                }else{
                    $datos1=array();
                }
             echo Chtml::ajaxLink(
			Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."filter.png"),
			CController::createUrl($this->id.'/ajaxequiposporobjeto'), array(
				'type' => 'POST',
				'url' => CController::createUrl($this->id.'/ajaxequiposporobjeto'), //  la acción que va a cargar el segundo div
				'update' => '#Objetosmaster_parent_id', // el div que se va a actualizar
				'data'=>array('identidad'=>'js:Objetosmaster_hidobjeto.value'),
			)

		);
		echo $form->DropDownList($model,'parent_id',$datos1, array('empty'=>'--Seleccione Emplazamiento contenedor--' ) ) ;



		?>
             
		
		<?php echo $form->error($model,'parent_id'); ?>
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
