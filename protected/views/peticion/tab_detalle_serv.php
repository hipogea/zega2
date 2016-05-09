

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('disabled'=>'disabled','size'=>1)); ?>

	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php echo $form->textField($model,'cant'); ?>
		<?php echo $form->error($model,'cant'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>
		<?php
		$datos = CHtml::listData(Ums::model()->findAll(),'um','desum');
		echo $form->DropDownList($model,'um',$datos, array('empty'=>'--Unidad de medida--')  )  ;
		?>
		<?php echo $form->error($model,'um'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'codservicio'); ?>
		<?php $this->widget('ext.matchcode.MatchCode',array(
			'nombrecampo'=>'codservicio',
			//'pintarcaja'=>1, ///indica si debe de pintar el textbox al iniciar
			'ordencampo'=>2,
			'controlador'=>'Tempdpeticion',
			'relaciones'=>$model->relations(),
			'tamano'=>8,
			//'habilitado'=>true,
			'model'=>$model,
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
			'nombreframe'=>'cru-frame3',
			'nombrearea'=>'miffuufu',
			//'nombrecampoareemplazar'=>'descripcion',
			//'comopintar'=>'c_descri',//Significa que va a ha reemplazar al imput del campo
		));
		?>

		<?php echo $form->error($model,'codart'); ?>
		<?php echo $form->error($model,'codart'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'codcen'); ?>
		<?php echo $form->textField($model,'codcen',array('size'=>4,'maxlength'=>4, 'disabled'=>'')); ?>
		<?php echo $form->error($model,'codcen'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>40)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'plista'); ?>
		<?php echo $form->textField($model,'plista'); ?>
		<?php echo $form->error($model,'plista'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disponibilidad'); ?>
		<?php
		$datos = CHtml::listData(Disponibilidad::model()->findAll(),'codisp','dedispo');
		echo $form->DropDownList($model,'disponibilidad',$datos, array('empty'=>'--Disponibilidad--')  )  ;
		?>

		<?php echo $form->error($model,'disponibilidad'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'imputacion'); ?>
		<?php
			$this->widget('ext.matchcode.MatchCode',array(
				'nombrecampo'=>'imputacion',
				//'pintarcaja'=>1, ///indica si debe de pintar el textbox al iniciar
				'ordencampo'=>7,
				'controlador'=>'Tempdpeticion',
				'relaciones'=>$model->relations(),
				'tamano'=>10,
				'model'=>$model,
				'form'=>$form,
				'nombredialogo'=>'cru-dialog3',
				'nombreframe'=>'cru-frame3',
				'nombrearea'=>'hipogeas',
				//'nombrecampoareemplazar'=>'imputacion',
				//'comopintar'=>'c_descri',//Significa que va a ha reemplazar al imput del campo
			));

				echo $form->error($model,'imputacion');

				?>
	</div>




	<div class="row">

		
	</div>





	<div class="row">
		<?php echo ($model->isNewRecord)?$form->hiddenField($model,'hidpeticion',array('value'=>$idcabeza)):""; ?>
	
		
	</div>

