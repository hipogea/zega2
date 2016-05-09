<?php
/* @var $this CliproController */
/* @var $model Clipro */


$this->menu=array(
	//array('label'=>'List Clipro', 'url'=>array('index')),
	array('label'=>'Nuevo', 'url'=>array('create')),
	array('label'=>'Actualizar', 'url'=>array('update', 'id'=>$model->codpro)),
	array('label'=>'Borrar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codpro),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->despro; ?></h1>

<?php
/* @var $this CliproController */
/* @var $model Clipro */
/* @var $form CActiveForm */
?>
<div class="division">
	<div class="wide form">

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'clipro-form',
			'enableClientValidation'=>false,
			//'clientOptions' => array(
			//  'validateOnSubmit'=>true,
			//  'validateOnChange'=>true
			// ),
			'enableAjaxValidation'=>true,

		)); ?>







		<div class="row">
			<?php echo $form->labelEx($model,'codpro'); ?>
			<?php echo $form->textField($model,'codpro',array('size'=>6,'maxlength'=>6,'disabled'=>'disabled')); ?>
			<?php echo $form->error($model,'codpro'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'despro'); ?>
			<?php echo $form->textField($model,'despro',array('size'=>50,'maxlength'=>50,'disabled'=>'disabled')); ?>
			<?php echo $form->error($model,'despro'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'rucpro'); ?>
			<?php echo $form->textField($model,'rucpro',array('size'=>11,'maxlength'=>11,'disabled'=>'disabled')); ?>
			<?php echo $form->error($model,'rucpro'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'telpro'); ?>
			<?php echo $form->textField($model,'telpro',array('size'=>30,'maxlength'=>30,'disabled'=>'disabled')); ?>
			<?php echo $form->error($model,'telpro'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'socio'); ?>
			<?php echo $form->checkBox($model,'socio',ARRAY('disabled'=>'disabled'));?>
			<?php echo $form->error($model,'socio'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'emailpro'); ?>
			<?php echo $form->textField($model,'emailpro',ARRAY('disabled'=>'disabled')); ?>
			<?php echo $form->error($model,'emailpro'); ?>
		</div>

		<?php
		if ($model->isNewRecord) {} else {
			$this->widget('zii.widgets.jui.CJuiTabs', array(
				'tabs' => array(
					'Direcciones'=>array('id'=>'renderid2',
						'content'=>$this->renderPartial(
							'vw_direcciones',
							array('model'=>$model,'proveedor'=>$proveedor),TRUE
						)


					),


					'Contactos'=>array('id'=>'renderid3',
						'content'=>$this->renderPartial(
							'vw_contactos',
							array('model'=>$model,'proveedor2'=>$proveedor2),TRUE
						)
					),

					/*'Objetos'=>array('id'=>'renderid4',
                     'content'=>$this->renderPartial(
                                            'vw_lugares',
                                       array('model'=>$model),TRUE
                         )
                      ),	*/


					'Objetos'=>array('id'=>'renderid4',
						'content'=>$this->renderPartial(
							'vw_objetos',
							array('model'=>$model,'proveedor3'=>$proveedor3),TRUE
						)
					),



					'Materiales'=>array('id'=>'renderid5',
						'content'=>$this->renderPartial(
							'vw_materiales',
							array('model'=>$model,
								'codpro'=>$model->codpro
							),
							TRUE
						)
					),


				),
				// additional javascript options for the tabs plugin
				'options' => array(
					'collapsible' => true,
				),
				// set id for this widgets
				'id'=>'MyTab',
			));
		}
		?>






		<?php $this->endWidget(); ?>

	</div><!-- form -->

</diV>
