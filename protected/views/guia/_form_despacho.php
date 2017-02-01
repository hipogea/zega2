<div class="division">
	<div class="wide form">


		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'guia-form',
			'enableClientValidation'=>true,
			'clientOptions' => array(
				'validateOnSubmit'=>true,
				'validateOnChange'=>true
			),
			'enableAjaxValidation'=>false,

		)); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'hidvale'); ?>
		<?php  /*$datos1 = CHtml::listData(VwDespachogeneral::model()->findAll(),'hidvale','numvale');
		echo $form->DropDownList('selector',0,$datos1, array( 'ajax' => array('type' => 'POST',
			'url' => CController::createUrl('guia/cargadespacho'), //  la acción que va a cargar el segundo div
			'update' => '#zona' // el div que se va a actualizar
		),
			'empty'=>'--Seleccione un despacho--',) ) ;

*/
		?>

	</div>
            <div class="row">
            <?php if(yii::app()->settings->get('transporte','transporte_objinterno')=='1') { ?>
		<?php echo $form->labelEx($model,'c_codep'); ?>
		<?php  $datos1 = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
		  echo $form->DropDownList($model,'c_codep',$datos1, array('empty'=>'--Seleccione una referencia--',  'disabled'=>$habilitado,
													   'options'=>array(
													          isset(Yii::app()->session['c_codep'])?Yii::app()->session['c_codep']:$model->c_codep=>array('selected'=>true)
																		)  ) ) ;
		?>
		<?php echo $form->error($model,'c_codep'); ?>
            <?php  }  ?>
	</div>
            <div class="row">
		<?php echo $form->labelEx($model,'c_edgui'); ?>
		<?php  $datos11 = CHtml::listData(Paraqueva::model()->findAll(array('order'=>'motivo')),'cmotivo','motivo');
		  echo $form->DropDownList($model,'c_edgui',$datos11, array('empty'=>'--Seleccione un destino--',  'disabled'=>$habilitado,
													   'options'=>array(
													          isset(Yii::app()->session['c_edgui'])?Yii::app()->session['c_edgui']:$model->c_edgui=>array('selected'=>true)
																		) ))  ;
		?>
            
            
            
		<?php echo $form->error($model,'c_edgui'); ?>
	</div>
            
            <div class="row">
		<?php
		if(yii::app()->settings->get('transporte','transporte_objenguia')=='1') {

			?>
			<?php echo $form->labelEx($model, 'codob'); ?>
			<?php
					$codpro=Guia::model()->findByPk($idcabeza)->c_coclig;
			?>
			<?php $datos = CHtml::listData( ObjetosCliente::model()->findAll(array('condition'=>"codpro=:codpro",'params'=>array(':codpro'=>$guia->c_coclig),'order' => 'nombreobjeto')), 'codobjeto', 'nombreobjeto');
			//var_dump($guia->attributes);die();
                        echo $form->DropDownList($model, 'codob', $datos, array('empty' => '--Seleccione un objeto--', 'disabled' => $habilitado,
				'options' => array(
					isset(Yii::app()->session['codob']) ? Yii::app()->session['codob'] : $model->c_edgui => array('selected' => true)
				)));
			?>
			<?php echo $form->error($model, 'codob'); ?>
		<?php
		         }
		?>
	</div>
            
		
            
            <?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',
	'dataProvider'=>VwDespacho::model()->search_vigente(),
	//'filter'=>$model,
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_mediano.css',  // your version of css file
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'summaryText'=>'',
	'columns'=>array(
			

			array(
           'class'=>'CCheckBoxColumn',
		    'selectableRows' => 20,
		    'value'=>'$data->id',
			'checkBoxHtmlOptions' => array(                
				'name' => 'cajita[]',
				//'enabled'=>'(($data->coddocu=="001") and ($data->codpro <> "R00001"))?"false":"true"',
                 //'disabled'=>'true',
		   ),
           // 'id'=>'cajita' // the columnID for getChecked
       ),
            'numvale',
            'movimiento',
	     'codart',
              'cant',
              'desum',
            'descripmaterial',
	),
)); ?>


            <div class="row buttons">
		<?php echo CHtml::submitButton('Agregar Despachos Seleccionados' ); ?>
	</div>
            
            

		<?php $this->endWidget(); ?>
	</div>
</div>


<div id="zona"></div>


