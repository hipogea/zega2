

    
            <div class="wide form">

                	<?php $form=$this->beginWidget('CActiveForm', array(
	                              'id'=>'solpe-form',
	                              'enableAjaxValidation'=>false,
                                               )); ?>





                <BR>

				<div class="row">
					<?php
					$botones=array(
						'go'=>array(
							'type'=>'A',
							'ruta'=>array(),
							'visiblex'=>array(NUll),
						),
						'save'=>array(
							'type'=>'A',
							'ruta'=>array(),
							'visiblex'=>array(ESTADO_CREADO,ESTADO_PREVIO),
						),


						'ok'=>array(
							'type'=>'B',
							'ruta'=>array($this->id.'/procesarsolpe',array('id'=>$model->id,'ev'=>60)),
							'visiblex'=>array(ESTADO_CREADO),

						),
						'print'=>array(
							'type'=>'B',
							'ruta'=>array($this->id.'/imprimir2',array('id'=>$model->id)),
							'visiblex'=>array(ESTADO_AUTORIZADO,ESTADO_CREADO),

						),
						'tacho'=>array(
							'type'=>'B',
							'ruta'=>array($this->id.'/procesarsolpe',array('id'=>$model->id,'ev'=>61)),
							'visiblex'=>array(ESTADO_CREADO),

						),

						'pack'=>array(
							'type'=>'B',
							'ruta'=>array($this->id.'/reservaautomatica',array('id'=>$model->id)),
							'visiblex'=>array(ESTADO_AUTORIZADO),

						),
						'listfav'=>array(
							'type'=>'C',
							'ruta'=>array($this->id.'/creafavorito',array(
								'id'=>$model->id,
								//"id"=>$model->n_direc,
								"asDialog"=>1,

							)
							),
							'dialog'=>'cru-dialogfavorito',
							'frame'=>'cru-detallefav',
							'visiblex'=>array(ESTADO_CREADO,ESTADO_AUTORIZADO),

						),



						'out'=>array(
							'type'=>'B',
							'ruta'=>array($this->id.'/admin',array('id'=>$model->id)),
							'visiblex'=>array(ESTADO_PREVIO,ESTADO_CREADO,ESTADO_AUTORIZADO,ESTADO_ANULADO,NULL),
						),

					);

     if($model->escompra=='O'){
		 UNSET($botones['tacho']);UNSET($botones['save']);UNSET($botones['go']);
	 }




					$this->widget('ext.toolbar.Barra',
						array(
							//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
							'botones'=>$botones,
							'size'=>24,
							'extension'=>'png',
							'status'=>$model->estado,

						)
					);?>

				</div>













	<div class="panelizquierdo">
	<div class="row">
		<?php if (!$model->isNewRecord) {?>
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>10,'maxlength'=>10,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'numero'); ?>
		<?php } ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'escompra'); ?>
		<?php
		if($model->isNewRecord){
			$datos1 = CHtml::listData(Tiposolpe::model()->findAll("libre='1'"),'codtipo','destipo');
		}else{
			$datos1 = CHtml::listData(Tiposolpe::model()->findAll(),'codtipo','destipo');
		}
		echo $form->DropDownList($model,'escompra',$datos1, array('empty'=>'--Seleccione un tipo--','disabled'=>(!$model->isNewRecord)?'disabled':'')  )  ;
		?>
		<?php echo $form->error($model,'escompra'); ?>
	</div>


	
<div class="row">
		<?php //echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->hiddenField($model,'estado',array('value'=>$model->estado)); ?>
		
	</div>
	<div class="row">
		<?php if (!$model->isNewRecord){?>
		<?php echo $form->labelEx($model,'estado'); ?>

		<?php  echo CHtml::textfield('aaaa',$model->solpe_estado->estado,array('disabled'=>'disabled'));  ?>
		<?php } ?>
	</div>

	</div>

	<div class="panelizquierdo">
	<div class="row">

		<?php echo $form->labelEx($model,'textocabecera'); ?>
		<?php echo $form->textArea($model,'textocabecera',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'textocabecera'); ?>
	</div>

	</div>
	
<?php

 if ( !$model->isNewRecord )  {
			echo $form->hiddenField($model,'id',array('value'=>$model->id));	  

				}

?>


				<?php

				if ( !$model->isNewRecord )  {
					$this->renderpartial('vw_detalle_solpe',array('modelcabecera'=>$model,'eseditable'=>$this->eseditable($model->estado)));
				}
				?>


<?php $this->endWidget(); ?>
    <div class="row"></div>
    <div id="zona"></div>
 </div><!-- form -->






