

<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detalleoc-form',

	'enableAjaxValidation'=>true,
	



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
		<?php echo $form->labelEx($model,'hidlabor'); ?>
		<?php  $datos1t1 = CHtml::listData(Tempdetot::model()->findAll("idusertemp=:vuser and hidorden=:orden",array(":orden"=>$model->id,":vuser"=>yii::app()->user->id)),'id','textoactividad');
		echo $form->DropDownList($model,'hidlabor',$datos1t1, array('empty'=>'--Seleccione una labor--','disabled'=>$this->eseditable($model->codestado))  )  ;
		?>
		<?php echo $form->error($model,'hidlabor'); ?>
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
		<?php echo $form->labelEx($model,'codresponsable'); ?>
		<?php

		if ($this->eseditable($model->codestado)=='')

		{
			$this->widget('ext.matchcode.MatchCode',array(
					'nombrecampo'=>'codresponsable',
					'ordencampo'=>1,
					'controlador'=>$this->id,
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
		<?php echo $form->labelEx($model,'codestado'); ?>
		<?php echo $form->textField($model,'codestado'); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codocu'); ?>
		<?php echo $form->textField($model,'codocu'); ?>

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