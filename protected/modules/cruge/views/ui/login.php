
	
	<!--<br>-->
<?php //echo CrugeTranslator::t('logon',"Login"); ?>
<?php if(Yii::app()->user->hasFlash('loginflash')): ?>
<!--<div class="flash-error">-->
	<?php echo Yii::app()->user->getFlash('loginflash'); ?>
<!--</div>-->
<?php else: ?>
        <!--
<div style="height:1700px;margin-left:200px; padding-left:50px; display:block; background-image:url('<?php echo Yii::app()->getTheme()->baseUrl.DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."inicio.jpg"; ?>');background-repeat: no-repeat;padding-top: 100px;">
  -->
    <?php
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'logon-form',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<!--<div style="padding-top:10px; padding-bottom:10px;display:block;margin-left:10px;text-align: left;">
	-->	<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array()); ?>
		<?php echo $form->error($model,'username'); ?>
	<!--</div>

	<div style="padding-top:10px; padding-bottom:10px;display:block;margin-left:10px;text-align: left;">
		--><?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	<!--</div>

	<div style="display:block;margin-left:10px;text-align: left;">-->
		
		<?php echo $form->label($model,'rememberMe'); ?>
        <?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	<!--</div>

	<div class="row buttons">-->
		<?php Yii::app()->user->ui->tbutton(CrugeTranslator::t('logon', "Login"),array("class"=>"btn")); ?>
	<!--</div>	
                  --> <!--<div class="row buttons"> -->
                    <?php echo Yii::app()->user->ui->passwordRecoveryLink; ?>
                   <!-- </div>
            <div class="row buttons"> -->
		<?php
			/*if(Yii::app()->user->um->getDefaultSystem()->getn('registrationonlogin')===1)
				echo Yii::app()->user->ui->registrationLink;
		*/?>
	<!--</div>-->

	<?php
		//	si el componente CrugeConnector existe lo usa:
		//
		if(Yii::app()->getComponent('crugeconnector') != null){
		if(Yii::app()->crugeconnector->hasEnabledClients){ 
	?>
	<!--<div class='crugeconnector'>-->
		<span><?php echo CrugeTranslator::t('logon', 'You also can login with');?>:</span>
		<!--<ul>-->
		<?php 
			$cc = Yii::app()->crugeconnector;
			foreach($cc->enabledClients as $key=>$config){
				$image = CHtml::image($cc->getClientDefaultImage($key));
				echo "<li>".CHtml::link($image,
					$cc->getClientLoginUrl($key))."</li>";
			}
		?>
		<!--</ul>-->
	<!--</div>-->
	<?php }} ?>
	

<?php $this->endWidget(); ?>
<!--</div>-->
<?php endif; ?>




