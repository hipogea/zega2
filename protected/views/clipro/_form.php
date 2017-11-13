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
	'enableAjaxValidation'=>false,
	
)); ?>

	

	<div class="row">
		<?php

		$this->widget('ext.toolbar.Barra',
			array(
				'botones'=>array(
					'save'=>array(
						'type'=>'A',
						'ruta'=>array(),
						'visiblex'=>array(null,'','99','10','20'),
							)

				),
				'size'=>24,
				'extension'=>'png',

			)
		);?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'codpro'); 
               // var_dump(yii::app()->settings->get('general','general_codigomanualempresa'));
                $confx=(yii::app()->settings->get('general','general_codigomanualempresa')=='1');
                ?>
		<?php echo $form->textField($model,'codpro',array('size'=>6,'maxlength'=>6,'disabled'=>($confx)?'':'disabled')); ?>
		<?php echo $form->error($model,'codpro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'despro'); ?>
		<?php echo $form->textField($model,'despro',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'despro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombrecomercial'); ?>
		<?php echo $form->textField($model,'nombrecomercial',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nombrecomercial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direcciontemp'); ?>
		<?php echo $form->textField($model,'direcciontemp',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'direcciontemp'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'rucpro'); ?>
		<?php echo $form->textField($model,'rucpro',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'rucpro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telpro'); ?>
		<?php echo $form->textField($model,'telpro',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'telpro'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'socio'); ?>
		<?php echo $form->checkBox($model,'socio',array('disabled'=>'disabled'));?>
		<?php echo $form->error($model,'socio'); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'emailpro'); ?>
		<?php echo $form->textField($model,'emailpro'); ?>
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

                                                                'Estructura'=>array('id'=>'renderid5x',
                             						'content'=>$this->renderPartial(
													'vw_arbol',
								 					 array('model'=>$model,
								 					 'codpro'=>$model->codpro
								 	 				),
								 					TRUE
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