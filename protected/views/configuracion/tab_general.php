


	<BR>
	<div class="row">
		<?php echo $form->labelEx($model,'general_monedadef'); ?>
		<?php $datos=CHTml::listdata(Monedas::model()->FindAll("habilitado='1'",array("order"=>"desmon ASC")),'codmoneda','desmon'); ?>

		<?php echo $form->DropdownList($model,'general_monedadef',$datos,array('empty'=>'--Seleccione moneda--')); ?>
		<?php echo $form->error($model,'general_monedadef'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'general_rutatemaimagenes').'  '.Yii::app()->getTheme()->baseUrl; ?>
		<?php echo $form->textField($model,'general_rutatemaimagenes',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'general_rutatemaimagenes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'general_horaspasadastipocambio'); ?>
		<?php echo $form->textField($model,'general_horaspasadastipocambio',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'general_horaspasadastipocambio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'general_porcexcesocaja'); ?>
		<?php echo $form->textField($model,'general_porcexcesocaja',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'general_porcexcesocaja'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'general_userauto'); ?>
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
		echo $form->dropDownList($model,'general_userauto',$comboList, array('empty'=>'--Seleccione usuario--'));



		?>



		<?php echo $form->error($model,'general_userauto'); ?>
	</div>

	<BR>



