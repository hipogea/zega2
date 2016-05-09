<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="division">
	<div class="wide form">
        <?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.'/img/pallet.png'); ?>
        <h1>Crear movimiento</h1>

</div>
    </div>
<div class="division">
  <div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'escoje-form',
	'action'=>Yii::app()->createUrl('/Almacendocs/create'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

        <?php
        echo "<div class='botones'>";
        echo CHtml::imageButton(Yii::app()->getTheme()->baseUrl.'/img/siga.png',array('value'=>'Crear'));
        echo "</div>";

        ?>

	<div class="row">
		
		<?php  $datos1 = CHtml::listData(Almacenmovimientos::model()->findAll(array('order'=>'movimiento')),'codmov','movimiento');
		  echo CHtml::DropDownList('opciondocu','',$datos1, array('empty'=>'--Seleccione un movimiento--',))   ;
		?>
		
	</div>

	

	


<?php $this->endWidget(); ?>
</div><!-- form -->
</div><!-- form -->
