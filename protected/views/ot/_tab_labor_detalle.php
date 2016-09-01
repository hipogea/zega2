

<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detalleoc-form',

	//'enableAjaxValidation'=>true,
	



)); ?>
<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php
	$botones = array(
	'save' => array(
	'type' => 'A',
	'ruta' => array(),
	'visiblex' => array('10'),
	),

      'money' => array(
	'type' => 'C',
	'ruta' => array($this->id . '/verprecios', array(
	'codigomaterial' =>  ``,
	//"id"=>$model->n_direc,
	"asDialog" => 1,
	"gridId" => 'detalle-grid',
	)
	),
	'dialog' => 'cru-dialog3',
	'frame' => 'cru-frame3',
	'visiblex' => array('10'),

	),

	);

		$this->widget('ext.toolbar.Barra',
			array(
				//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
				'botones'=>$botones,
				'size'=>24,
				'extension'=>'png',
				'status'=>'10',

			)
		);

	?>
</div>



	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php  //$datos1tb1x = CHtml::listData(Masterrelacion::model()->findAll("hidhijo=:orden   ",array(":orden"=>$model->ot->objetosmaster->masterequipo->codigo)),'hidpadre','padre.descripcion');
		echo $form->DropDownList($model,'tipo',
			array(
				'C'=>'Servicio de campo',
				'T'=>'Servicio de Taller',
				'A'=>'Asesoria Tecnica',
			), array('empty'=>'--Seleccione un tipo--','disabled'=>$this->eseditable($model->codestado))  )  ;
		?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>


<div class="row">

						<?php echo $form->labelEx($model,'item'); ?>
						<?php echo $form->textField($model,'item',array('size'=>3,'disabled'=>'disabled')); ?>
</div>


	<div class="row">
		<?php echo $form->labelEx($model,'textoactividad'); ?>
		<?php echo $form->textField($model,'textoactividad',array('disabled'=>($editable)?'':'disabled')); ?>
		<?php echo $form->error($model,'textoactividad'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'txt'); ?>
		<?php echo $form->textArea($model,'txt',array('disabled'=>($editable)?'':'disabled')); ?>
		<?php echo $form->error($model,'txt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codresponsable'); ?>
		<?php

		if ($this->eseditable($model->codestado)=='')

		{
			$this->widget('ext.matchcode.MatchCode',array(
					'nombrecampo'=>'codresponsable',
					'ordencampo'=>1,
					'controlador'=>'Tempdetot',
					'relaciones'=>$model->relations(),
					'tamano'=>6,
					'model'=>$model,
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					'nombrearea'=>'fehe367uudfddj',
				)

			);
		} else{
			echo CHtml::textField('Saccc',$model->trabajadores->ap.'-'.$model->trabajadores->ap.'-'.$model->trabajadores->nombres,array('disabled'=>'disabled','size'=>40)) ;

		}
		?>
		<?php echo $form->error($model,'codresponsable'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'cc'); ?>
		<?php

		if ($this->eseditable($model->codestado)=='')

		{
			$this->widget('ext.matchcode.MatchCode',array(
					'nombrecampo'=>'cc',
					'ordencampo'=>3,
					'controlador'=>'Tempdetot',
					'relaciones'=>$model->relations(),
					'tamano'=>12,
					'model'=>$model,
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					'nombrearea'=>'fehe367uudf8989ddj',
				)

			);
		} else{
			echo CHtml::textField('Saccccc',$model->ceco->desceco,array('disabled'=>'disabled','size'=>30)) ;

		}
		?>
		<?php echo $form->error($model,'cc'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'codgrupoplan'); ?>
		<?php  $datos1tb1 = CHtml::listData(Grupoplan::model()->findAll("codcen=:orden",array(":orden"=>$model->ot->codcen)),'codgrupo','desgrupo');
		echo $form->DropDownList($model,'codgrupoplan',$datos1tb1, array('empty'=>'--Seleccione un grupo--','disabled'=>$this->eseditable($model->codestado))  )  ;
		?>
		<?php echo $form->error($model,'codgrupoplan'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'codmaster'); ?>
		<?php
              

         $datos1tb1x = CHtml::listData(Masterrelacion::model()->findAll("hidpadre=:orden",array(":orden"=>$model->ot->objetosmaster->masterequipo->codigo)),'hidhijo','hijo.descripcion');
		echo $form->DropDownList($model,'codmaster',$datos1tb1x, array('empty'=>'--Seleccione un grupo--','disabled'=>$this->eseditable($model->codestado))  )  ;
		?>
		<?php echo $form->error($model,'codmaster'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nhoras'); ?>
		<?php echo $form->textField($model,'nhoras',array('size'=>4)); ?>
		<?php echo $form->error($model,'nhoras'); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nhombres'); ?>
		<?php echo $form->textField($model,'nhombres',array('size'=>4)); ?>
		<?php echo $form->error($model,'nhombres'); ?>

	</div>

    
    <div class="row">
						<?php echo $form->labelEx($model,'fechainic'); ?>

						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array(
								'model'=>$model,
								'attribute'=>'fechainic',
								'value'=>$model->fechainic,
								'language' => 'es',
								'htmlOptions' => array('readonly'=>"readonly"),
								'options'=>array(
									'autoSize'=>true,
									'defaultDate'=>$model->fechainic,
									'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
									'showOn'=>'both', // 'focus', 'button', 'both'
									'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
									'buttonImageOnly'=>true,
									'dateFormat'=>'yy-mm-dd',
									'selectOtherMonths'=>true,
									'showAnim'=>'slide',
									'showButtonPanel'=>false,
									'showOtherMonths'=>true,
									'changeMonth' => 'true',
									'changeYear' => 'true',
								),
							)
						);?>
		
					</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
</div>

<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>600,
		'height'=>420,
		'border'=>0,
	),
));
?>
	<iframe id="cru-frame3" style="border:0px; width:100%; height:100%;" ></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>
