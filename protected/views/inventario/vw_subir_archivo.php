<?php

$this->renderpartial('_viewpedazo',array('model'=>$model));
$form = $this->beginWidget(
    'CActiveForm',
    array(	
	'enableClientValidation'=>false,
    'clientOptions' => array(
         'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>false,
        'id' => 'upload-form',       
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )

);
// ...
echo $form->labelEx($model, 'imagen');
echo $form->fileField($model, 'imagen');
echo $form->error($model, 'imagen');
$mia=Inventario::model()->findByPk($id);
echo $form->hiddenField($model,'codigosap',array('value'=>$mia->codigosap,'border'=>0)); 

?>
<?php /*
$directorio = opendir("d:/web/"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        echo $archivo . "<br />";
    }
}*/
?>

<?php echo CHtml::submitButton('Grabar'); 

$this->endWidget();



?>