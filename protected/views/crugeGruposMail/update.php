<?php
/* @var $this CrugeGruposMailController */
/* @var $model CrugeGruposMail */

$this->breadcrumbs=array(
	'Cruge Grupos Mails'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CrugeGruposMail', 'url'=>array('index')),
	array('label'=>'Create CrugeGruposMail', 'url'=>array('create')),
	array('label'=>'View CrugeGruposMail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CrugeGruposMail', 'url'=>array('admin')),
);
?>

<h1>Update CrugeGruposMail <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>