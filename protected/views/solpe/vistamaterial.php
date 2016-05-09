

<?php
$modelodetalle=Maestrodetalle::model()->findByPk(array('codart'=>$codigo,'codcentro'=>$centro,'codal'=>$codal));
$habilitado='disabled';

?>
<?php
IF (!IS_NULL($modelodetalle)){
?>

<div class="wide form">
<div class="row">
		<?php echo CHtml::label($modelodetalle->getAttributeLabel('codcentro'),'fgr258trtr'); ?>
		<?php echo CHtml::textField('',$modelodetalle->codcentro,array('size'=>4,'maxlength'=>4,'disabled'=>'disabled' )); ?>

	</div>


	<div class="row">
        <?php echo CHtml::label($modelodetalle->getAttributeLabel('codal'),'fgrtrt25r'); ?>
        <?php echo CHtml::textField('',$modelodetalle->codal,array('size'=>3,'maxlength'=>3,'disabled'=>'disabled' )); ?>

	</div>

    <div class="row">
        <?php echo CHtml::label($modelodetalle->getAttributeLabel('supervisionautomatica'),'fgr58trtr'); ?>
        <?php echo CHtml::checkBox('',$modelodetalle->supervisionautomatica); ?>

    </div>


    <div class="row">
		<?php echo CHtml::label($modelodetalle->getAttributeLabel('canteconomica'),'fgrtr078tr'); ?>
		<?php echo CHtml::textField('',$modelodetalle->canteconomica,array('size'=>10,'maxlength'=>10,'disabled'=>$habilitado)); ?>

	</div>





    <div class="row">
		<?php echo CHtml::label($modelodetalle->getAttributeLabel('cantreposic'),'fgrt09rtr'); ?>
		<?php echo CHtml::textField('',$modelodetalle->cantreposic,array('size'=>10,'maxlength'=>10,'disabled'=>$habilitado)); ?>

    </div>




   <div class="row">
		<?php echo CHtml::label($modelodetalle->getAttributeLabel('cantreorden'),'fgr909trtr'); ?>
		<?php echo CHtml::textField('',$modelodetalle->cantreorden,array('size'=>10,'maxlength'=>10,'disabled'=>$habilitado)); ?>

	</div>
	
	<div class="row">
		<?php echo CHtml::label($modelodetalle->getAttributeLabel('leadtime'),'fgrt4rtr'); ?>
		<?php echo CHtml::textField('',$modelodetalle->leadtime,array('size'=>10,'maxlength'=>10,'disabled'=>$habilitado)); ?>

	</div>

    <div class="row">
        <?php echo CHtml::label($modelodetalle->getAttributeLabel('catval'),'fg56rtrtr'); ?>
        <?php echo CHtml::textField('',$modelodetalle->catval,array('size'=>4,'maxlength'=>4,'disabled'=>$habilitado )); ?>

    </div>

    <div class="row">
        <?php echo CHtml::label($modelodetalle->getAttributeLabel('punitv'),'fgrtrtr'); ?>
        <?php echo CHtml::textField('',$modelodetalle->punitv,array('size'=>10,'maxlength'=>10,'disabled'=>$habilitado)); ?>

    </div>

    <div class="row">
        <?php echo CHtml::label($modelodetalle->getAttributeLabel('punitstd'),'fcgrtrtr'); ?>
        <?php echo CHtml::textField('',$modelodetalle->punitstd,array('size'=>10,'maxlength'=>10,'disabled'=>$habilitado)); ?>

    </div>

    <div class="row">
        <?php echo CHtml::label($modelodetalle->getAttributeLabel('controlprecio'),'fgrtretr'); ?>
        <?php echo CHtml::textField('',$modelodetalle->controlprecio,array('size'=>1,'maxlength'=>1,'disabled'=>$habilitado )); ?>

    </div>

</div>
<?php
}
?>
	