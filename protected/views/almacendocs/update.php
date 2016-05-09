<?php
/* @var $this AlmacendocsController */
/* @var $model Almacendocs */

$this->breadcrumbs=array(
	'Almacendocs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(

	array('label'=>'Crear Documento', 'url'=>array('crearvale')),
	array('label'=>'Editar Documento', 'url'=>array('editar','id'=>$model->id)),
	array('label'=>'Listado Documentos', 'url'=>array('admin')),
);
?>

<span class="summary-icon2">
           <img src="<?php echo Yii::app()->theme->baseUrl ;?>/img/cajamateriales.png" width="25" height="25" alt="">
</span>
                <h1>Visualizar documento de Almacen</h1>



<?php
foreach(Yii::app()->user->getFlashes() as $key => $message) {
    echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}
?>

<?php
Yii::app()->clientScript->registerScript(
    'myHideEffect',
    '$(".flash-success").animate({opacity: 1.0}, 12000).fadeOut("slow");',
    CClientScript::POS_READY
);
?>



<?php

	switch ($movimiento) {

	case '98':
		echo $this->renderPartial('_form', array('model'=>$model));
		break;
	case '99':
		echo $this->renderPartial('_form', array('model'=>$model));
		break;
	case '20':
		echo $this->renderPartial('_form', array('model'=>$model));
		break;
	case '20':
		echo $this->renderPartial('_form', array('model'=>$model));
		break;

	case '30':
		echo $this->renderPartial('_form', array('model'=>$model));
		break;
	case '40':
		echo $this->renderPartial('_form', array('model'=>$model));
		break;

	case '50':
		echo $this->renderPartial('salidaceco', array('model'=>$model));
		break;
	case '60':
		$this->redirect(array('Anulasalidaceco'));
		break;
	case '77':
			echo $this->renderPartial('traspaso', array('model'=>$model));
			break;
	case '78':
			echo $this->renderPartial('traspaso_recibe', array('model'=>$model));
			break;

	case '70':
			echo $this->renderPartial('reingreso', array('model'=>$model));
		break;
	default:
		echo $this->renderPartial('_form', array('model'=>$model));

	}

?>