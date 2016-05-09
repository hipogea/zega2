<?php
/* @var $this CrugeGruposMailController */
/* @var $model CrugeGruposMail */

$this->breadcrumbs=array(
	'Cruge Grupos Mails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CrugeGruposMail', 'url'=>array('index')),
	array('label'=>'Manage CrugeGruposMail', 'url'=>array('admin')),
);
?>

<h1>Create CrugeGruposMail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>