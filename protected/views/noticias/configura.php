<?php
/* @var $this NoticiasController */
/* @var $model Noticias */
/* @var $form CActiveForm */
?>
<h1>Configurar el tablon de Noticias</h1>
<div class="division">

	<div class="wide form">

		<?php
		?>

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'noticias-form',
			'enableAjaxValidation'=>false,
		)); ?>


		<div class="row">
			<?php echo $form->labelEx($model,'iduseradm'); ?>
			<?php
			$comboList = array();
			foreach(Yii::app()->user->um->listUsers() as $user){
				// evitando al invitado
				/*if($user->primaryKey == CrugeUtil::config()->guestUserId)
						break;*/
				// en este caso 'firstname' y 'lastname' son campos personalizados
				//$firstName = Yii::app()->user->um->getFieldValue($user,'firstname');
				//$lastName = Yii::app()->user->um->getFieldValue($user,'lastname');
				$comboList[$user->primaryKey] = $user->username;
			}
			echo $form->dropDownList($model,'iduseradm',$comboList, array('empty'=>'--Seleccione usuario--'));



			?>



			<?php echo $form->error($model,'iduseradm'); ?>
		</div>

		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>



		<?php $this->endWidget(); ?>

	</div><!-- form -->
</div>