<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inventariofisicopadre-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<?php
$opajax=array(
    'type'=>'POST',
    'data'=>ARRAY("codigo"=>'js:barcode_geus.value'),
    'url'=>yii::app()->createUrl($this->id."/pickdata"),
    'complete'=>'js:function(data){$("#barcode_geus").val("");$("#barcode_geus").focus();  }',
);
 echo CHtml::textField('NOMBRE','', ARRAY("ajax"=>$opajax,"id"=>"barcode_geus"));

?>
<?php
$this->endWidget();
?>

