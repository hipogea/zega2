


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
		<?php echo $form->labelEx($model,'general_codempresa'); ?>
		<?php echo $form->textField($model,'general_codempresa',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'general_codempresa'); ?>
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

        
        
	<div class="row">
		<?php echo $form->labelEx($model,'general_directorioimg'); ?>
		<?php echo $form->textField($model,'general_directorioimg',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'general_directorioimg'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'general_nregistrosporcarpeta'); ?>
		<?php echo $form->textField($model,'general_nregistrosporcarpeta',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'general_nregistrosporcarpeta'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'general_codigomanualempresa'); ?>
		<?php echo $form->checkBox($model,'general_codigomanualempresa'); ?>
                    <?php // echo $form->error($model,'general_codigomanualempresa'); ?>
	</div>
        
        
        <div class="row">
		<?php echo $form->labelEx($model,'general_zonahoraria'); ?>
		<?php echo $form->textField($model,'general_zonahoraria',array('size'=>23,'maxlength'=>23)); ?>
		<?php echo $form->error($model,'general_zonahoraria'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'general_formatofechasalida'); ?>
		<?php echo $form->textField($model,'general_formatofechasalida',array('size'=>43,'maxlength'=>43)); ?>
		<?php echo $form->error($model,'general_formatofechasalida'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'general_formatofechaingreso'); ?>
		<?php echo $form->textField($model,'general_formatofechaingreso',array('size'=>43,'maxlength'=>43)); ?>
		<?php echo $form->error($model,'general_formatofechaingreso'); ?>
	</div>
         <div class="row">
		<?php echo $form->labelEx($model,'general_dni'); ?>
		<?php echo $form->textField($model,'general_dni',array('size'=>43,'maxlength'=>43)); ?>
		<?php echo $form->error($model,'general_dni'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'general_ruc'); ?>
		<?php echo $form->textField($model,'general_ruc',array('size'=>43,'maxlength'=>43)); ?>
		<?php echo $form->error($model,'general_ruc'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'general_pasaporte'); ?>
		<?php echo $form->textField($model,'general_pasaporte',array('size'=>43,'maxlength'=>43)); ?>
		<?php echo $form->error($model,'general_pasaporte'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'general_extranjeria'); ?>
		<?php echo $form->textField($model,'general_extranjeria',array('size'=>43,'maxlength'=>43)); ?>
		<?php echo $form->error($model,'general_extranjeria'); ?>
	</div>
	<BR>



