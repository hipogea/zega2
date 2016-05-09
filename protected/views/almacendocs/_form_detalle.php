<?php
/* @var $this DetguiController */
/* @var $model Detgui */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">
 <?php  
 $habil=$this->eseditablecab($idcabeza);
    $habilitado='disabled'; //Siempre empezando por el lado mas restrictivo, asumimos que no hay permiso
     //if (isset($_GET['ed'])) {   //si alguien coloco la URL EDITAR
     		//if ($_GET['ed']=='si') //si se presiono la opcion editar
     			if ($habil==='si') //si es editable la guia (VERIFICADO EN BASE DE DATOS)
     			   $habilitado='';
  ?>
		<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detgui-form',
	'enableClientValidation'=>true,
			'clientOptions' => array(
				'validateOnSubmit'=>true,
				'validateOnChange'=>true
			),
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo ($model->isNewRecord)?$form->hiddenField($model,'hidvale',array('value'=>$idcabeza)):''; ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'codocuref'); ?>
		<?php

		echo " escenario ".$model->getScenario();

		//$datos1 = CHtml::listData(Documentos::model()->findAll(array('order'=>'desdocu')),'coddocu','desdocu');
		//echo $form->DropDownList($model,'codocuref',$datos1, array('empty'=>'--Seleccione un documento--', 'disabled'=>($model->isNewRecord)?'':'disabled'   ) ) ;


		?>
		<?php// echo $form->error($model,'codocuref'); ?>
	</div>



	<div class="row">
		<?php //echo $form->labelEx($model,'numdocref'); ?>
		<?php //echo $form->textField($model,'numdocref',array('size'=>14,'maxlength'=>14, 'disabled'=>$habilitado)); ?>
		<?php //echo $form->error($model,'numdocref'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php if (in_array($model->codmov,$model->campoeditable()['codart']))

		{

			$this->widget('ext.matchcode.MatchCode',array(
				'nombrecampo'=>'codart',
				'ordencampo'=>6,
				'controlador'=>'Tempalkardex',
				'relaciones'=>$model->relations(),
				'tamano'=>8,
				'model'=>$model,
				'form'=>$form,
				'nombredialogo'=>'cru-dialog3',
				'nombreframe'=>'cru-frame3',
				'nombrearea'=>'fhdfj',
			));

		} else{
			echo CHtml::textField('a',$model->maestro->descripcion,array('disabled'=>'disabled','size'=>40)) ;

		}

		?>

		<?php echo $form->error($model,'codart'); ?>
	</div>
 
	<div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php echo $form->textField($model,'cant',array('size'=>8,'maxlength'=>8, 'disabled'=>(in_array($model->codmov,$model->campoeditable()['cant']))?'':'disabled'   )); ?>
		<?php echo $form->error($model,'cant'); ?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'preciounit'); ?>
		<?php echo $form->textField($model,'preciounit',array('size'=>8,'maxlength'=>8, 'disabled'=>(in_array($model->codmov,$model->campoeditable()['preciounit']))?'':'disabled' )); ?>
		<?php
		echo (!$model->isNewRecord)?$moneda=$model->alkardex_alinventario->almacen->codmon:
		Almacendocs::model()->findByPk($idcabeza)->almacenes->codmon;
		?>
		<?php echo $form->error($model,'preciounit'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>
	<?php  echo Chtml::ajaxLink(
		Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."filter.png"),
		CController::createUrl('Ums/cargaum'), array(
			'type' => 'POST',
			'url' => CController::createUrl('Ums/cargaum'), //  la acci?n que va a cargar el segundo div
			'update' => '#Tempalkardex_um', // el div que se va a actualizar
			'data'=>array('codigomaterial'=>'js:Tempalkardex_codart.value'),
		)

	);?>

	<?php IF($model->isNewRecord ){ ?>
<?php
//$datos = CHtml::listData(Ums::model()->findAll(),'um','desum');
		$datos=array();
		echo $form->DropDownList($model,'um',$datos, array( 'disabled'=>(in_array($model->codmov,$model->campoeditable()['um']))?'':'disabled', 'maxlength'=>4)  )  ;
		?>
	<?php }  else { ?>
		<?php echo $form->DropDownList($model,'um',Alconversiones::Listadoums($model->codart), array('empty'=>'--Um--', 'disabled'=>(in_array($model->codmov,$model->campoeditable()['um']))?'':'disabled', 'maxlength'=>4)  )  ; ?>


	<?php   } ?>

		<?php echo $form->error($model,'um'); ?>


</div>


	<div class="row">

		<?php echo $form->labelEx($model,'colector');
		?>
    <?php  if(!in_array($model->codmov,$model->campoeditable()['colector']))  {  ?>
		<?php echo $form->textField($model,'colector',array('size'=>18,'maxlength'=>18, 'disabled'=>(in_array($model->codmov,$model->campoeditable()['colector']))?'':'disabled' )); ?>
			<?php echo $form->error($model,'colector'); ?>
	<?php } else {  ?>
			<?php $this->widget('ext.matchcodesimple.MatchCodeSimple',array(
				'nombrecampo'=>'colector',
				'controlador'=>'Tempalkardex',
				'tamano'=>18,
				'model'=>$model,
				'nombreclase'=>'Cc',
				'form'=>$form,
				'nombredialogo'=>'cru-dialog3',
				'nombreframe'=>'cru-frame3',
			));
			?>
        <?php }  ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'textolargo'); ?>
		<?php echo $form->textArea($model,'textolargo',array('columns'=>4,'rows'=>6,  'disabled'=>(in_array($model->codmov,$model->campoeditable()['textolargo']))?'':'disabled'  )); ?>
		<?php echo $form->error($model,'textolargo'); ?>
	</div>

	<?php
	if($model->alkardex_almacendocs->cestadovale==ESTADO_EFECTUADO AND $model->alkardex_almacendocs->almacenmovimientos->signo < 0  ) {	?>
		<div class="row">
			<?php echo CHtml::label('Punto expedicion','lblpuntoexped'); ?>
			<?php $datos1 = CHtml::listData ( Puntodespacho::model ()->findAll ( " codcen='" . $model->codcentro . "'" ) , 'id' , 'nombrepunto' );
			echo CHtml::DropDownList ( 'cbopuntoexped' , 'codtcentro' , $datos1 , array ( 'empty' => '--Selecc pto expedicion--' ,
			) );
			?>


			<?php
			echo CHtml::ajaxSubmitButton("Pick",
				array("almacendocs/expedicion"),
				array("type"=>"POST",
					"data"=>array(
						"codiguito"=>"js:cbopuntoexped.value",
						"identidad"=>"js:Almacendocs_id.value",
						"responsable"=>"js:cboresponsable.value",
					),
					"update" => "#zonadespacho",
				), array('onClick'=>'Loading.show();Loading.hide(); return false;')
			) ;
			?>
		</div>

		<?php
		if(is_null($model->alkardex_almacendocs->codtrabajador) or empty($model->alkardex_almacendocs->codtrabajador) ) {	?>
			<div class="row">
				<?php echo CHtml::label('Responsable','Responsable');  ?>
				<?php  $datos = CHtml::listData(VwTrabajadores::model()->findAll(array('order'=>'ap')),'codigotra','nombrecompleto');
				echo CHtml::DropDownList ( 'cboresponsable' , 'responsable' ,$datos, array('empty'=>'--Seleccione un responsable--')  );
				?>
			</div>
		<?php } else {
			echo CHtml::hiddenField('cboresponsable',$model->codtrabajador);
		} ?>


	<?php }	?>
	

	
	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

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
        'width'=>400,
        'height'=>300,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>